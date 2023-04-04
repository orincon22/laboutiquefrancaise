<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Nombre de la direccion',
                'attr' => [
                    'placeholder' => 'Escriba el nombre de la direccion'
                ]
            ])
            ->add('firstname', TextType::class,[
                'label' => 'Nombre',
                'attr' => [
                    'placeholder' => 'Escriba su nombre'
                ]
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Apellido',
                'attr' => [
                    'placeholder' => 'Escriba su apellido'
                ]
            ])
            ->add('company', TextType::class,[
                'label' => 'Compañia',
                'attr' => [
                    'placeholder' => '(Opcional) Escriba el nombre de su compañia'
                ]
            ])
            ->add('address', TextType::class,[
                'label' => 'Dirección',
                'attr' => [
                    'placeholder' => 'Calle ...'
                ]
            ])
            ->add('postal', TextType::class,[
                'label' => 'Codigo postal',
                'attr' => [
                    'placeholder' => 'Escriba su codigo postal'
                ]
            ])
            ->add('city', TextType::class,[
                'label' => 'Ciudad',
                'attr' => [
                    'placeholder' => 'Escriba el nombre de la ciudad'
                ]
            ])
            ->add('country', CountryType::class,[
                'label' => 'País',
                'attr' => [
                    'placeholder' => 'País'
                ]
            ])
            ->add('phone', TelType::class,[
                'label' => 'Telefono',
                'attr' => [
                    'placeholder' => 'Escriba su teléfono'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Guardar',
                'attr' => [
                    'class' => 'btn-block btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
