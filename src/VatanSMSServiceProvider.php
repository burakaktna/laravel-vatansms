<?php


namespace Burakaktna\LaravelVatanSMS;

use Burakaktna\LaravelVatanSMS\Facades\VatanSMS;
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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'vatansms');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('vatansms.php'),
            ], 'config');
        }
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'vatansms');

        $this->app->singleton('vatansms', function () {
            return new VatanSMS();
        });

        $this->app->bind(VatanSMSConfig::class, function () {
            return new VatanSMSConfig($this->app['config']['vatansms']);
        });
    }
}