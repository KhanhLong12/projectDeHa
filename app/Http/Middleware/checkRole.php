<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->checkRole()){
            return $next($request);
        }
        return redirect(abort(403, 'Unauthorized action.'));
    }
}
