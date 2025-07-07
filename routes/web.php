<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuctioneerController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:bidder'])->name('dashboard');

Route::middleware(['auth','verified','role:admin'])->group(function(){
    Route::get('/dashboard-admin', [AdminPageController::class,'index'])->name('admin.dashboard');
});

Route::middleware(['auth','verified','role:admin'])->group(function(){
    Route::resource('/admin', AdminController::class)->except(['show']);
    Route::get('/auctioneer-list', [AuctionListController::class,'index'])->name('auctioneer.index');
    Route::patch('/auctioneer-list/{user}/block', [AdminAuctioneerController::class, 'block'])->name('auctioneer.block');
    Route::get('/admin/auctioneer', [AdminAuctioneerController::class, 'index'])->name('admin.auctioneer.index');
    Route::put('/admin/auctioneer/{id}/approve', [AdminAuctioneerController::class, 'approve'])->name('admin.auctioneer.approve');
    Route::put('/admin/auctioneer/{id}/reject', [AdminAuctioneerController::class, 'reject'])->name('admin.auctioneer.reject');
});

Route::middleware(['auth','verified','role:auctioneer','auctioneer.aktif'])->group(function(){
    Route::get('/dashboard-auctioneer', [AuctioneerPageController::class,'index'])->name('auctioneer.dashboard');
});

Route::get('/auctioneer/form', [AuctioneerRegistrationController::class, 'create'])->name('auctioneer.form');
Route::post('/auctioneer/form', [AuctioneerRegistrationController::class, 'store'])->name('auctioneer.form.store');
Route::get('/auctioneer/waiting', function () {
return view('auctioneer.waiting');
})->name('auctioneer.waiting');

require __DIR__.'/auth.php';
