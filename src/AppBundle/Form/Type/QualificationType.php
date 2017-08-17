<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Qualification;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class QualificationType
 * @package AppBundle\Form\Type
 */
class QualificationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Institution Name ',
                'attr' => array(
                    'placeholder' => 'Enter institution name',
                    'style' => 'width: 100%'
                )
            ))
            ->add('type', TextType::class, array(
                'label' => 'Type of Qualification ',
                'attr' => array(
                    'placeholder' => 'Enter type of qualification',
                    'style' => 'width: 100%'
                )
            ))
            ->add('subject', TextType::class, array(
                'label' => 'Subject ',
                'attr' => array(
                    'placeholder' => 'Enter subject ',
                    'style' => 'width: 100%'
                )
            ))
            ->add('grade', TextType::class, array(
                'label' => 'Grade ',
                'attr' => array(
                    'placeholder' => 'Enter grade awarded',
                    'style' => 'width: 100%'
                )
            ))
            ->add('startDate')
            ->add('endDate')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Qualification::class,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_bundle_qualification_type';
    }
}
