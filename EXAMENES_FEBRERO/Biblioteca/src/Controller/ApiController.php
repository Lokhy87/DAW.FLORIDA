<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\LoanRepository;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/api/books/', name: 'app_api_book', methods: ['GET'])]
    public function getBooks(BookRepository $bookRepository): JsonResponse
    {
        // 1. Recuperamos los libros
        $books = $bookRepository->findBy(
            ['available' => true],
            ['title' => 'ASC']
        );

        $data = [];
        // 2. Iteramos ($coleccion as $elemento_individual)
        foreach ($books as $book) {
            // 3. Añadimos cada libro al array usando []
            $data[] = [
                'id' => $book->getId(),
                'title' => $book->getTitle(),
                'isbn' => $book->getIsbn(),
                'publishYear' => $book->getPublishYear()
            ];
        }
        return new JsonResponse($data);
    }

    // Endpoint 2 — Detalle de un libro
    #[Route('/api/books/{id}', name: 'app_api_book_details', methods: ['GET'])]
    public function getDetailsBooks($id, BookRepository $bookRepository): JsonResponse
    {
        $book = $bookRepository->find($id);

        if(!$book) {
            return new JsonResponse(['error' => 'Book not found'], 404);
        }
        return new JsonResponse([
            'title' => $book->getTitle(),
            'isbn' => $book->getIsbn(),
            'available'=> $book->isAvailable()
        ]);
    }

    // Endpoint 3 — Préstamos activos (API)
    #[Route('/api/loans/active', name: 'app_loan_active', methods: ['GET'])]
    public function getLoansActive(LoanRepository $loanRepository): JsonResponse
    {
        $activeLoans= $loanRepository->findActiveLoans();

        $data = [];

        foreach ($activeLoans as $loan) {
            $data[] = [
                'id' => $loan->getId(),
                'loanDate' => $loan->getLoanDate()->format('Y-m-d'),
                'bookTitle' => $loan->getBook()->getTitle(),
                'memberName' => $loan->getMember()->getName(). ' ' . $loan->getMember()->getSurname()
            ];
        }
        return new JsonResponse($data);
    }

    // Endpoint 4 — Préstamos de un socio (API)
    #[Route('/api/members/{id}/loans', name: 'app_api_member_loans', methods: ['GET'])]
    public function getLoansMember(int $id, LoanRepository $loanRepository, MemberRepository $memberRepository): JsonResponse
    {
        // 1) Buscar el socio
        $member = $memberRepository->find($id);

        if (!$member) {
            return new JsonResponse(['error' => 'Member not found'], 404);
        }

        // 2) Obtener todos sus préstamos (activos + devueltos)
        $loans = $loanRepository->findLoansByMember($member);

        // 3) Construir la respuesta JSON
        $data = [];
        foreach ($loans as $loan) {
            $returnDate = $loan->getReturnDate();

            $data[] = [
                'bookTitle'  => $loan->getBook()->getTitle(),
                'loanDate'   => $loan->getLoanDate()->format('Y-m-d'),
                'returnDate' => $returnDate ? $returnDate->format('Y-m-d') : null,
                'status'     => $returnDate === null ? 'active' : 'returned',
            ];
        }

        return new JsonResponse($data);
    }

}
