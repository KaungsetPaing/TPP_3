<?php

namespace App\Providers;

use App\Http\Repository\Course\CourseRepository;
use App\Http\Repository\Course\CourseRepositoryinterface;
use App\Http\Repository\Student\StudentRepository;
use App\Http\Repository\Student\StudentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CourseRepositoryinterface::class, CourseRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
