<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTutorVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        $tutor = $request->user()?->tutor;

        if (! $tutor || $tutor->verification_status !== 'verified') {
            return redirect()->route('teacher.dashboard')
                ->with('error', 'Profil kamu masih menunggu verifikasi admin.');
        }

        return $next($request);
    }
}
