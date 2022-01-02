<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers;
use App\Models\Doctor;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Livewire\Component;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Clinic';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('name')->required(),
                    Forms\Components\TextInput::make('phone_number')
                        ->tel()
                        ->mask(fn (Forms\Components\TextInput\Mask $mask) => $mask->pattern('{0}00-000-0000'))
                        ->unique('users','phone_number',fn (?Doctor $record):?User => $record->user??null)
                        ->required(),
                    Forms\Components\TextInput::make("password")->required()->password()->required()
                        ->visible(fn(Component $livewire): bool => $livewire instanceof Pages\CreateDoctor),
                    Forms\Components\Select::make('gender')->options(['male'=>'Male','female'=>'Female'])->required(),
                    Forms\Components\DatePicker::make('birth_date'),
                    Forms\Components\TextInput::make('address1'),
                    Forms\Components\TextInput::make('address2'),
                    Forms\Components\TextInput::make('city'),
                    Forms\Components\select::make('department'),
                    Forms\Components\TextInput::make('position'),
                    Forms\Components\TextInput::make('specialist'),
                    Forms\Components\TextInput::make('qualification'),
                    Forms\Components\Toggle::make('active'),
                    Forms\Components\MarkdownEditor::make('note')->columnSpan(2),
                ])->columns(['sm'=>2])->columnSpan(2),
                Forms\Components\Card::make()->schema([
                    Forms\Components\Placeholder::make('createdBy')
                        ->content(fn(?Doctor $record): string => $record ? $record->createdBy->name : '-'),
                    Forms\Components\Placeholder::make('created_at')
                        ->content(fn (?Doctor $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Forms\Components\Placeholder::make('updatedBy')
                        ->content(fn(?Doctor $record): string => $record ? $record->updatedBy->name : '-'),
                    Forms\Components\Placeholder::make('updated_at')
                        ->content(fn (?Doctor $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('phone_number')->searchable(),
                Tables\Columns\BadgeColumn::make('gender')
                    ->colors(['primary'=>'male','secondary'=>'female'])
                    ->enum(['male'=>'Male','female'=>'Female']),
                Tables\Columns\TextColumn::make('city')->searchable(),
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
            'view' => Pages\ViewDoctor::route('/{record}'),
        ];
    }
}
