<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\DetaineeProfileController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\CounselCaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteUser;
use App\Models\Counsel_Case_Assignment;

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

//Detainee List
Route::get('detainee-list',[DetaineeProfileController::class, 'index']);
Route::get('add-detainee',[DetaineeProfileController::class, 'addDetainee']);
Route::post('save-detainee',[DetaineeProfileController::class, 'saveDetainee']); 
Route::get('edit-detainee/{id}',[DetaineeProfileController::class, 'editDetainee']);
Route::post('update-detainee',[DetaineeProfileController::class,'updateDetainee']);
Route::get('delete-detainee/{id}',[DetaineeProfileController::class, 'deleteDetainee']); //I think unecessary? 
Route::get('assign-attorney/{id}',[DetaineeProfileController::class, 'viewDetails']);

//Cases List
Route::get('cases-list',[CasesController::class, 'getCases']);
Route::get('add-cases/{id}',[CasesController::class, 'addCases']);
Route::post('save-case/{id}',[CasesController::class, 'saveCases']);

//Assigned Case
Route::post('save-assignment',[CounselCaseController::class, 'assignAttorney']); 
Route::get('delete-assigned/{id}',[CounselCaseController::class, 'removeAssignedAttorney']);



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

