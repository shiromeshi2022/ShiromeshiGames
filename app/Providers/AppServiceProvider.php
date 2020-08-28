<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        /** Schema::defaultStringLength(191);
        * if (\App::environment('production')) {
        *    \URL::forceScheme('https');
        * }
        */
        // 本番環境のassetがhttpになりエラーが出ていた→ローカルと本番で分岐して解決
        if (in_array(config('app.env'), ['prd', 'heroku'], true)) {
            $url->forceScheme('https');
        }

    }
}
