<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PutMessageDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class PutMessageDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'PUT';
    }

    public function getBaseUrl()
    {
        return sprintf('/messages/%s/%s', $this->getOptions()['room_id'], $this->getOptions()['message_id']);
    }

    public function getBody()
    {
        $options = $this->getOptions();
        return array_filter(array(
            'room_id' => $options['room_id'],
            'message_id' => $options['message_id'],
            'text' => isset($options['text']) ? $options['text'] : null,
            'custom_type' => isset($options['custom_type']) ? $options['custom_type'] : null,
            'metadatas' => isset($options['metadatas']) ? $options['metadatas'] : null,
        ));
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'message_id',
            'text',
            'custom_type',
            'metadatas'
        ]);
        $resolver->setRequired(['room_id', 'message_id']);
    }
}
