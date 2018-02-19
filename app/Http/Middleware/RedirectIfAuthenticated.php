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
      switch ($guard) {
        case 'caregiver':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('caregiver.dashboard');
          }
          // elseif (!Auth::guard($guard)->check()) {
          //   return redirect()->route('caregiver.logincare');;
          // }

          break;
          case 'customer':
            if (Auth::guard($guard)->check()) {
              return redirect()->route('customer.dashboard');
            }
            break;

        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/dash');
          }
          break;
      }


        return $next($request);
    }
}
