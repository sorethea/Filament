<?php

namespace App\Filament\Pages;

use App\Settings\MobileSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class MobileApp extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = MobileSettings::class;

    protected static ?string $navigationGroup = 'Settings';

    protected function getFormSchema(): array
    {
        return [
            Group::make()->schema([
                TextInput::make('app_name'),
                FileUpload::make('logo'),
                KeyValue::make('home'),
                KeyValue::make('general'),
                KeyValue::make('theme'),
                KeyValue::make('other'),
            ])->columns(1),

        ];
    }
}
