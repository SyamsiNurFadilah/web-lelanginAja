<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:bidder,auctioneer'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->role === 'auctioneer' ? 'menunggu konfirmasi' : 'aktif',
        ]);

        $user->assignRole($request->role);

        event(new Registered($user));

        Auth::login($user);

       if ($user->hasRole('bidder')) {
        return redirect()->route('dashboard');
        } elseif ($user->hasRole('auctioneer')) {
            return $user->status === 'aktif'
                ? redirect()->route('dashboard-auctioneer')
                : redirect()->route('auctioneer.form');
        }

        return redirect(route('dashboard', absolute: false));
    }
}
