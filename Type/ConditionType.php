<?php

namespace EugeniyPetrov\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConditionType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'default' => new \stdClass(),
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addModelTransformer(
                new CallbackTransformer(
                    function ($conditionAsArray) {
                        return json_encode($conditionAsArray);
                    },
                    function ($conditionAsString) {
                        return json_decode($conditionAsString, true);
                    }
                )
            );
    }

    public function getParent()
    {
        return HiddenType::class;
    }
}