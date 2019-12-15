<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetCountUnreadMessagesDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class GetLastMessageInChannelDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('/rooms/%s/last_message', $this->getOptions()['room_id']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
        ]);
        $resolver->setRequired(['room_id']);
    }
}
