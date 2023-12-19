<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        if(!Auth::check()){
            return redirect('/');
        }

        if(in_array($request->user()->level, $levels)){
            return $next($request);
        }
        return redirect('/')->with('error','Anda tidak bisa mengakses halaman ini');
    }
}
