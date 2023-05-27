<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StepFourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('besoinFormationRotary', ChoiceType::class, [
                'choices' => [
                    "Août - Mois de l'effectif" => "Août - Mois de l'effectif",
                    "Septembre - Alphabétisation et éducation de base" => "Septembre - Alphabétisation et éducation de base",
                    "Octobre - Développement économique et local" => "Octobre - Développement économique et local",
                    "Novembre - Mois de la Fondation Rotary" => "Novembre - Mois de la Fondation Rotary",
                    "Décembre - Prévention et traitement des maladies" => "Décembre - Prévention et traitement des maladies",
                    "Janvier - Mois de l'Action professionnelle" => "Janvier - Mois de l'Action professionnelle",
                    "Février - Paix et prévention/résolution des conflits" => "Février - Paix et prévention/résolution des conflits",
                    "Mars - Eau et assainissement" => "Mars - Eau et assainissement",
                    "Avril - Santé de la mère et de l'enfant" => "Avril - Santé de la mère et de l'enfant",
                    "Mai - Mois de l'Action jeunesse" => "Mai - Mois de l'Action jeunesse",
                    "Juin - Mois des Amicales du Rotary" => "Juin - Mois des Amicales du Rotary",
                ],
                "label" => "Les thèmes ROTARY du mois",
                "expanded" => true,
                "multiple" => true,
                'attr' => ['class' => 'form-check-input besoinRotary'],
                'label_attr' => ['class' => 'form-check-label']
            ])
            ->add('minuteRotarienne', ChoiceType::class, [
                'choices' => [
                    '-- Selectionnez --' => "",
                    'Chaque semaine' => "Chaque semaine",
                    "Chaque mois" => "Chaque mois",
                    "Chaque 2 mois" => "Chaque 2 mois",
                    "Chaque trimestre" => "Chaque trimestre",
                ],
                "label" => "Fréquence de communication sur la Minute Rotarienne",
                'attr' => ['class' => 'form-select'],
                'required' => true
            ])
            ->add('autreMinuteRotarienne', TextType::class, [
                'label' => "Autres, préciser",
                "required" => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('articlesStatutsReglements', ChoiceType::class, [
                'choices' => [
                    '-- Selectionnez --' => "",
                    'Chaque semaine' => "Chaque semaine",
                    "Chaque mois" => "Chaque mois",
                    "Chaque 2 mois" => "Chaque 2 mois",
                    "Chaque trimestre" => "Chaque trimestre",
                ],
                "label" => "Fréquence de communication sur les Articles des Statuts ou Règlements Intérieurs",
                'attr' => ['class' => 'form-select'],
                'required' => true
            ])
            ->add('autreStatuts', TextType::class, [
                'label' => "Autres, préciser",
                "required" => false,
                'attr' => ['class' => 'form-control']
            ])
            /*->add('commission', ChoiceType::class, [
                'choices' => [
                    '-- Selectionnez --' => "",
                    'Debut de mandat' => "Debut de mandat",
                    "Milieu de mandat" => "Milieu de mandat",
                    "Fin de mandat" => "Fin de mandat",
                ],
                "label" => "Les commissions et leurs rôles dans les Clubs Rotary",
                'attr' => ['class' => 'form-select'],
                "required" => true
            ])
            ->add('autreCommission', TextType::class, [
                'label' => "Autres, préciser",
                "required" => false,
                'attr' => ['class' => 'form-control']
            ])
             ->add('voulezCommuniquerActivitePro', CheckboxType::class,[
                'label' => "Voulez-vous communiquer sur votre activité professionnelle?",
                'required' => false,
                'attr' => ['class'=>'form-check-input']
            ])*/
            //->add('etape')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Information::class,
        ]);
    }
}
