<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        # 创建中文Factory实例
        $this->app->singleton(Generator::class,function(){
            return Factory::create('zh_CN');
        });
        if(env('REDIRECT_HTTPS'))
        {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
