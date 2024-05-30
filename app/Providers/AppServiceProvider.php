<?php

namespace App\Providers;

use App\Repository\KaryawanRepository;
use App\Repository\KaryawanRepositoryImplement;
use App\Service\KaryawanServiceImplement;
use App\Service\KaryawanService;
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
        $this->app->bind(KaryawanRepository::class, KaryawanRepositoryImplement::class);
        $this->app->bind(KaryawanService::class, KaryawanServiceImplement::class);
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
