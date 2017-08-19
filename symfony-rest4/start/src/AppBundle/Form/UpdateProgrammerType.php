<?php

namespace AppBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateProgrammerType extends ProgrammerType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        // override this!
        $resolver->setDefaults(['is_edit' => true]);
    }
}
