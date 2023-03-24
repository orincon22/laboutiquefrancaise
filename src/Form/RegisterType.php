<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,[
                'label' => 'Nombre',
                'attr'=>[
                    'placeholder' => 'Escriba su nombre'
                ]
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Apellidos',
                'attr'=>[
                    'placeholder' => 'Escriba sus apellidos'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Correo',
                'attr'=>[
                    'placeholder' => 'Escriba su correo'
                ]
            ])
            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => 'No coinciden las contraseñas',
                'label'=> 'Contraseña',
                'required' => true,
                'first_options' => [
                    'label' => 'Contraseña',
                    'attr' => [
                        'placeholder' => 'Escriba una contraseña'
                        ]
                    ],
                'second_options' => [
                    'label' => 'Confirmar contraseña',
                    'attr' => [
                        'placeholder' => 'Confirme la contraseña'
                        ]
                    ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Registrarse'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
