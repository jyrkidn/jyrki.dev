<?php

namespace App\Converts;

interface ConvertsInterface
{
    public static function mode(): string;
    public static function name(): string;
    public function beautify(): string;
}