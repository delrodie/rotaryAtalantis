<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StepOneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', ChoiceType::class,[
                'choices' => [
                    '-- Selectionnez --' => '',
                    'M.' => 'M.',
                    'Mme' => 'Mme',
                    'Mlle' => 'Mlle'
                ],
                'label' => "Civilité",
                'attr'=>['class' => 'form-control', 'autocomplete' =>"off"]
            ])
            ->add('nom', TextType::class,[
                'label' => "Nom",
                'attr'=>['class' => 'form-control', 'autocomplete' =>"off"]
            ])
            ->add('prenoms', TextType::class,[
                'label' => "Prenoms",
                'attr'=>['class' => 'form-control', 'autocomplete' =>"off"]
            ])
            ->add('contact', TelType::class,[
                'label' => "Contact",
                'attr'=>['class' => 'form-control', 'autocomplete' =>"off"]
            ])
            ->add('classification', TextType::class,[
                'label' => "CLassification",
                'attr'=>['class' => 'form-control', 'autocomplete' =>"off"]
            ])
            ->add('qualite', ChoiceType::class,[
                'choices' => [
                    '-- Selectionnez --' => "",
                    'President' => "Président",
                    'Président Elu' => 'Présicent Elu',
                    'Président Nommé' => 'Président Nommé',
                    'Vice-Président' => 'Vice-Président',
                    'Tésorier' => "Trésorier",
                    'Protocole' => 'Protocole',
                    'Secrétaire' => 'Secrétaire',
                    'Président de commission' => "Président de commission",
                    'Membre' => "Membre"
                ],
                'label' => "Qualité",
                'attr'=>['class' => 'form-select']
            ])
            ->add('anciennete', IntegerType::class,[
                'label' => "Ancienneté",
                'attr'=>['class' => 'form-control']
            ])
            //->add('besoinFormationDevPro')
            //->add('autresPreciserFormation')
            //->add('besoinConnaissanceActivitePro')
            //->add('autresPreciserActivite')
            //->add('besoinFormationRotary')
            //->add('articlesStatutsReglements')
            //->add('voulezCommuniquerActivitePro')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
