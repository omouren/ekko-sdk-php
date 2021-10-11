<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PutChannelDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class PutChannelDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'PUT';
    }

    public function getBaseUrl()
    {
        return sprintf('/rooms/%s', $this->getOptions()['room_id']);
    }

    public function getBody()
    {
        $options = $this->getOptions();
        return array(
            'name' => isset($options['name']) ? $options['name'] : null,
            'custom_type' => isset($options['custom_type']) ? $options['custom_type'] : null,
            'metadatas' => isset($options['metadatas']) ? $options['metadatas'] : null
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'custom_type',
            'name',
            'metadatas',
        ]);
    }
}
