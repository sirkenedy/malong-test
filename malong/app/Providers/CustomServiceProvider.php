<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Job\IJobService;
use App\Services\Job\JobService;

use App\Services\Application\IApplicationService;
use App\Services\Application\ApplicationService;

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
        $this->app->bind(IApplicationService::class, ApplicationService::class);
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
