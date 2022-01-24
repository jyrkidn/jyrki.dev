<?php

namespace App\Filament\Resources;

use App\Enums\PostType;
use App\Filament\Resources\PostResource\Pages;
use Closure;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class PostResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form): Form
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
                    ->options(array_map(
                        fn(PostType $postType) => $postType->type(),
                        PostType::cases()
                    ))
                    ->reactive()
                    ->required(),

                Group::make([
                    TextInput::make('redirect_url')
                        ->required(),
                ])->hidden(fn (Closure $get) => $get('type') !== 'redirect'),

                Group::make([
                    RichEditor::make('content')
                        ->required(),
                ])->hidden(fn (Closure $get) => $get('type') !== 'article'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                BooleanColumn::make('is_online'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
