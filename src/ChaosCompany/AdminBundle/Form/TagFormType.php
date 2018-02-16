<?php

namespace ChaosCompany\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ChaosCompany\BlogBundle\Entity\Tag'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'chaos_company_admin_bundle_tag_form_type';
    }
}