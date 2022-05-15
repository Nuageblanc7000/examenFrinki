<?php

namespace App\Form;

use App\Data\DataFilter;
use App\Entity\Category;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FilterAnnonceType extends AbstractType
{
    private $translator;
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', TextType::class,[
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' =>  $this->translator->trans('search'),
                    'class' => 'form-group'
                ]
            ])
            ->add('state', ChoiceType::class,[
                'required' => false,
                'label' => false,
                'choices' => [
                    $this->translator->trans('used') => 'utilisé',
                    $this->translator->trans('new') =>  'neuf',
                    $this->translator->trans('like new') => 'comme neuf'

                ],
                'attr' => [
                    'class' => 'form-group'
                ]  
            ] )
            ->add('cat',EntityType::class,
            [
                'required' => false,
                'label' => false,
                'class' => Category::class,
                'choice_label' =>'title'

            ])
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
