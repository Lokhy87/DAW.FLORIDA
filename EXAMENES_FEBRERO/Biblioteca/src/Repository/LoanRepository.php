<?php

namespace App\Repository;

use App\Entity\Loan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Loan>
 */
class LoanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loan::class);
    }

    // Metodo para filtrar los prestamos activos
    public function findActiveLoans(): array
    {
        return $this->createQueryBuilder('l')
            ->where('l.returnDate IS null')
            ->orderBy('l.loanDate', 'ASC')
            ->getQuery()
            ->getResult(); // Se utiliza para un CRUD y tablas HTML. getArrayResult() se utiliza para arrays simples (datos planos= o trabajo con estadisticas.
    }

    // Metodo para filtrar los prstamos por socios
    public function findLoansByMember(Member $member): array
    {
        return $this->createQueryBuilder('l')
            ->where('l.member= :member')
            ->setParameter('member', $member)
            ->orderBy('l.loanDate', 'DESC')
            ->getResult();
    }




    //    /**
    //     * @return Loan[] Returns an array of Loan objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Loan
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
