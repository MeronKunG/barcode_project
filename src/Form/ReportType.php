<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('merType', ChoiceType::class, [
                'choices' => [
                    'PARCEL' => 1,
                    'HOLDING+HYBRID' => 2,
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('transporterName', ChoiceType::class, [
                'choices' => [
                    'ALPHA' => 'ALPHA',
                    'DHL' => 'DHL',
                    'FLASH' => 'FLASH',
                    'KERRY' => 'KERRY',
                    'MY945' => 'MY945'
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('submit', SubmitType::class, array(
                'label' => 'ยืนยัน',
                'attr' => array('class' => 'btn mt-3 float-right', 'style' => 'color: white;background-color: #ca7855;')
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
