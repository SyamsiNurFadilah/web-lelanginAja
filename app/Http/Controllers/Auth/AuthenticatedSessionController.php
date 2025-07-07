<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        if ($user->hasRole('admin')) {
            return redirect()->intended('/dashboard-admin');
        } elseif ($user->hasRole('bidder')) {
            return redirect()->intended('/dashboard');
        } elseif ($user->hasRole('auctioneer')) {
            if ($user->status === 'aktif') {
            return redirect()->intended('/dashboard-auctioneer');
            } else {
                return redirect()->route('auctioneer.form'); 
            }
        }
        return redirect()->intended('/login')->with('error', 'Unauthorized role.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->auctioneerRegistration && $user->auctioneerRegistration->status === 'menunggu verifikasi') {
            return redirect()->route('auctioneer.waiting');
        }

        return redirect()->intended('/dashboard-auctioneer');
    }
}
