<?php

namespace App\Providers;

use App\Services\BlogService;
use Illuminate\Support\ServiceProvider;
use App\Article;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /* one way:
          $this->app->bind('BlogService', function() {
            $model = new Article();
            return new BlogService($model);
        });
        */
        
        //maybe better way?
        $this->app->bind('BlogService', BlogService::class);
    }
}
