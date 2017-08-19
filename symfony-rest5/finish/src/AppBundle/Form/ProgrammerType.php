<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgrammerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nickname', TextType::class, [
                // readonly if we're in edit mode
                'disabled' => $options['is_edit']
            ])
            ->add('avatarNumber', ChoiceType::class, [
                'choices' => [
                    // the key is the value that will be set
                    // the value/label isn't shown in an API, and could
                    // be set to anything
                    'Girl (green)' => 1,
                    'Boy' => 2,
                    'Cat' => 3,
                    'Boy with Hat' => 4,
                    'Happy Robot' => 5,
                    'Girl (purple)' => 6,
                ]
            ])
            ->add('tagLine', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Programmer',
            'is_edit' => false,
            'csrf_protection' => false,
        ));
    }
}
