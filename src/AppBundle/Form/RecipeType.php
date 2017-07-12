<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, ["label" => "Nom de la recette"])
                ->add('description', TextType::class, ["label" => "Description"])
                ->add('making', TextareaType::class, [
                    "label" => "Préparation",
                    "attr" => [
                        "class" => "tinymce",
                    ]
                ])
                ->add('bakingDuration', TextType::class, ["label" => "Durée de cuisson (mn)"])
                ->add('makingDuration', TextType::class, ["label" => "Durée de préparation (mn)"])
                ->add('guest', TextType::class, ["label" => "Nombre de personne"])
                ->add('ingredients', CollectionType::class, [
                    'entry_type'    => ShortIngredientType::class,
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'by_reference'  => false,
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Recipe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_recipe';
    }


}
