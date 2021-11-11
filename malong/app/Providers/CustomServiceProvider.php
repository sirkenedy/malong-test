<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Job\IJobService;
use App\Services\Job\JobService;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IJobService::class, JobService::class);
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
