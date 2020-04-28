<?php 
/**
 * @author leizhishang <969111802@qq.com>
 * @copyright ©2016-2100 leizhishang.com
 * @license http://www.leizhishang.com
 */
namespace Leizhishang\Lzssaas;


use Leizhishang\Lzssaas\Providers\RouteServiceProvider;
use Leizhishang\Lzssaas\Providers\HelperServiceProvider;
use Leizhishang\Lzssaas\Providers\LibrariesServiceProvider;
use Leizhishang\Lzssaas\Providers\MiddlewareServiceProvider;

//use Huasituo\Hstcms\Contracts\Repository;
//use Huasituo\Hstcms\Providers\ConsoleServiceProvider;
// use Huasituo\Hstcms\Providers\RepositoryServiceProvider;
// use Huasituo\Hstcms\Providers\GeneratorServiceProvider;
// use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;

class LzssaasServiceProvider extends ServiceProvider
{ 
    /**
     * @var bool Indicates if loading of the provider is deferred.
     */
    protected $defer = false;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/lzssaas.php' => config_path('lzssaas.php'),
        ], 'config');
        $this->loadTranslationsFrom(__DIR__.'/../translations', 'lzssaas');

        
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/lzssaas.php', 'lzssaas'
        );
        //$this->app->register(RouteServiceProvider::class);
        //$this->app->register(ConsoleServiceProvider::class);
        //$this->app->register(RepositoryServiceProvider::class);
        //$this->app->register(GeneratorServiceProvider::class);
        //$this->app->register(MiddlewareServiceProvider::class);
        $this->app->register(HelperServiceProvider::class);
        $this->app->register(LibrariesServiceProvider::class);
        $this->app->singleton('lzssaas', function ($app) {
            $repository = $app->make(Repository::class);
            return new Lzssaas($app, $repository);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string
     */
    public function provides()
    {
        return ['lzssaas'];
    }
}
