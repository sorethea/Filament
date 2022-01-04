<?php


namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class FirebaseSettings extends Settings
{
    public string $apiKey = "AIzaSyCdtDoWJBEQWHKFeToNiyVEgnhFXrtKHiE";
    public string $authDomain = "loyalty-7a4eb.firebaseapp.com";
    public string $projectId = "loyalty-7a4eb";
    public string $storageBucket = "loyalty-7a4eb.appspot.com";
    public string $messagingSenderId = "743687405274";
    public string $appId = "1:743687405274:web:667c5c94188896f6052fe3";
    public string $measurementId = "G-GLL5QF0B3Z";
    public string $token = "AAAArSc5Pto:APA91bHMYb8uCGw2l85laKRJGJ_8wzLnDZe_bGurRZ_F-NmZXLmLMJaPnynXoi8Hx9bq15AcJS-DWK-GI9KDzdVMaVjOmHmf-GslpR0KurENDegsLZofqk7Gs4nfG5COQo5Zp8f3p5So";

    public static function group(): string
    {
        return "firebase";
    }
}
