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
        // dd($user?->auctioneerRegistration->toArray());

        if ($user && $user->auctioneerRegistration && $user->auctioneerRegistration->status === 'menunggu verifikasi') {
            return redirect()->route('auctioneer.waiting')->with('message', 'Akun Anda masih dalam proses verifikasi. Silakan tunggu konfirmasi dari admin.');
        }

        return $next($request);
    }
}
