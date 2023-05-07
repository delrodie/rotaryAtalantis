<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StepFourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('besoinFormationRotary', ChoiceType::class,[
                'choices' => [
                    'Paix et résolution des conflits' => 'Paix et résolution des conflits',
                    "Prévention et traitement des maladies" => "Prévention et traitement des maladies",
                    "Santé de la mère et de l'enfant" => "Santé de la mère et de l'enfant",
                    "Eau et assainissement" => "Eau et assainissement",
                    "Santé et alimentation" => "Santé et alimentation",
                    "Education de base et alphabétisation" => "Education de base et alphabétisation",
                    "Développement économique et local" => "Développement économique et local",
                    "Protection de l'environnement" => "Protection de l'environnement",
                    "Lutte contre la pauvreté" => "Lutte contre la pauvreté",
                    "Promotion de la santé mentale" => "Promotion de la santé",
                    "Soutien aux personnes handicapées" => "Soutien aux personnes handicapées",
                    "Croissance de la jeunesse et échanges interculturels" => "Croissance de la jeunesse et échanges interculturels",
                ],
                "label" => "Les thèmes ROTARY du mois",
                "expanded" => true,
                "multiple" => true,
            ])
            ->add('articlesStatutsReglements', ChoiceType::class,[
                'choices' => [
                    'Chaque semaine' => "Chaque semaine",
                    "Chaque mois" => "Chaque mois",
                    "Chaque 2 mois" => "Chaque 2 mois",
                    "Chaque trimestre" => "Chaque trimestre",
                ],
                "label" => "Articles des Statuts ou Règlements Intérieurs"
            ])
            ->add('voulezCommuniquerActivitePro', CheckboxType::class,[
                'label' => "Voulez-vous communiquer sur votre activité professionnelle?",
                'required' => false
            ])
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
