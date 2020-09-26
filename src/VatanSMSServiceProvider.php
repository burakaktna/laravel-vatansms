<?php


namespace Burakaktna\LaravelVatanSMS;

use Carbon\Laravel\ServiceProvider;

class VatanSMSServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'vatansms');

        $dist = __DIR__.'/../config/vatansms.php';

        if (function_exists('config_path')) {
            $this->publishes([
                $dist => config_path('vatansms.php'),
            ]);
        }

        $this->mergeConfigFrom($dist, 'vatansms');

        $this->app->bind(VatanSMSConfig::class, function () {
            return new VatanSMSConfig($this->app['config']['vatansms']);
        });
    }

    public function boot()
    {
        return parent::boot();
    }
}