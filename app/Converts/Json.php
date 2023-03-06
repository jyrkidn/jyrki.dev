<?php

namespace App\Converts;

class Json extends Convert
{
    public const MODE = 'json';

    public function beautify(): string
    {
        $decodedJson = json_decode($this->uglified, false, 512, JSON_THROW_ON_ERROR);

        return json_encode($decodedJson, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
    }
}
