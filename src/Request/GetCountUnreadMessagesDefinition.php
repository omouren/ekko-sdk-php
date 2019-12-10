<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetCountUnreadMessagesDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class GetCountUnreadMessagesDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('/user/%s/unread_message_count', $this->getOptions()['user_id']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'user_id',
        ]);
        $resolver->setRequired(['user_id']);
    }
}
