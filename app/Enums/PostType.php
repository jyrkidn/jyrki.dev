<?php

namespace App\Enums;

enum PostType: string
{
    case REDIRECT = 'redirect';
    case ARTICLE = 'article';

    public function type(): string
    {
        return match ($this) {
            self::REDIRECT => 'Redirect',
            self::ARTICLE => 'Article',
        };
    }
}
