<?php 
/**
 * @author huasituo <info@huasituo.com>
 * @copyright ©2016-2100 huasituo.com
 * @license http://www.huasituo.com
 */
namespace Leizhishang\Lzssaas\Providers;

use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // $this->app->singleton('manage.request.log', function ($app) {
        //     return new \Leizhishang\Lzssaas\Http\Middleware\RequestLog($app['hstcms']);
        // });
        // $this->app->singleton('manage.auth.check', function ($app) {
        //     return new \Leizhishang\Lzssaas\Http\Middleware\CheckAuth($app['hstcms']);
        // });
 
    }
}
