<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnnonceType extends ConfigType
{
    // private $translator;
    // public function __construct(TranslatorInterface $translator)
    // {
    //     $this->translator = $translator;
    
    // }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class ,$this->getConfiguration(null,null,null))
            ->add('description', TextType::class ,$this->getConfiguration(null,null,null))
            ->add('createdAt', TextType::class ,$this->getConfiguration(null,null,null))
            ->add('price', MoneyType::class ,$this->getConfiguration(null,null,null))
            ->add('state', ChoiceType::class ,$this->getConfiguration(null,null,null))
            ->add('city')
            ->add('delivry',ChoiceType::class,$this->getConfiguration(null,null,null,
            [
                'choices' => [
                    'bon état'
                ]
            ]))
            ->add('coverImage')
            ->add('color')
            ->add('brand')
            ->add('category')
            ->add('subCategory',)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}
