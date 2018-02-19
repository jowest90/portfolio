<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
      if (Auth::guard($guard)->guest()) {
      if ($request->ajax()) {
        return response('Unauthorized.', 401);
      } else {
        return redirect()->guest('login');
      }
    } else if (!Auth::guard($guard)->user()->isAdmin) {
      return redirect()->to('/')->withError('Permission Denied');
    }

    return $next($request);
  }
    }
}
