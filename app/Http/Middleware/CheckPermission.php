<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        $user = Auth::user();
        if ($user->userHasPermission($permission)) {
            return $next($request);
        }
        return redirect(abort(403, 'Unauthorized action.'));
    }
}
