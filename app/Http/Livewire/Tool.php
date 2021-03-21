<?php

namespace App\Http\Livewire;

use App\Converts\Xml;
use App\Converts\Json;
use App\Converts\Unserialize;
use Livewire\Component;
use Throwable;
use Highlight\Highlighter;
use Illuminate\Support\HtmlString;

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
        $this->error = '';

        $this->language = $this->converts[$convertClass]::mode();
        try {
            $hl = new Highlighter();
            $this->beautified = $hl->highlight(
                $this->language,
                $this->converts[$convertClass]::new($this->minified)->beautify()
            )->value;
        } catch (Throwable $e) {
            $this->error = html_entity_decode($e->getMessage());
            $this->beautified = '';
        }
    }
}
