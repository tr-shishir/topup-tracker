<?php

namespace App\Providers;

use App\Models\TopTopupUser;
use App\Observers\TopTopupUserObserver;
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
    public function boot()
    {
        TopTopupUser::observe(TopTopupUserObserver::class);
    }
}
