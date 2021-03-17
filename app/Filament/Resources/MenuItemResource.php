<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Filament\Resources\MenuItemResource\RelationManagers;
use App\Filament\Roles;
use App\Models\MenuItem;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Components\TextInput;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Columns\Text;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class MenuItemResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                TextInput::make('link')
                    ->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Text::make('title'),
                Text::make('link')
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
