<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;

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
        $user = Auth::user();

        if ($user != null) {
            $roles = $user->roles()->get();
            foreach ($roles as $role) {
                if ($role->id == 1 || $role->id == 2) {
                    return $next($request);
                }
            }
        }

        return response('Unauthorized.', 401);
    }
}
