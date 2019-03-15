<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entreprise_id')
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('username')
            ->add('password')
            ->add('plainPassword')
            ->add('salt')
            ->add('tel')
            ->add('smsc')
            ->add('dateCreation')
            ->add('titre')
            ->add('description')
            ->add('statut')
            ->add('etat')
            ->add('securite')
            ->add('partenairePrincipal_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
