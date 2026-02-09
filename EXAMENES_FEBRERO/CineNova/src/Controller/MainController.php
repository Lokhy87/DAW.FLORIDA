<?php

namespace App\Controller;

use App\Repository\BookingRepository;
use App\Repository\MovieRepository;
use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(MovieRepository $movieRepository, RoomRepository $roomRepository, BookingRepository $bookingRepository): Response
    {
        $totalMovies = $movieRepository->count([]);
        $totalRooms = $roomRepository->count([]);
        $totalBookings = $bookingRepository->count([]);
        $totalAvailableMovies = $movieRepository->count(['isAvailable' => true]);


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            // La que utilizare en index = variables creadas arriba
            'totalMovies' => $totalMovies,
            'totalRooms' => $totalRooms,
            'totalBookings' => $totalBookings,
            'totalAvailableMovies' => $totalAvailableMovies

        ]);
    }
}
