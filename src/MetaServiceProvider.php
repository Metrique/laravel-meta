<?php 

namespace Metrique\Meta;

use Illuminate\Support\ServiceProvider;
use Metrique\Meta\Contracts\MetaRepositoryInterface;
use Metrique\Meta\MetaRepository;

class MetaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        // Config
        $this->publishes([
            __DIR__.'/Resources/config/meta.php' => config_path('meta.php'),
        ]);

        // View
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'laravel-meta');

        // View composer
        view()->composer(
            'laravel-meta::meta',
            'Metrique\Meta\MetaViewComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            MetaRepositoryInterface::class,
            MetaRepository::class
        );
    }
}