<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PostChannelDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class PostChannelDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return '/rooms';
    }

    public function getBody()
    {
        return $this->getOptions();
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'private',
            'distinct',
            'users_ids',
        ]);
        $resolver->setAllowedTypes('private', ['bool']);
        $resolver->setAllowedTypes('distinct', ['bool']);
    }
}
