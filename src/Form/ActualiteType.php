<?php

namespace App\Form;

use App\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('editeur_id')
            ->add('service_id',ChoiceType::class , array(
               'choices'  => array(
                   'EOSER' => true,

               ),
           ))
            ->add('titre')
            ->add('information',TextareaType::class , array(
                'attr' => array('cols' => '35', 'rows' => '8', 'id'=> 'actualite_information'),
            ))
          //  ->add('datePublication')
            ->add('dateDiffusion')
           // ->add('statut')
         //   ->add('valide')
         //  ->add('focus')
            ->add('differe', checkboxType::class , array(
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
