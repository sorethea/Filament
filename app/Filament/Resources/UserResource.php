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
use Filament\Tables\Columns\BooleanColumn;
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
                    Forms\Components\TextInput::make("phone_number")
                        ->tel()
                        ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('{0}00-000-0000'))
                        ->required(),
                    Forms\Components\TextInput::make("password")->required()->password()->required()
                        ->hidden(fn(Component $livewire): bool => $livewire instanceof Pages\EditUser),
                    Forms\Components\DatePicker::make('birth_date'),
                    Forms\Components\BelongsToManyMultiSelect::make("roles")
                        ->relationship("roles","name"),
                    Forms\Components\Toggle::make('active'),
                    Forms\Components\Textarea::make('address')->columnSpan(2),
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
                Tables\Columns\TextColumn::make("phone_number")->searchable()->sortable(),
                Tables\Columns\TextColumn::make('birth_date')->searchable(),
                Tables\Columns\TextColumn::make('address')->searchable(),
                BooleanColumn::make('active')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
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
