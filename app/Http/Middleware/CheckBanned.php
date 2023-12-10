<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (!auth()->user()->wh)) {
            //   Auth::logout();

            Auth::guard('web')->logout();


            $request->session()->invalidate();

            $request->session()->regenerateToken();

            $msgar = 'خطأ في تسجيل الدخول, الرجاء التواصل مع الإدارة';
            $msgfr = 'Erreur de connexion, veuillez contacter l\'administration';

            if ($request->getLocale() == 'ar') {
                $msg = $msgar;
            } else {
                $msg = $msgfr;
            }

            return redirect()->route('login')->with('error', $msg);
        }

        return $next($request);
    }
}
