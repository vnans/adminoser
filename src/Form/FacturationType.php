<?php

namespace App\Form;

use App\Entity\Facturation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacturationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('souscription_id')
            ->add('montant')
            ->add('soldeInitial')
            ->add('soldeRestant')
            ->add('description')
            ->add('date')
            ->add('statut')
            ->add('tel')
            ->add('smsc')
            ->add('serviceCode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facturation::class,
        ]);
    }
}
