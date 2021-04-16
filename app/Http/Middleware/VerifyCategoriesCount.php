<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(request()->is('posts/create') || request()->is('posts/store'))
        {
            if(Category::all()->count() == 0)
            {
                session()->flash('error', 'Please add a category to add a post.');
                return redirect()->back();
            }
        }
        

        return $next($request);
    }
}
