<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {     // ma 3andahch lha9
        if($request->user()===null)
        {
            return redirect('/home');
        }

          // role li jaya m route
        $actions=$request->route()->getAction();
        $roles=isset($actions['roles']) ? $actions['roles'] : null;

         // taba9a 2 emm m midlleware
        if ($request->user()->hasAnyRole($roles)|| !$roles){
             return $next($request);
                  }
       
            return redirect('/home') ;
    }
}
