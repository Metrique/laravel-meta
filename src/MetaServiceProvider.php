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
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'laravel-meta');

        // Config
        $this->publishes([
            __DIR__.'/Resources/config/meta.php' => config_path('meta.php'),
        ], 'meta-config');

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
        $this->registerMetaRepository();
    }

    /**
     * Register the MetaRepository binding
     * @return void
     */
    private function registerMetaRepository()
    {
        $this->app->singleton(
            MetaRepositoryInterface::class,
            MetaRepository::class
        );
    }
}