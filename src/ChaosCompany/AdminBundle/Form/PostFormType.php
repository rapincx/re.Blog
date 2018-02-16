<?php

namespace ChaosCompany\AdminBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('imageFile', VichFileType::class, [
                'required' => false
            ])
            ->add('isPublished', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ]
            ])
            ->add('postType')
            ->add('category')
            ->add('user')
            ->add('tags', EntityType::class, [
                'class'        => 'ChaosCompany\BlogBundle\Entity\Tag',
                'multiple'     => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ChaosCompany\BlogBundle\Entity\Post',
        ]);
    }

    public function getBlockPrefix()
    {
        return 'chaos_company_admin_bundle_post_form_type';
    }
}
