<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Permission;
use App\Model\Role;
use App\Model\Category;
use App\Model\Post;

class CheckRole
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
        if ($user->checkPermission($permission)) {
            return $next($request);
        }
        return redirect(abort(403, 'Unauthorized action.'));
    }
}
