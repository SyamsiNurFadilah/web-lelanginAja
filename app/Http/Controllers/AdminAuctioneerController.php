<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AuctioneerRegistration;

class AdminAuctioneerController extends Controller
{
    public function index()
    {
        $auctioneers = AuctioneerRegistration::where('status','menunggu konfirmasi')->get();
        return view('admin.auctioneer-verification', compact('auctioneers'));
    }

    public function approve($id)
    {
        $auctioneer = AuctioneerRegistration::findOrFail($id);
        $auctioneer->status = 'aktif'; // atau 'approved'
        $auctioneer->save();

        return redirect()->back()->with('success', 'Pelelang berhasil disetujui.');
    }

    public function reject($id)
    {
        $auctioneer = AuctioneerRegistration::findOrFail($id);
        $auctioneer->status = 'nonaktif'; // atau 'rejected'
        $auctioneer->save();

        return redirect()->back()->with('success', 'Pelelang ditolak.');
    }

    public function block(Request $request, $id)
    {
        $auctioneer = AuctioneerRegistration::findOrFail($id);
        $auctioneer->status = 'nonaktif';
        $auctioneer->save();

        return redirect()->route('admin.auctioneer-list.index')->with('success', 'Pelelang berhasil diblokir.');
    }

    public function destroy($id)
    {
        $registration = AuctioneerRegistration::findOrFail($id);

        if ($registration->status !== 'nonaktif') {
            return redirect()->back()->with('error', 'Pelelang sudah tidak aktif, tidak bisa dihapus.');
        }

        $user = $registration->user;

        if($user) {
            $user->delete();
        }

        return redirect()->route('admin.auctioneer-list.index')->with('success', 'Pelelang berhasil dihapus.');
    }
}
