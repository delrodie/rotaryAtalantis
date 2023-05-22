<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StepFiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('voulezCommuniquerActivitePro', ChoiceType::class,[
                'choices' => [
                    "OUI" => "OUI",
                    "NON" => "NON",
                ],
                'label' => "Voulez-vous communiquer sur votre activité professionnelle?",
                "expanded" => true,
                'multiple' => false,
                'attr' => ['class'=>'form-check-input'],
                'label_attr' => ['class'=>'form-check-label']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
