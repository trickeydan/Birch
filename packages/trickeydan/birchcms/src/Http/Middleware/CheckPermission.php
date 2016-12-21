<?php

namespace Trickeydan\Birchcms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Trickeydan\Birchcms\Http\Controllers\Auth\LoginController;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if(!Auth::User()->hasPermission($type)){
            if(Auth::User()->hasPermission('admin.dashboard')){
                return back()->withErrors('You don\'t have permission to access that.');
            }else{
                Auth::guard()->logout();

                $request->session()->flush();

                $request->session()->regenerate();

                return redirect(route('login'));
            }
        }
        return $next($request);
    }
}
