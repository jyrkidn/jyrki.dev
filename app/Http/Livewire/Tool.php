<?php

namespace App\Http\Livewire;

use App\Converts\Xml;
use App\Converts\Json;
use App\Converts\Unserialize;
use Livewire\Component;
use Throwable;
use Highlight\Highlighter;
use Spatie\ShikiPhp\Shiki;

class Tool extends Component
{
    public string $minified = '';
    public string $error = '';
    public string $beautified = '';
    public string $language = 'json';

    public array $converts = [
        'xml' => Xml::class,
        'json' => Json::class,
        'unserialize' => Unserialize::class,
    ];

    public function render()
    {
        return view('livewire.tool');
    }

    public function convert($convertClass)
    {
        putenv('PATH=/home/jyrki/.nvm/versions/node/v14.16.1/bin');

        $this->error = '';

        if (! $this->minified) {
            return $this->error = 'Please provide some input';
        }

        try {
            $this->beautified = Shiki::highlight(
                code: $this->converts[$convertClass]::new($this->minified)->beautify(),
                language: $this->converts[$convertClass]::mode(),
                theme: 'github-light',
            );
        } catch (Throwable $e) {
            $this->error = html_entity_decode($e->getMessage());
            $this->beautified = '';
        }
    }
}
