<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Loan;
use App\Entity\Member;
use App\Repository\BookRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('book', EntityType::class, [
                'class' => Book::class,
                'choice_label' => 'title',
                'query_builder' => function (BookRepository $repo) { // Desplegable con los libros disponibles
                    return $repo->findAvailableBooks();
                }
            ])
            ->add('member', EntityType::class, [
                'class' => Member::class,
                // Callback llamar name y surname
                'choice_label' => function (Member $member): string { // Desplegable para seleccionar 2 propiedades en una misma linea.
                    return $member->getName().' '.$member->getSurname();
                }
            ])
            ;
        // Añado campo returnDate cuando sea edit
        if($options['includes_return_date'])
        {
            $builder->add('returnDate', null, [
                'widget' => 'single_text',
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Loan::class,
            'includes_return_date' => false, // Creas la opcion booleana
        ]);
    }
}
