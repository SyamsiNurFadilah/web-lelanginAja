<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuctioneerController;
use App\Http\Controllers\BidderListController;
use App\Http\Controllers\BidderPageController;
use App\Http\Middleware\CheckAuctioneerStatus;
use App\Http\Controllers\AuctionListController;
use App\Http\Controllers\AuctioneerPageController;
use App\Http\Controllers\AdminAuctioneerController;
use App\Http\Controllers\AuctioneerRegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified','role:bidder'])->group(function(){
    Route::get('/dashboard-bidder', [BidderPageController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth','verified','role:admin'])->group(function(){
    Route::get('/dashboard-admin', [AdminPageController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin', AdminController::class)->except(['show']);
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/auctioneer-list', [AuctionListController::class, 'index'])->name('admin.auctioneer-list.index');
    Route::patch('/auctioneer-list/{user}/block', [AdminAuctioneerController::class, 'block'])->name('auctioneer.block');
    Route::delete('/auctioneer-list/{user}/delete', [AdminAuctioneerController::class, 'destroy'])->name('auctioneer.destroy');
    Route::get('/admin/auctioneer', [AdminAuctioneerController::class, 'index'])->name('admin.auctioneer-verification.index');
    Route::put('/admin/auctioneer/{id}/approve', [AdminAuctioneerController::class, 'approve'])->name('admin.auctioneer.approve');
    Route::put('/admin/auctioneer/{id}/reject', [AdminAuctioneerController::class, 'reject'])->name('admin.auctioneer.reject');
    Route::get('/bidder-list', [BidderListController::class, 'index'])->name('admin.bidder-list.index');
});

Route::middleware(['auth','check.auctioneer.status','role:auctioneer'])->group(function(){
    Route::get('/dashboard-auctioneer', [AuctioneerPageController::class, 'index'])->name('auctioneer.dashboard');
});

Route::middleware('auth','role:auctioneer')->group(function(){
    Route::get('/auctioneer/form', [AuctioneerRegistrationController::class, 'create'])->name('auctioneer.form');
    Route::post('/auctioneer/form', [AuctioneerRegistrationController::class, 'store'])->name('auctioneer.form.store');
    Route::get('/auctioneer/waiting', [AuctioneerRegistrationController::class, 'waiting'])->name('auctioneer.waiting');
});

require __DIR__.'/auth.php';
