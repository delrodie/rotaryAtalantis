<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StepFiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('voulezCommuniquerActivitePro', ChoiceType::class, [
                'choices' => [
                    "OUI" => "OUI",
                    "NON" => "NON",
                ],
                'label' => "Voulez-vous communiquer sur votre activité professionnelle?",
                "expanded" => true,
                'multiple' => false,
                'attr' => ['class' => 'form-check-input'],
                'label_attr' => ['class' => 'form-check-label'],
                'required' => true
            ])
            ->add('themeActivitePro', TextType::class, [
                'label' => "Veuillez renseigner votre thème",
                "required" => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('nomConferencier', TextType::class, [
                'label' => "Nom du conférencier",
                "required" => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('contact', TelType::class,[
                'label' => "Contact",
                'attr'=>['class' => 'form-control', 'autocomplete' =>"off"],
                'required' => false,
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
