<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissionName): Response
    {
        // Log::info($request->user()->role);
        // Log::info($permissionName);
        $hasPermission = in_array($permissionName, $request->user()->role->permission);
        // Log::info($hasPermission);

        if (!$hasPermission) {
            return response(['message' => 'Permission denied']);
        }
        return $next($request);
    }
}
