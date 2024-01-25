<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\Livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class LivreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('auteur')
            ->add('votes')
            ->add('date_parution', DateType::class, [
                'widget' => 'single_text',])
            ->add('votes')


                       ->add('genre', EntityType::class, [
                           // looks for choices from this entity
                           'class' => Genre::class,
                           'choice_label' => 'nom',

                       ])
           /*->add('date_ajout', DateType::class, [
                'widget' => 'single_text',])
            */
            ->add('submit',submitType::class,['label'=>"Ajouter"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
