<?php

namespace App\Http\Middleware;

use Closure;
use App\Article;

class OnlyAuthorCanEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $article = Article::findOrFail($request->id);
         if($article->user_id != $request->user()->id) {
            return response("Action not allowed!", 401);
         }
        return $next($request);
    }
}