<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;

class ConfigType extends AbstractType
{
    /**
     * config de base pour un champ du form
     *
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    protected function getConfiguration($label,$placeholder,$class,$options=[]) : array
    {
        return array_merge_recursive([
            'label' => $label,
                'attr' => [
                    'placeholder'=> $placeholder,
                    'class' => $class
                ]
                ],$options);
    }
}