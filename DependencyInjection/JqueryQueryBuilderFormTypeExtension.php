<?php

namespace EugeniyPetrov\JqueryQueryBuilderFormTypeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class JqueryQueryBuilderFormTypeExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $resources = $container->getParameter('twig.form.resources');
        $container->setParameter('twig.form.resources', array_merge(
            ['@JqueryQueryBuilderFormType/condition.html.twig'],
            $resources
        ));
    }
}