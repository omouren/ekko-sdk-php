<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PutUserDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class PutUserDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'PUT';
    }

    public function getBaseUrl()
    {
        return sprintf('/user/%s', $this->getOptions()['user_id']);
    }

    public function getBody()
    {
        $options = $this->getOptions();
        return array(
            'user_id' => $options['user_id'],
            'username' => $options['username'],
            'image_url' => isset($options['image_url']) ? $options['image_url'] : null,
            'issue_access_token' => isset($options['issue_access_token']) ? $options['issue_access_token'] : false
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'user_id',
            'username',
            'image_url',
            'issue_access_token',
            'email'
        ]);
        $resolver->setAllowedTypes('issue_access_token', ['bool']);
        $resolver->setRequired(['user_id']);
    }
}
