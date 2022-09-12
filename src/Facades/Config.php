<?php
namespace CisConfig\Facades;

use Illuminate\Support\Facades\Facade;

class Config extends Facade {

    public static function getFacadeAccessor() {
        return 'cis-config';
    }
}
