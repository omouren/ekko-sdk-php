<?php

require_once __DIR__.'/../vendor/autoload.php';

use Ekko\Client;

// you retrieve theses token and endpoint in your ekko dashboard
$client = new Client('YOUR-API-TOKEN', 'YOUR-API-ENDPOINT');

// Create an user
$user = $client->createUser([
    'user_id' => '123',
    'username' => 'John Doe',
    'image_url' => '',
    'issue_access_token' => true
]);

var_dump($user->getBody());

$user = $client->updateUser([
    'user_id' => '123',
    'username' => 'Janette Doe',
    'image_url' => ''
]);

var_dump($user->getBody());