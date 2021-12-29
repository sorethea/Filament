<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Livewire\Component;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort =0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make("name")->required(),
                    Forms\Components\TextInput::make("email")->email()->required(),
                    Forms\Components\TextInput::make("password")->required()->password()->required()
                        ->hidden(fn(Component $livewire): bool => $livewire instanceof Pages\EditUser),
                    Forms\Components\BelongsToManyMultiSelect::make("roles")
                        ->relationship("roles","name"),
                ])->columns(['sm'=>2])->columnSpan(2),
                Forms\Components\Card::make()->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->content(fn (?User $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Forms\Components\Placeholder::make('updated_at')
                        ->content(fn (?User $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                ])->columnSpan(1)

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")->searchable()->sortable(),
                Tables\Columns\TextColumn::make("email")->searchable()->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //RelationManagers\RolesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
