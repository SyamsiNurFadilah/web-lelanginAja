<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AuctioneerRegistration;

class AuctionListController extends Controller
{

    public function index()
    {
        $allAuctioneers = AuctioneerRegistration::all(); // Ambil semua tanpa filter
        return view('admin.auction-list.index', compact('allAuctioneers'));
    }
}
