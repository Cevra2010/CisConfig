<?php
namespace CisConfig;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CisConfigServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('cis-config',function() {
            return new Config();
        });
    }

    public function boot() {
        $this->publishes([
            __DIR__.'/../config/cis-config.php' => config_path('cis-config.php'),
        ]);

        $this->loadMigrationsFrom(
            __DIR__.'/database/migrations'
        );
    }
}
