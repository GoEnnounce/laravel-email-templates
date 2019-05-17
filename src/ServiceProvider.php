<?php

namespace GoEnnounce\LaravelEmailTemplates;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-email-templates.php' => config_path('laravel-email-templates.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-email-templates.php',
            'laravel-email-templates'
        );

        $this->app->bind('laravel-email-templates', function ($app) {
            return new EmailTemplates(
                new EmailTemplateRepository(),
                $app->make('cache.store'),
                \Config::get('laravel-email-templates.css_file')
            );
        });
    }
}
