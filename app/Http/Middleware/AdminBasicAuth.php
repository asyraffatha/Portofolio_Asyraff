<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Password yang bisa diganti
        $validPassword = env('ADMIN_PASSWORD', 'admin123');
        $providedPassword = $request->get('password') || $request->header('X-Admin-Password');
        
        if ($providedPassword !== $validPassword) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}