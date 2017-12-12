<?php

namespace AppBundle\Form;

use AppBundle\Entity\Hobby;
use AppBundle\Entity\Hobbyy;
use AppBundle\Entity\OperatingSystem;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Vous n'avez pas saisi votre prénom"
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "Votre prénom doit comporter 2 caractères au minimum"
                    ])
                ]
            ])
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => "Vous n'avez pas saisi votre nom"
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "Votre nom doit comporter 2 caractères au minimum"
                    ])
                ]
            ])
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            /*
            *   EntityType : permet de relier un champ a une entite
            *   choix d'affichage
            *       expanded : selection de plusieurs champs, par defaut false
            *       multiple : selection de plusieurs choix, par defaut false
            *   combinaisons possibles :
            *       liste deroulante : expanded false / multiple false
            *       bouton radio : expanded true / multiple false
            *       cases a cocher : expanded true / multiple true
            *   choice_label : choix de la propriete de l'entite a afficher
            */
            ->add('hobbies', EntityType::class,[
                'class' => Hobby::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'constraints' => [
                    new Count([
                        'min' => 1,
                        'minMessage' => "Vous devez selectionner au minimum un hobbie",
                    ])
                ],
            ])
            ->add('operatingSystem',EntityType::class,[
                'class'=> OperatingSystem::class,
                'choice_label'=>'name', // La propriété de la classe qu'on veut afficher
                'expanded'=>true,
                'multiple'=>false,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
