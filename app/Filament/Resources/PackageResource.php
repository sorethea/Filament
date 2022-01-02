<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use App\Models\Service;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Livewire\Features\Placeholder;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-grid-add';

    protected static ?string $navigationGroup = 'Clinic';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Card::make()->schema([
                        Forms\Components\TextInput::make('name')->required()->unique('packages', 'name', fn(?Package $record): ?Package => $record),
                        Forms\Components\TextInput::make('discount')->numeric()->default(10)->required(),
                        Forms\Components\Toggle::make('active'),
                        Forms\Components\MarkdownEditor::make('description')->columnSpan(2),
                    ]),
                    Forms\Components\Card::make()->schema([
                        Forms\Components\Placeholder::make('Services'),
                        Forms\Components\HasManyRepeater::make('items')
                            ->relationship('items')->schema([
                                Forms\Components\Select::make('service_id')
                                    ->label('Service')
                                    ->options(Service::query()->pluck('name', 'id'))
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, callable $set) => $set('unit_price', Service::find($state)?->rate ?? 0))
                                    ->columnSpan([
                                        'md' => 5,
                                    ]),
                                Forms\Components\TextInput::make('quantity')
                                    ->numeric()
                                    ->mask(
                                        fn(Forms\Components\TextInput\Mask $mask) => $mask
                                            ->numeric()
                                            ->integer()
                                    )
                                    ->default(1)
                                    ->columnSpan([
                                        'md' => 2,
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('unit_price')
                                    ->label('Unit Price')
                                    ->disabled()
                                    ->numeric()
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                            ])
                            ->dehydrated()
                            ->defaultItems(1)
                            ->disableLabel()
                            ->columns([
                                'md' => 10,
                            ])
                            ->required(),
                    ]),
                ])->columnSpan(2),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Card::make()->schema([
                        Forms\Components\Placeholder::make('total_amount')
                            ->content(fn(?Package $record): string => isset($record->total_amount) ? $record->total_amount : '-'),
                        Forms\Components\Placeholder::make('createdBy')
                            ->content(fn(?Package $record): string => isset($record->createdBy) ? $record->createdBy->name : '-'),
                        Forms\Components\Placeholder::make('created_at')
                            ->content(fn(?Package $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updatedBy')
                            ->content(fn(?Package $record): string => isset($record->updatedBy) ? $record->updatedBy->name : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->content(fn(?Package $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ]),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('discount'),
                Tables\Columns\TextColumn::make('total_amount'),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
