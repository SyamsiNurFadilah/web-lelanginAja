<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BidderListController extends Controller
{
     public function index()
    {
        $bidders = User::role('bidder')->get();
        return view('admin.bidder-list.index', compact('bidders'));
    }
}
