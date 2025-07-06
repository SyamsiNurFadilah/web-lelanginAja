<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctioneerController extends Controller
{
    public function index()
    {
        return view('auctioneer.dashboard-auctioneer');
    }
}
