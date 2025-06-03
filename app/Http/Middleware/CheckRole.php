<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $roleName)
    {
        $user = Auth::user();

        if (!$user || !$user->role || $user->role->nome !== $roleName) {
            return redirect()->route('dashboard')->with('error', 'Acesso não autorizado para esta área.');
        }

        return $next($request);
    }
}
