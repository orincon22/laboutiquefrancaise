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

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled' => true,
                'label' => 'Mi correo'
            ])
            ->add('firstname', TextType::class,[
                'disabled' => true,
                'label' => 'Mi nombre'
            ])
            ->add('lastname', TextType::class,[
                'disabled' => true,
                'label' => 'Mi apellido'
            ])
            ->add('old_password', PasswordType::class,[
                'label'=> 'Mi contraseña actual',
                'mapped' => false,
                'attr' =>[
                    'placeholder' => 'Escriba su contraseña actual'
                ]
            ])
            ->add('new_password', RepeatedType::class,[
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'No coinciden las nuevas contraseñas',
                'label'=> 'Contraseña',
                'required' => true,
                'first_options' => [
                    'label' => 'Nueva contraseña',
                    'attr' => [
                        'placeholder' => 'Escriba la nueva contraseña'
                    ]
                ],
                'second_options' => [
                    'label' => 'Confirmar nueva contraseña',
                    'attr' => [
                        'placeholder' => 'Confirme la nueva contraseña'
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Actualizar'
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
