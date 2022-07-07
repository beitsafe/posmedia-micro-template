<?php

namespace App\Providers;

use App\Interfaces\EloquentRepositoryInterface;
use App\Interfaces\OptionRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\OptionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(OptionRepositoryInterface::class, OptionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
