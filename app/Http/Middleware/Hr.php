<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Hr
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      if(auth()->user()->user_role == 'hr')
      {
        return $next($request);
      }
      else{
        return redirect()->route(auth()->user()->user_role)->with('error',"NOt access");
      }
    }
}
