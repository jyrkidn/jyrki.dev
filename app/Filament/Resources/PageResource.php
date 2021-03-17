<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Components\Checkbox;
use Filament\Resources\Forms\Components\DateTimePicker;
use Filament\Resources\Forms\Components\RichEditor;
use Filament\Resources\Forms\Components\TextInput;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Columns\Boolean;
use Filament\Resources\Tables\Columns\Text;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class PageResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                DateTimePicker::make('published_at'),

                RichEditor::make('content')
                    ->required(),

                Checkbox::make('is_online'),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Text::make('title'),
                Text::make('slug'),
                Boolean::make('is_online'),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListPages::routeTo('/', 'index'),
            Pages\CreatePage::routeTo('/create', 'create'),
            Pages\EditPage::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
