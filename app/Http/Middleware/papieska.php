<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class papieska
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $logout = '21:37';
        $now = Carbon::now('GMT+1');
        $nowTime = $now->hour . ':' . $now->minute;

        if ($nowTime == $logout) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return $next($request);
    }
}


