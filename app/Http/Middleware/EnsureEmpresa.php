<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmpresa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verificar que el usuario esté autenticado (logueado)
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Verificar que el usuario tenga una empresa asignada
        if (Auth::user()->empresa_id === null) {
            abort(403, 'Usuario sin empresa asignada. Contacte al administrador.');
        }

        // 3. Compartir datos de la empresa con TODAS las vistas
        $empresa = Auth::user()->empresa;
        view()->share('empresa_id', Auth::user()->empresa_id);
        view()->share('empresa_nombre', $empresa?->nombre ?? 'Sin empresa');
        view()->share('empresa', $empresa);

        // 4. Si todo está bien, permitir el acceso
        return $next($request);
    }
}