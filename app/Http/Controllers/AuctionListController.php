<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuctionListController extends Controller
{
    public function index()
    {
        $auctioneers = User::role('auctioneer')->get();
        return view('admin.auction-list.index', compact('auctioneers'));
    }

    public function block(Request $request, $id)
    {
        $auctioneer = User::findOrFail($id);
        $auctioneer->status = 'nonaktif';
        $auctioneer->save();

        return redirect()->route('auctioneer.index')->with('success', 'Pelelang berhasil diblokir.');
    }
}
