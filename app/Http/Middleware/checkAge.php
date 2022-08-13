<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkage
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
        
          //echo "global message for all";
        // check user age less than 18 then redirect the no Access
        //to check this if condition work in url write ?age=10 enter 
        
        if($request->age && $request->age<18)
        {         
           return redirect('noaccess');
        }
        return $next($request);
    }
}
