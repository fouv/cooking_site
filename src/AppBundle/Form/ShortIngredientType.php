<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShortIngredientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, ["label" => "Nom"])
                ->add('quantity', TextType::class, ["label" => "Quantité"])
                ->add('unit', ChoiceType::class, [
                    "label"     => "Unité de messure",
                    "attr"      => [
                        "class" => "browser-default",
                    ],
                    "choices"   => [
                        'Gramme' => 'g',
                        'Kilogramme' => 'kg',
                        'centilitre' => 'cl',
                        'millilitre' => 'ml',
                        'cuillère' => 'cu',
                    ]
                ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ingredient'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ingredient';
    }


}
