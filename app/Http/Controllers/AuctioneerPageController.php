<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctioneerPageController extends Controller
{
    public function index()
    {
        return view('auctioneer.dashboard-auctioneer');
    }
}
