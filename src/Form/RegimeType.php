<?php

namespace App\Form;
use App\Entity\Regime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeRegime', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a regime type',
                    ]),
                ],
            ])
            ->add('nomRegime', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a regime name',
                    ]),
                ],
            ])
            ->add('instruction')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Regime::class,
        ]);
    }
}
