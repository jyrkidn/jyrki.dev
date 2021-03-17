<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Components\Checkbox;
use Filament\Resources\Forms\Components\DateTimePicker;
use Filament\Resources\Forms\Components\Group;
use Filament\Resources\Forms\Components\RichEditor;
use Filament\Resources\Forms\Components\Select;
use Filament\Resources\Forms\Components\Textarea;
use Filament\Resources\Forms\Components\TextInput;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Columns\Boolean;
use Filament\Resources\Tables\Columns\Text;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class PostResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                DateTimePicker::make('published_at'),

                Textarea::make('intro')
                    ->required(),

                Checkbox::make('is_online'),

                Select::make('type')
                    ->placeholder('Select a type')
                    ->options([
                        'redirect' => 'Redirect',
                        'article' => 'Article',
                    ])
                    ->dependable()
                    ->required(),

                Group::make([
                    TextInput::make('redirect_url')
                        ->required(),
                ])->when(fn ($record) => $record->type === 'redirect'),

                Group::make([
                    RichEditor::make('content')
                        ->required(),
                ])->when(fn ($record) => $record->type === 'article'),
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
            Pages\ListPosts::routeTo('/', 'index'),
            Pages\CreatePost::routeTo('/create', 'create'),
            Pages\EditPost::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
