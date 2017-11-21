<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $user = User::all();
        if (!($user == 1)) {
          if (!Auth::user()->hasPermissionTo('Admin')) {
            abort('401');
          }
        }
        return $next($request);

    }
}
