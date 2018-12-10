<?php

namespace App\Form;

use App\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('editeur_id',HiddenType::class, array(
                  'data' => 1,))

            ->add('service_id',ChoiceType::class , array(
               'choices'  => array(
                   'EOSER' => 1,

                  ),
                 ))
            ->add('titre')
            ->add('information',TextareaType::class , array(
                'attr' => array('cols' => '35', 'rows' => '8', 'id'=> 'actualite_information'),
            ))
        //    ->add('datePublication',HiddenType::class)
            ->add('dateDiffusion')
           // ->add('statut')
         //   ->add('valide')
         //  ->add('focus')
            ->add('differe', checkboxType::class , array(
              'required' => false,
               'attr' => array('id'=> 'actualite_differe'),
           ))
             
    

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class,
        ]);
    }
}
