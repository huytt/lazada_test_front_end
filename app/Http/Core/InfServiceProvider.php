<?php

namespace App\Http\Core;

use Illuminate\Support\ServiceProvider;

class InfServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Http\Core\Util\ICrawler::class, \App\Http\Core\Util\CrawlerLazada::class);
        //:end-bindings:
    }
}
