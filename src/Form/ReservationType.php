<?php

namespace App\Form;

use App\Form\PersonType;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('visitDay', DateType::class, [
                'label' => "quel jour souhaitez vous venir ?",
                'years' => range(date('Y'), date('Y') + 5)
            ])
            ->add('halfDay', CheckboxType::class, [
                'label' => "arrivée après 14h (demi-tarif)",
                'required' => false
            ])
            ->add('persons', CollectionType::class, [
                'entry_type' => PersonType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
            ->add('temporaryPersonsList', CollectionType::class, [
                'entry_type' => TemporaryPersonType::class,
                'allow_add' => true
            ])
            ->add('save', SubmitType::class, [
                "label" => "Réserver",
                "attr" => [
                    "class" => "btn btn-primary"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
