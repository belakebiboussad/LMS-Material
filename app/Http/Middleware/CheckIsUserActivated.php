<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsUserActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $currentRoute = Route::currentRouteName();
        $routesAllowed = [
                'activation-required',
                'activate/{token}',
                'activate',
                'activation',
                'exceeded',
                'authenticated.activate',
                'authenticated.activation-resend',
                'social/redirect/{provider}',
                'social/handle/{provider}',
                'logout',
                'welcome',
        ];
        return $next($request);
    }
}
