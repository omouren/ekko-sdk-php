<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * DeleteChannelDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class DeleteChannelDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'DELETE';
    }

    public function getBaseUrl()
    {
        return sprintf('/rooms/%s', $this->getOptions()['id']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'id'
        ]);
        $resolver->setRequired(['id']);
    }
}
