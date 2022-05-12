<?php

namespace App\Form;

use App\Data\DataFilter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FilterAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', TextType::class,[
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' =>'rechercher',
                    'class' => 'form-group'
                ]
            ])
            ->add('state', ChoiceType::class,[
                'required' => false,
                'label' => false,
                'choices' => [
                    'neuf' => 'neuf',
                    'comme neuf' => 'comme neuf',
                    'utilisé' => 'utilisé'

                ],
                'attr' => [
                    'class' => 'form-group'
                ]  
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DataFilter::class,
            'method' => "GET",
            'csrf_protection' => false
        ]);
    }
    //par défaut renvoi un tableau mais pour une url propre c'est mieux de ne retourner qu'une chaine vide
    public function getBlockPrefix()
    {
        return ''
        ;
    }
}
