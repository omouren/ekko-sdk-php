<?php

namespace Ekko;

use Ekko\Http\Response;
use Ekko\Request\DeleteChannelDefinition;
use Ekko\Request\GetCountUnreadMessagesDefinition;
use Ekko\Request\GetLastMessageInChannelDefinition;
use Ekko\Request\PostChannelDefinition;
use Ekko\Request\PutChannelDefinition;
use Ekko\Request\PostMessageDefinition;
use Ekko\Request\PostUserDefinition;
use Ekko\Request\PutMessageDefinition;
use Ekko\Request\DeleteMessageDefinition;
use Ekko\Request\GetMessageDefinition;
use Ekko\Request\GetMessagesInChannelDefinition;
use Ekko\Request\PutUserDefinition;
use Ekko\Request\RequestDefinitionInterface;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class Client
{
    private $apiToken;

    private $apiEndpoint;

    protected $httpClient;

    /**
     * Constructor.
     * @param $apiToken
     */
    public function __construct($apiToken, $apiEndpoint)
    {
        $this->apiToken = $apiToken;
        $this->setApiEndpoint($apiEndpoint);
    }

    private function setApiEndpoint($url)
    {
        if (preg_match('/http/', $url)) {
            $this->apiEndpoint = $url;
        } else {
            $this->apiEndpoint = sprintf('https://%s', $url);
        }
    }

    public function getClient()
    {
        if (empty($this->httpClient)) {
            $this->httpClient = new GuzzleClient([
                'base_uri' => $this->apiEndpoint,
                'force_ip_resolve' => 'v4',
                'connect_timeout' => 10,
                'timeout' => 15,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'api-key' => sprintf('%s', $this->apiToken)
                ]
            ]);
        }

        return $this->httpClient;
    }

    private function send(RequestDefinitionInterface $definition)
    {
        $response = $this->getClient()->request(
            $definition->getMethod(),
            $definition->getUrl(),
            [
                'body' => json_encode($definition->getBody())
            ]
        );

        return new Response($response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @doc https://docs.ekko.chat/docs/api/api_users/
     * @param array $options
     * @return Response
     */
    public function createUser(array $options = [])
    {
        return $this->send(new PostUserDefinition($options));
    }


    /**
     * @doc https://docs.ekko.chat/docs/api/api_users/
     * @param array $options
     * @return Response
     */
    public function updateUser(array $options = [])
    {
        return $this->send(new PutUserDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function deleteChannel(array $options = [])
    {
        return $this->send(new DeleteChannelDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function getMessage(array $options = [])
    {
        return $this->send(new GetMessageDefinition($options));
    }
   
    /**
     * @param array $options
     * @return Response
     */
    public function createMessage(array $options = [])
    {
        return $this->send(new PostMessageDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function updateMessage(array $options = [])
    {
        return $this->send(new PutMessageDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function deleteMessage(array $options = [])
    {
        return $this->send(new DeleteMessageDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function createChannel(array $options = [])
    {
        return $this->send(new PostChannelDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function updateChannel(array $options = [])
    {
        return $this->send(new PutChannelDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function countUnreadMessages(array $options = [])
    {
        return $this->send(new GetCountUnreadMessagesDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function lastMessageInChannel(array $options = [])
    {
        return $this->send(new GetLastMessageInChannelDefinition($options));
    }

    /**
     * @param array $options
     * @return Response
     */
    public function messagesInChannel(array $options = [])
    {
        return $this->send(new GetMessagesInChannelDefinition($options));
    }
}
