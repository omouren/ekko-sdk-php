<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * DeleteMessageDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class DeleteMessageDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'DELETE';
    }

    public function getBaseUrl()
    {
        return sprintf('/messages/%s/%s', $this->getOptions()['room_id'], $this->getOptions()['id']);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'id'
        ]);
        $resolver->setRequired(['room_id', 'id']);
    }
}
