# Ekko SDK PHP

[![Build Status](https://travis-ci.org/ekko-chat/ekko-sdk-php.svg?branch=master)](https://travis-ci.org/ekko-chat/ekko-sdk-php) 

PHP library for the Ekko API.

You can get your apiToken here: [https://dashboard.ekko.chat](https://dashboard.ekko.chat)

See full doc: [https://docs.ekko.chat/](https://docs.ekko.chat/)


## Install

Via Composer

``` bash
$ composer require ekko-chat/ekko-sdk-php
```

## Usage

``` php
$apiToken = 'XXXXX'
$client = new Ekko\Client($apiToken);
```

## Tests

```php
php composer tests
```
