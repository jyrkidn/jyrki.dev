<?php

namespace App\Converts;

class Convert implements ConvertsInterface
{
    public string $uglified;
    public const MODE = '';

    public static function new(string $uglified)
    {
        return new static($uglified);
    }

    public function __construct(string $uglified)
    {
        $this->uglified = $uglified;
    }

    public function beautify(): string
    {
        return '';
    }

    public static function mode(): string
    {
        return static::MODE;
    }

    public static function name(): string
    {
        return class_basename(static::class);
    }
}