<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Filament\Resources\MenuItemResource\RelationManagers;
use App\Filament\Roles;
use App\Models\MenuItem;
use Filament\Forms\Components;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filter;

class MenuItemResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                TextInput::make('link')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('link')
                    ->url(fn(MenuItem $menuItem) => $menuItem->link, true),
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
            Pages\ListMenuItems::routeTo('/', 'index'),
            Pages\CreateMenuItem::routeTo('/create', 'create'),
            Pages\EditMenuItem::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
