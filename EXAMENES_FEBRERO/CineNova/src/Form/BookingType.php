<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Movie;
use App\Entity\Room;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bookingDate', null, [
                'widget' => 'single_text',
                'label' => 'Fecha de reserva'
            ])
            ->add('seats', null, ['label' => 'Asientos'])
            ->add('customerName', null, ['label' => 'Nombre del cliente'])
            ->add('customerEmail', null, ['label' => 'Email del cliente'])
            ->add('movie', EntityType::class, [
                'class' => Movie::class,
                'choice_label' => 'title',
                'label' => 'Pelicula'
            ])
            ->add('room', EntityType::class, [
                'class' => Room::class,
                'choice_label' => 'name',
                'label' => 'Sala'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
