<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetMessagesInChannelDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class GetMessagesInChannelDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('/rooms/%s/messages', $this->getOptions()['room_id']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'page',
        ]);
        $resolver->setRequired(['room_id']);
    }
}