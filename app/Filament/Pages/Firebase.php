<?php

namespace App\Filament\Pages;

use App\Settings\FirebaseSettings;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class Firebase extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-fire';

    protected static ?string $navigationGroup = 'Settings';

    protected static string $settings = FirebaseSettings::class;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('apiKey'),
            TextInput::make('authDomain'),
            TextInput::make('projectId'),
            TextInput::make('storageBucket'),
            TextInput::make('messagingSenderId'),
            TextInput::make('appId'),
            TextInput::make('measurementId'),
            TextInput::make('token'),
        ];
    }
}
