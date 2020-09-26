<?php


namespace Burakaktna\LaravelVatanSMS;

class VatanSMSServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            VatanSMSConfig::class,
            VatanSMSAPI::class,
            VatanSMSChannel::class,
            VatanSMSMessage::class,
        ];
    }
}