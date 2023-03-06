<?php

namespace App\Converts;

use DOMDocument;

class Xml extends Convert
{
    public const MODE = 'xml';

    public function beautify(): string
    {
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->uglified);

        return $dom->saveXML();
    }
}
