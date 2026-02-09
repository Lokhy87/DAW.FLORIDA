<?php

namespace App\Form;

use App\Entity\Booking;
use App\Entity\Member;
use App\Entity\Room;
use App\Repository\RoomRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('room', EntityType::class, [
                'class' => Room::class,
                'choice_label' => 'name',
                'label' => 'Sala',
                'query_builder' => function (RoomRepository $repo) {
                    return $repo->getActiveRooms();
                }
            ])
            ->add('member', EntityType::class, [
                'class' => Member::class,
                'choice_label' => function (Member $member): string { // Seleccionar 2 propiedades en una misma linea
                    return $member->getName().' '.$member->getSurname();
                },
                'label' => 'Socio'
            ])
            ->add('startAt', null, [
                'widget' => 'single_text',
                'label' => 'Fecha de inicio'
            ])
            ->add('endAt', null, [
                'widget' => 'single_text',
                'label' => 'Fecha de final'
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

