<?php

namespace App\Converts;

use DOMDocument;

class Unserialize extends Convert
{
    public const MODE = 'json';

    public function beautify(): string
    {
        $unserialize = unserialize($this->uglified);
        return json_encode($unserialize, JSON_PRETTY_PRINT|JSON_THROW_ON_ERROR);
    }
}