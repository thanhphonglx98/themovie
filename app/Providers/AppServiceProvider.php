<?php

namespace App\Providers;

use App\Repository\TheMovieRepository;
use App\Repository\TheMovieRepositoryInterface;
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
        $this->app->bind(TheMovieRepositoryInterface::class, TheMovieRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
