<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role, $guard = 'admin'): Response
    {
        $user = Auth::guard($guard)->user();

        if (Auth::guard($guard)->check() && $user->hasRole($role, $guard)) {
            Log::info('User:', ['user' => $user]);
            Log::info('Role:', ['role' => $role]);
            Log::info('Has Role:', ['hasRole' => $user->hasRole($role, $guard)]);
            $role = '';
            return $next($request);
        }



        Log::info('User:', ['user' => $user]);
        Log::info('Role:', ['role' => $role]);
        Log::info('Has Role:', ['hasRole' => $user->hasRole($role, $guard)]);

        throw UnauthorizedException::forRoles([$role]);
        $role = '';
    }
}
