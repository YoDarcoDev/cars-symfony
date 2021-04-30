<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'attr' => [
                    'placeholder' => "Prénom",
                    'class' => 'form-control'
                ]
            ])

            ->add('lastName', TextType::class, [
                'attr' => [
                    'placeholder' => "Nom",
                    'class' => "form-control"
                ]
            ])

            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => "Email",
                    'class' => "form-control"
                ]
            ])

            ->add('phone', NumberType::class, [
                'attr' => [
                    'placeholder' => "Téléphone",
                    'class' => "form-control"
                ]
            ])

            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => "Veuillez saisir l'objet de votre demande",
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
