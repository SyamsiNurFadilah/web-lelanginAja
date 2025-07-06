<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuctioneerController;
use App\Http\Controllers\AuctionListController;
use App\Http\Controllers\AuctioneerPageController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:bidder'])->name('dashboard');

Route::middleware(['auth','verified','role:admin'])->group(function(){
    Route::get('/dashboard-admin', [AdminPageController::class,'index'])->name('admin.dashboard');
});

Route::middleware(['auth','verified','role:admin'])->group(function(){
    Route::resource('/admin', AdminController::class);
    Route::get('/auctioneer-list', [AuctionListController::class,'index'])->name('auctioneer.index');
    Route::patch('/auctioneer-list/{user}/block', [AuctionListController::class, 'block'])->name('auctioneer.block');
});

Route::middleware(['auth','verified','role:auctioneer'])->group(function(){
    Route::get('/dashboard-auctioneer', [AuctioneerPageController::class,'index'])->name('auctioneer.dashboard');
});

require __DIR__.'/auth.php';
