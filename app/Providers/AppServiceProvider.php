<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\CommentRepository;
use App\Repositories\EloquentComment;

use App\Repositories\ArticleRepository;
use App\Repositories\EloquentArticle;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //bind comment Repository
        $this->app->bind(CommentRepository::class, EloquentComment::class );
        //bind article Repo
        $this->app->bind(ArticleRepository::class, EloquentArticle::class );
        /*
          $this->app->bind('App\BlogService', function ($app) {
            $model = new Article();
            return new App\Services\BlogService();
        });
        */
    }
}
