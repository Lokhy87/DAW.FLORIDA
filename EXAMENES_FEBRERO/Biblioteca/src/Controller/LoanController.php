<?php

namespace App\Controller;

use App\Entity\Loan;
use App\Form\LoanType;
use App\Repository\LoanRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/loan')]
final class LoanController extends AbstractController
{
    #[Route(name: 'app_loan_index', methods: ['GET'])]
    public function index(LoanRepository $loanRepository): Response
    {
        return $this->render('loan/index.html.twig', [
            'loans' => $loanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_loan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $loan = new Loan();
        $form = $this->createForm(LoanType::class, $loan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Al crear un prestamo marcar el libro como no disponible
            $selectedBook = $loan->getBook(); // Obtener el libro asociado al prestamo
            if ($selectedBook) {
                // Cambiamos el estado del libro para que no pueda volver a prestarse
                $selectedBook->setAvailable(false);
            }

            $entityManager->persist($loan);
            $entityManager->flush();

            return $this->redirectToRoute('app_loan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('loan/new.html.twig', [
            'loan' => $loan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_loan_show', methods: ['GET'])]
    public function show(Loan $loan): Response
    {
        return $this->render('loan/show.html.twig', [
            'loan' => $loan,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_loan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Loan $loan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LoanType::class, $loan, [
            'includes_return_date' => true, // Incluye el returnDate en el formulario de edit
        ]);
        $form->handleRequest($request);

        // Comprobamos si el préstamo ha sido devuelto
        if ($form->isSubmitted() && $form->isValid()) {

            if($loan->getReturnDate() != null) {
                $book = $loan->getBook();
                if ($book) {
                    // Al devolver el prestamo el libro vuelve a estar disponible
                    $book->setAvailable(true);
                }
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_loan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('loan/edit.html.twig', [
            'loan' => $loan,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_loan_delete', methods: ['POST'])]
    public function delete(Request $request, Loan $loan, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$loan->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($loan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_loan_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/active', name: 'app_loan_active', methods: ['GET'])]
    public function listLoans(LoanRepository $loanRepository): Response
    {
        return $this->render('loan/active.html.twig', [
           'activeLoans' => $loanRepository->findActiveLoans()
        ]);
    }

    #[Route('/{id}/return', name: 'app_loan_return', methods: ['POST'])]
    public function returnLoan(Loan $loan, EntityManagerInterface $entityManager): Response
    {
        if ($loan->getReturnDate() == null) {               // El prestamos esta activo
            $loan->setReturnDate(new \DateTime());          // Marcar prestamos com devuelto
            $loan->getBook()->setAvailable(true);   // Libro vuelve a estar disponible
        }
        $entityManager->flush();
        return $this->redirectToRoute('app_loan_active');
    }



}
