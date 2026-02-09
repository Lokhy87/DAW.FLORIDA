<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\LoanRepository;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(BookRepository $bookRepository, LoanRepository $loanRepository, MemberRepository $memberRepository): Response
    {
        $totalLibros = $bookRepository->count();
        $librosDisponibles = $bookRepository->count(['available' => true]);
        $totalSocios = $memberRepository->count();
        $prestamosActivos = $loanRepository->count(['returnDate' => null]);

        return $this->render('main/index.html.twig', [
            'totalBooks' => $totalLibros,
            'librosDisponibles' => $librosDisponibles,
            'totalMembers' => $totalSocios,
            'activeLoan' => $prestamosActivos,
        ]);
    }
}
