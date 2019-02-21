<?php

namespace App\Providers;

use App\Repositories\CountryEloquentRepository;
use App\Repositories\Interfaces\ICountryRepository;
use App\Repositories\Interfaces\IResponseTypeRepository;
use App\Repositories\Interfaces\IWebRequestRepository;
use App\Repositories\ResponseTypeEloquentRepository;
use App\Repositories\WebRequestEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(ICountryRepository::class, CountryEloquentRepository::class);
        $this->app->bind(IResponseTypeRepository::class, ResponseTypeEloquentRepository::class);
        $this->app->bind(IWebRequestRepository::class, WebRequestEloquentRepository::class);
    }
}
