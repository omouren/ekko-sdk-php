<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PostMessageDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class PostMessageDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return '/messages';
    }

    public function getBody()
    {
        $options = $this->getOptions();
        return array(
            'room_id' => $options['room_id'],
            'user_id' => $options['user_id'],
            'text' => $options['text'],
            'type' => isset($options['type']) ? $options['type'] : null,
            'custom_type' => isset($options['custom_type']) ? $options['custom_type'] : null,
            'metadatas' => isset($options['metadatas']) ? $options['metadatas'] : null
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'user_id',
            'text',
            'type',
            'metadatas',
            'custom_type'
        ]);
        $resolver->setRequired(['room_id', 'user_id', 'text']);
    }
}
