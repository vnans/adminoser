<?php

namespace App\Form;

use App\Entity\Souscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SouscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('abonne_id')
            ->add('service_id')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('dateReception')
            ->add('dateFacturation')
            ->add('dateReabonnement')
            ->add('dateDesabonnement')
            ->add('nbre')
            ->add('statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Souscription::class,
        ]);
    }
}
