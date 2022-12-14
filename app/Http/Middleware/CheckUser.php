<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $email)
    {
        if ($request->user()->email == $email) {
            return $next($request);
        }
        return redirect('/');
    }

    public function terminate($req, $res) {
        file_put_contents(__DIR__. '/abc.txt', 'Hello World from terminate method');
    }
}
