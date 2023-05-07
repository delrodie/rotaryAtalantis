<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StepThreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('besoinConnaissanceActivitePro', ChoiceType::class,[
                'choices' => [
                    'Le Service Clientèle et la Vente' => "Le Service Clientèle et la Vente",
                    "L'immobilier et l'Investissement immobilier" => "L'immobilier et l'Investissement immobilier",
                    "La Bourse et l'investissement boursier" => "La Bourse et l'investissement boursier",
                    "L'Expertise Comptable" => "L'Expertise Comptable",
                    "Le Foncier Rural et Urbain" => "Le Foncier Rural et Urbain",
                    "La Protection de l'Environnement" => "La Protection de l'Environnement",
                    "Influenceur Web" => "Influenceur Web",
                    "Comprendre certaines maladies et les prévenir (Diabète, Hypertension)" => "Comprendre certaines maladies et les prévenir (Diabète, Hypertension)",
                    "Le transport fluvial en CI" => "Le transport fluvial en CI",
                    "Les bases de la Décoration d'Intérieur" => "Les bases de la Décoration d'Intérieur"
                ],
                "label" => "Besoin en connaissance sur une activité professionnelle",
                "expanded" => true,
                "multiple" => true
            ])
            ->add('autresPreciserActivite', TextType::class,[
                'label' => "Autres, précisez",
                "required" => false,
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
