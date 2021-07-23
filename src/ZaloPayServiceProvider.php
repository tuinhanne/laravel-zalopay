<?php

namespace Tuinhanne\Zalopay;

use Illuminate\Support\ServiceProvider;

class ZaloPayServiceProvider extends ServiceProvider
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
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/zalopay.php' => config_path('zalopay.php'),
        ]);
    }
}
