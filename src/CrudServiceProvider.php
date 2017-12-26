<?php
namespace evalue\crud;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes/routes.php';
       $this->publishes([__DIR__.'/config/config.php' => config_path('config.php')], 'crud');
       $this->loadTranslationsFrom(__DIR__.'/resources/lang','crud');
       $this->publishes([
        __DIR__.'/resources/views' => base_path('resources/views/admin/modules/'),
        ]);

        // $this->app->register(HtmlServiceProvider::class);
        //  $loader = AliasLoader::getInstance();
        //  $loader->alias('Form', '\Collective\Html\FormFacade');
        //  $loader->alias('Html', '\Collective\Html\FormFacade');
         // dd($loader);exit;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
          $this->app->make('evalue\crud\CrudController');
          $this->loadViewsFrom(__DIR__.'/resources/views', 'crud');
          $this->mergeConfigFrom(__DIR__.'/config/config.php', 'crud');
          require_once __DIR__ . '/Helper/constant_helper.php';
          require_once __DIR__ . '/Helper/my_helper.php';
    
     }
   
}
