<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminType
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
        if(auth('admin')->user()->type == 'staff') {
            flash('Access Denied.', 'danger');

            return redirect()->route('admin.home');
        }
        return $next($request);
    }
}
