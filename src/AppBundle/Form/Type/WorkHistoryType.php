<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\WorkHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class WorkHistoryType
 * @package AppBundle\Form\Type
 */
class WorkHistoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Company Name ',
                'attr' => array(
                    'placeholder' => 'Enter company name ',
                    'style' => 'width: 100%'
                )
            ))
            ->add('jobTitle', TextType::class, array(
                'label' => 'Job Title ',
                'attr' => array(
                    'placeholder' => 'Enter job title',
                    'style' => 'width: 100%'
                )
            ))
            ->add('responsibilities', TextareaType::class, array(
                'label' => 'Responsibilities ',
                'attr' => array(
                    'placeholder' => 'Enter job responsibilities',
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
            'data_class' => WorkHistory::class,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_bundle_work_history_type';
    }
}
