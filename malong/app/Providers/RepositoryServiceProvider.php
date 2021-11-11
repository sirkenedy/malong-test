<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\IReadOnlyRepository;
use App\Repositories\IWriteModifyRepository;
use App\Repositories\Eloquent\WriteModifyRepository;
use App\Repositories\Eloquent\ReadWriteModifyRepository;
use App\Repositories\Eloquent\ReadOnlyRespository;

use App\Repositories\Eloquent\Job\JobRepository;
use App\Repositories\Eloquent\Job\JobRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IWriteModifyRepository::class, WriteModifyRepository::class);
        $this->app->bind(IReadOnlyRepository::class, ReadOnlyRespository::class);
        $this->app->bind(IReadOnlyRepository::class, ReadWriteModifyRepository::class);
        $this->app->bind(IWriteModifyRepository::class, ReadWriteModifyRepository::class);
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
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
