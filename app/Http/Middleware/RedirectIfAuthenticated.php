<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

          // if (Auth::guard('caregiver')->check()) {
          //   return redirect()->route('caregiver.dashboard');
          // }
          // elseif (Auth::guard('customer')->check()) {
          //     return redirect()->route('customer.dashboard');
          //   }
          //   else
            if (Auth::guard($guard)->check()) {
              return redirect('/dash');
          }

        return $next($request);
    }
}
