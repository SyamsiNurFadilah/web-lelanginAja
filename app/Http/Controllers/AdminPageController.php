<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index()
    {
        return view('admin.dashboard-admin');
    }
}
