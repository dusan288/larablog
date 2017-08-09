<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Comment\ICommentService;

class CommentServiceProvider extends ServiceProvider
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
        $this->app->bind(ICommentService::class,
         \App\Services\Comment\CommentService::class );

    }
}
