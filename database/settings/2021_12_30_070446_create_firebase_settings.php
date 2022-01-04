<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateFirebaseSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('firebase.apiKey','AIzaSyCdtDoWJBEQWHKFeToNiyVEgnhFXrtKHiE');
        $this->migrator->add('firebase.authDomain','loyalty-7a4eb.firebaseapp.com');
        $this->migrator->add('firebase.projectId','loyalty-7a4eb');
        $this->migrator->add('firebase.storageBucket','loyalty-7a4eb.appspot.com');
        $this->migrator->add('firebase.messagingSenderId','743687405274');
        $this->migrator->add('firebase.appId','1:743687405274:web:667c5c94188896f6052fe3');
        $this->migrator->add('firebase.measurementId','G-GLL5QF0B3Z');
        $this->migrator->add('firebase.token','AAAArSc5Pto:APA91bHMYb8uCGw2l85laKRJGJ_8wzLnDZe_bGurRZ_F-NmZXLmLMJaPnynXoi8Hx9bq15AcJS-DWK-GI9KDzdVMaVjOmHmf-GslpR0KurENDegsLZofqk7Gs4nfG5COQo5Zp8f3p5So');
    }
}
