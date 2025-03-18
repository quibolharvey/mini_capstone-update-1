<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;


// Public Routes
Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/index', [ProjectController::class, 'index'])->name('index');
Route::get('/member', function () {
    return view('member.index');
})->name('member');

// Authentication Routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/signin', [AuthController::class, 'login'])->name('signin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Member Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
});

// Project Routes (Protected by Auth Middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/delete/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

// Subscription Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/subs', [SubscriptionController::class, 'index'])->name('subs.index');
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
});

// Subscription Details & Status Update (Fixed)
Route::middleware(['auth'])->group(function () {
    Route::get('/details', [DetailController::class, 'index'])->name('details.index');

    // ✅ Fixed: Removed duplicate status update routes
    Route::patch('/details/{id}/update-status', [DetailController::class, 'updateStatus'])->name('details.updateStatus');
    Route::delete('/details/{id}', [DetailController::class, 'destroy'])->name('details.destroy');


    Route::get('/details/{id}/edit', [DetailController::class, 'edit'])->name('details.edit');
    Route::put('/details/{id}/update', [DetailController::class, 'update'])->name('details.update');

    Route::patch('/details/{id}/membership', [DetailController::class, 'updateMembership'])->name('details.updateMembership');

});

Route::get('/memberships', [SubscriptionController::class, 'membershipList'])->name('memberships.index');

//memberships

Route::get('/memberships', [MembershipController::class, 'index'])->name('memberships.index');
Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');

