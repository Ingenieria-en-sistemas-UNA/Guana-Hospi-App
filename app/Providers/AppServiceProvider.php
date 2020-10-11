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
        $this->app->bind('App\Repositories\InterventionTypeRepository', 'App\Repositories\InterventionTypeRepositoryImp');
        $this->app->bind('App\Repositories\PatientRepository', 'App\Repositories\PatientRepositoryImp');
        $this->app->bind('App\Repositories\PatientUnityRepository', 'App\Repositories\PatientUnityRepositoryImp');
        $this->app->bind('App\Repositories\PresentsRepository', 'App\Repositories\PresentsRepositoryImp');
        $this->app->bind('App\Repositories\QueryRepository', 'App\Repositories\QueryRepositoryImp');
        $this->app->bind('App\Repositories\SpecialtyRepository', 'App\Repositories\SpecialtyRepositoryImp');
        $this->app->bind('App\Repositories\SuffersRepository', 'App\Repositories\SuffersRepositoryImp');
        $this->app->bind('App\Repositories\SymptonRepository', 'App\Repositories\SymptonRepositoryImp');
        $this->app->bind('App\Repositories\UnityRepository', 'App\Repositories\UnityRepositoryImp');
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
