<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * GetMessageDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class GetMessageDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'GET';
    }

    public function getBaseUrl()
    {
        return sprintf('/messages/%s/%s', $this->getOptions()['room_id'], $this->getOptions()['message_id']);
    }

    public function getBody()
    {
        $options = $this->getOptions();
        return array(
            'room_id' => $options['room_id'],
            'message_id' => $options['message_id']
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'message_id'
        ]);
        $resolver->setRequired(['room_id', 'message_id']);
    }
}
