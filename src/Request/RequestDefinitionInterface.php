<?php

namespace Ekko\Request;

interface RequestDefinitionInterface
{
    public function getMethod();

    public function getUrl();

    public function getBody();
}
