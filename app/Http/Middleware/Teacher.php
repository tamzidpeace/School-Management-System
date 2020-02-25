<?php

namespace App\Http\Middleware;

use Closure;

class Teacher
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
        $user = Auth::user();
        
        if(!$user->isTeacher()) {
            return redirect('/home')->with('warning', 'Opps! you are not a Teacher!');
        }
        
        return $next($request);
    }
}
