<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuctioneerStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $registration = $user->auctioneerRegistration;

        if (!$registration) {
            return redirect()->route('auctioneer.form')->with('error', 'Silakan lengkapi data terlebih dahulu');
        }

        if ($registration->status !== 'aktif') {
            return redirect()->route('auctioneer.waiting')->with('error', 'Akun Anda sedang menunggu persetujuan.');
        }

        if ($user->role === 'auctioneer' && $user->auctioneerRegistration && $user->auctioneerRegistration->status !== 'aktif') {
            return redirect()->route('auctioneer.waiting')->with('message', 'Akun Anda masih dalam proses verifikasi. Silakan tunggu konfirmasi dari admin.');
        }

        return $next($request);
    }
}
