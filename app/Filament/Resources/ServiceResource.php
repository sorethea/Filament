<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Livewire\Component;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'Clinic';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('name')->required()->unique('services','name',fn(?Service $record):?Service=>$record),
                    Forms\Components\TextInput::make('unit_price')->numeric()->default(0)->step(0.01)->required(),
                    Forms\Components\Toggle::make('active')->default(true),
                    Forms\Components\KeyValue::make('procedure')
                        ->columnSpan(2),
                ])->columns(['sm'=>2])->columnSpan(2),
                Forms\Components\Card::make()->schema([
                    Forms\Components\Placeholder::make('createdBy')
                        ->content(fn(?Service $record): string => isset($record->createdBy) ? $record->createdBy->name : '-'),
                    Forms\Components\Placeholder::make('created_at')
                        ->content(fn (?Service $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Forms\Components\Placeholder::make('updatedBy')
                        ->content(fn(?Service $record): string => isset($record->updatedBy) ? $record->updatedBy->name : '-'),
                    Forms\Components\Placeholder::make('updated_at')
                        ->content(fn (?Service $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('unit_price'),
                Tables\Columns\BooleanColumn::make('active'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
