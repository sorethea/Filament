<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMobileSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mobile.app_name','');
        $this->migrator->add('mobile.logo','KinqyM89FGQuQjOsBoceZlxgArMEWSXlBhxXCFOp.png');
        $this->migrator->add('mobile.home',[]);
        $this->migrator->add('mobile.general',[]);
        $this->migrator->add('mobile.theme',[]);
        $this->migrator->add('mobile.other',[]);
    }
}
