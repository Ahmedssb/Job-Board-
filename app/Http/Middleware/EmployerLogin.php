<?php

namespace App\Http\Middleware;

use Closure;
 use Illuminate\Support\Facades\Auth;
class EmployerLogin
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
        //determine if The user is logged in...
        if (Auth::check()) {
            $user =Auth::user();
            //detrmine if the user is semployer 
            if($user->type == 0){
            return $next($request);
            }
          }

          return redirect()->route('Login');
     }
}
