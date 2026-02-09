<?php

namespace App\Repository;

use App\Entity\Booking;
use App\Entity\Movie;
use App\Entity\Room;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Booking>
 */
class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    // Metodo para obtener Detalla de sala con sus reservas
    public function getBookingsByRoom(Room $room): array
    {
        return $this->createQueryBuilder('b')
            ->where('b.room = :room')
            ->setParameter('room', $room)
            ->orderBy('b.bookingDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // Total reservas de una pelicula
    public function movieCounterBooking(Movie $movie): int
    {
        return (int) $this->createQueryBuilder('b')
            ->select('COUNT(b.id)')
            ->where('b.movie = :movie')
            ->setParameter('movie', $movie)
            ->getQuery()
            ->getSingleScalarResult();
    }
    // Reservas activas de una pelicula
    public function movieCounterActiveBooking(Movie $movie): int
    {
        return (int) $this->createQueryBuilder('b')
            ->select('COUNT(b.id)')
            ->where('b.movie = :movie')
            ->andWhere('b.bookingDate >= :today')
            ->setParameter('movie', $movie)
            ->setParameter('today', new \DateTimeImmutable())
            ->getQuery()
            ->getSingleScalarResult();
    }

    //    /**
    //     * @return Booking[] Returns an array of Booking objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Booking
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
