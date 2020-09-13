<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder as ESLientBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 注册一个名为 ES 的单例
        $this->app->singleton('es', function () {
            $builder = ESLientBuilder::create()->setHosts(config('database.elasticsearch.hosts'));
            // 如果是开发环境
            if (app()->environment() === 'local') {
                // 记录 es 的请求和返回数据，打印到日志文件中
                $builder->setLogger(app('log')->driver());
            }
            return $builder->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
