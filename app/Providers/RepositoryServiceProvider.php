<?php

namespace App\Providers;

use App\Http\Repository\Article\ArticleRepository;
use App\Http\Repository\Article\ArticleRepositoryInterface;
use App\Http\Repository\Category\CategoryRepository;
use App\Http\Repository\Category\CategoryRepositoryInterface;
use App\Http\Repository\Course\CourseRepository;
use App\Http\Repository\Course\CourseRepositoryinterface;
use App\Http\Repository\Product\ProductRepository;
use App\Http\Repository\Product\ProductRepositoryInterface;
use App\Http\Repository\Role\RoleRepository;
use App\Http\Repository\Role\RoleRepositoryInterface;
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
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
       
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
