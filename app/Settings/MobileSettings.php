<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class MobileSettings extends Settings
{
    public string $app_name;
    public string $logo;
    public array $home;
    public array $general;
    public array $theme;
    public array $other;
    public static function group(): string
    {
        return 'mobile';
    }
}
