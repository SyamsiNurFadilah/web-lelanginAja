<?php

namespace App\Http\Controllers;

use App\Models\AuctioneerRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctioneerRegistrationController extends Controller
{
    public function create()
    {
        $auctioneer = Auth::user()->auctioneerRegistration;

        if ($auctioneer) {
            return redirect()->route('auctioneer.dashboard')->with('info', 'Anda sudah terdaftar sebagai pelelang.');
        }

        return view('auctioneer.auctioneer-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'no_ktp' => 'required|string|max:20',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_usaha' => 'nullable|string|max:255',
        ]);

        $fotoKtpPath = $request->file('foto_ktp')->store('uploads/auctioneer/ktp', 'public');
        $fotoProfilPath = $request->file('foto_profil')->store('uploads/auctioneer/profil', 'public');

        AuctioneerRegistration::create([
            'user_id' => auth::id(),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_ktp' => $request->no_ktp,
            'foto_ktp' => $fotoKtpPath,
            'foto_profil' => $fotoProfilPath,
            'nama_usaha' => $request->nama_usaha,
        ]);

        return redirect()->route('auctioneer.waiting')->with('success', 'Pendaftaran pelelang berhasil.');
    }

    public function waiting()
    {
        return view('auctioneer.waiting');
    }
}
