<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Interest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class InterestType
 * @package AppBundle\Form\Type
 */
class InterestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextareaType::class, array(
                'label' => 'Description',
                'attr' => array(
                    'placeholder' => 'Enter interest',
                    'style' => 'width: 100%'
                )
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Interest::class,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_bundle_interest_type';
    }
}
