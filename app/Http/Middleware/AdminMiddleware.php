<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Vérifiez si l'utilisateur a le rôle d'administrateur
        if (auth()->user()->role !== 'administrateur') {
            abort(403, 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }

        return $next($request);
    }

}
