<?php

namespace App\Form;

use App\Entity\Information;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StepTwoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('besoinFormationDevPro', ChoiceType::class,[
                'choices' => [
                    "Savoir s'exprimer en public" => "Savoir s'exprimer en public",
                    "Développer son réseau relationnel" => "Développer son réseau relationnel",
                    "Gestion du Budget Famillial" => "Gestion du Budget Famillial",
                    "Savoir Communiquer à l'ère des TIC" => "Savoir communiquer à l'ère des TIC",
                    "Travailler avec des Personnes difficiles" => "Travailler avec des Personnes difficiles",
                    "Développer la confiance en soi" => "Développer la confiance en soi",
                    "Savoir se tenir à table" => "Savoir se tenir à table",
                    "Savoir voyager" => "Savoir voyager",
                    "Savoir se motiver pour atteindre ses objectifs" => "Savoir se motiver pour atteindre ses objectifs",
                    "L'Ethique dans le Service aux autres" => "L'Ethique dans le Service aux autres"
                ],
                'label' => "Besoin en formation en développement personnel",
                "expanded" => true,
                'multiple' => true,
                'attr' => ['class'=>'form-check-input'],
                'label_attr' => ['class'=>'form-check-label']
            ])
            ->add('autresPreciserFormation', TextType::class,[
                'label' => 'Autres précisez',
                'required' => false,
                'attr' => ['class'=>'form-control', 'autocomplete'=>"off"]
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
