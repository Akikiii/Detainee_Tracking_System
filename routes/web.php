<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/invite/send', [InviteController::class, 'sendInvitation'])->name('invite.send');


Route::get('/', function () {
    return view('welcome');
});

    Route::get("auth.register", function(){ return view("auth.register"); })->name('register.user');
    Route::get("create_detainee", function(){ return view("create_detainee"); })->name('register.detainee');
    
     //Add controller for admin
    Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get("Invite_User", function(){ return view("Invite_User"); })->name('invite.user');
    Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
});


Route::get('/dashboard', function () {
    return view('dashboard_admin');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes();
require __DIR__.'/auth.php';

