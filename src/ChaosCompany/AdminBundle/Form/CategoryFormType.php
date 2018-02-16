<?php

namespace ChaosCompany\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('parent')
            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ChaosCompany\BlogBundle\Entity\Category'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'chaos_company_admin_bundle_category_form_type';
    }
}