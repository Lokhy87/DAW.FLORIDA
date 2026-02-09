<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use App\Repository\MovieRepository;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Tests\Compiler\J;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    // Listado de peliculas
    #[Route('/api/movies', name: 'app_api_list', methods: ['GET'])]
    public function getMovies(MovieRepository $movieRepository): JsonResponse
    {
        // 1) Obtenemos todas las películas de la base de datos
        $movies = $movieRepository->findby(
            [],
            ['rating' => 'DESC'] // Segundo parámetro: ordenación (orderBy)
        );
        // 2) Creamos un array vacío para almacenar las películas en formato JSON
        $data = [];
        // 3) Recorremos todas las películas obtenidas
        foreach ($movies as $movie){
            // 4) Añadimos cada película al array $data como un array asociativo
            // IMPORTANTE: usamos $data[] para ir acumulando resultados
            $data[] = [
                'id' => $movie->getId(),
                'title' => $movie->getTitle(),
                'genre' => $movie->getGenre(),
                'duration' => $movie->getDuration(),
                'rating' => $movie->getRating(),
                'isAvailable' => $movie->getIsAvailable(),
            ];
        }
        return new JsonResponse($data, 200); // 5) Devolvemos el JSON con status 200 (OK)
    }

    // Peliculas por ID
    #[Route('/api/movies/{id}', name: 'app_api_show', methods:['GET'])]
    public function getFilmById(int $id, MovieRepository $movieRepository): JsonResponse
    {
        // 1) Buscamos la película por su id (clave primaria)
        $movie = $movieRepository->find($id);

        // 2) Si no existe, devolvemos error 404
        if (!$movie) {
            return new JsonResponse(['error' => 'Movie not found'], 404);
        }
        // 3) Si existe, devolvemos la película en formato JSON
        return new JsonResponse([
            'id' => $movie->getId(),
            'title' => $movie->getTitle(),
            'genre' => $movie->getGenre(),
            'duration' => $movie->getDuration(),
            'rating' => $movie->getRating(),
            'isAvailable' => $movie->getIsAvailable(),
        ], 200);
    }

    // Crear una nueva reserva
    #[Route('/api/bookings', name: 'app_api_create', methods: (['POST']))]
    public function getNewBooking(
        MovieRepository $movieRepository,
        BookingRepository $bookingRepository,
        RoomRepository $roomRepository,
        EntityManagerInterface $em,
        Request $request): JsonResponse
    {
        // 0) Leer JSON del body y convertirlo a array asociativo
        $data = json_decode($request->getContent(), true);

        // Si el JSON está mal formado o vacío
        $movie = $movieRepository->find($data['movie_id'] ?? null);
        if (!$movie) {
            return new JsonResponse(['error' => 'Movie not found'], 404);
        }

        // 1) Extraer datos (con null coalescing para evitar "undefined index")
        $movieId = $data['movie_id'] ?? null;
        $roomId = $data['room_id'] ?? null;
        $seats = $data['seats'] ?? null;
        $customerName = $data['customerName'] ?? null;
        $customerEmail = $data['customerEmail'] ?? null;

        // 2) Validar campos obligatorios
        if (!$movieId || !$roomId || !$seats || !$customerName || !$customerEmail) {
            return new JsonResponse(['error' => 'Missing fields'], 400);
        }

        // 3) Buscar Movie y Room en la base de datos
        $movie = $movieRepository->find($movieId);
        if (!$movie) {
            return new JsonResponse(['error' => 'Movie not found'], 404);
        }
        $room = $roomRepository->find($roomId);
        if (!$room) {
            return new JsonResponse(['error' => 'Room not found'], 404);
        }

        // 4) Validar capacidad de la sala
        if ($seats > $room->getCapacity()) {
            return new JsonResponse(['error' => 'Full capacity'], 400);
        }

        // 5) Crear Booking y asignar relaciones + datos
        $booking = new Booking();
        $booking->setMovie($movie);                 // relación ManyToOne
        $booking->setRoom($room);                   // relación ManyToOne
        $booking->setSeats((int) $seats);           // asegurar int
        $booking->setCustomerName($customerName);
        $booking->setCustomerEmail($customerEmail);

        // 6) Guardar en la base de datos
        $entityManager->persist($booking);
        $entityManager->flush();

        // 7) Devolver respuesta 201 Created
        return new JsonResponse([
            'message' => 'Booking created',
            'booking_id' => $booking->getId(),
            'movie_id' => $booking->getMovie()->getId(),
            'room_id' => $booking->getRoom()->getId(),
            'seats' => $booking->getSeats(),
            'name' => $booking->getCustomerName(),
            'email' => $booking->getCustomerEmail(),
        ], 201);
    }

    #[Route('/api/movies/{id}/bookings', name: 'app_api_bookings', methods:['GET'])]
    public function getBookingsByMovie(
        int $id,
        MovieRepository $movieRepository,
        BookingRepository $bookingRepository): JsonResponse
    {
        // 1) Buscamos la película por su id (clave primaria)
        $movie = $movieRepository->find($id);
        // 2) Comprobamos que existe, si no enviamos un error 404
        if (!$movie) {
            return new JsonResponse(['error' => 'Movie not found'], 404);
        }

        // 3) Buscamos todas las reservas asociadas a esa película, ordenadas por fecha desc
        $bookings = $bookingRepository->findBy(
            ['movie' => $movie],
            ['bookingDate' => 'DESC']
        );

        // 4) Convertimos a un array (JSON serializable)
        $data = [];

        foreach ($bookings as $booking) {
            $data[] = [
            'booking_id' => $booking->getId(),
            'bookingDate' => $booking->getBookingDate()->format('Y-m-d H:i:s'),
            'seats' => $booking->getSeats(),
            'name' => $booking->getCustomerName(),
            'roomName' => $booking->getRoom()->getName(),
            ];
        }
        // 5) Devolvemos JSON con 200 OK
        return new JsonResponse($data, 201);
    }

    // Ocuparacion total de una sala
    #[Route('/api/rooms/{id}/load', name: 'app_api_ocupation', methods:['GET'])]
    public function getTotalCapacity(
        int $id,
        RoomRepository $roomRepository,
        BookingRepository $bookingRepository): JsonResponse
    {
        // 1) Buscamos la sala por su id (clave primaria)
        $room = $roomRepository->find($id);
        // 2) Comprobamos que existe, si no enviamos un error 404
        if (!$room) {
            return new JsonResponse(['error' => 'Room not found'], 404);
        }

        // 3) Buscamos todas las reservas de esa sala
        $booking = $bookingRepository->findBy(
            ['room' => $room]
        );

        // 4) Sumamos todos los asientos reservados
        $totalSeatsBooked = 0;
        foreach ($bookings as $booking) {
            $totalSeatsBooked += $booking->getSeats();
        };
        // 5) Calculamos asientos restantes
        $remainingSeats = $room->getCapacity() - $totalSeatsBooked;

        // 6) Montamos respuesta JSON
        $data = [
            'roomName' => $room->getName(),
            'capacity' => $room->getCapacity(),
            'totalSeatsBooked' => $totalSeatsBooked,
            'remainingSeats' => $remainingSeats
        ];

        // 7) Devolvemos respuesta 200 OK
        return new JsonResponse($data, 200);

    }


}
