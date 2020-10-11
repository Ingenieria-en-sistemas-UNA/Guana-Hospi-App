<?php

namespace App\Providers;

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
        $this->app->bind('App\Repositories\PeopleRepository', 'App\Repositories\PeopleRepositoryImp');
        $this->app->bind('App\Repositories\DiseaseRepository', 'App\Repositories\DiseaseRepositoryImp');
        $this->app->bind('App\Repositories\DoctorRepository', 'App\Repositories\DoctorRepositoryImp');
        $this->app->bind('App\Repositories\DoctorUnityRepository', 'App\Repositories\DoctorUnityRepositoryImp');
        $this->app->bind('App\Repositories\InterventionRepository', 'App\Repositories\InterventionRepositoryImp');
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
