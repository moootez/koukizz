<?php

namespace App\Form;

use App\Entity\Recette;
use App\Entity\Regime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomRecette', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a recipe name',
                    ]),
                ],
            ])
            ->add('ingredients')
            ->add('tempsPreparation')
            ->add('regime', EntityType::class, [
                'class' => Regime::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
