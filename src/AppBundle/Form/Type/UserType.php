<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserType
 * @package AppBundle\Form\Type
 */
class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
                'label' => 'First Name ',
                'attr' => array(
                    'placeholder' => 'Enter first name',
                    'style' => 'width: 100%'
                )
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Last Name ',
                'attr' => array(
                    'placeholder' => 'Enter last name',
                    'style' => 'width: 100%'
                )
            ))
            ->add('phone', TextType::class, array(
                'label' => 'Phone Number ',
                'attr' => array(
                    'placeholder' => 'Enter phone number',
                    'style' => 'width: 100%'
                )
            ))
            ->add('city', TextType::class, array(
                'label' => 'City ',
                'attr' => array(
                    'placeholder' => 'Enter city',
                    'style' => 'width: 100%'
                )
            ))
            ->add('country', TextType::class, array(
                'label' => 'Country ',
                'attr' => array(
                    'placeholder' => 'Enter country',
                    'style' => 'width: 100%'
                )
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_bundle_user_type';
    }
}
