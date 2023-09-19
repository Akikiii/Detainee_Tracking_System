<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\DetaineeProfileController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\CounselCaseController;
use App\Http\Controllers\EventController;
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
    Route::get("create_detainee", function(){ return view("create_detainee"); })->name('register.detainee'); //?
    Route::get("add-detainee", function () {
        return view("add-detainee");
    })->name('detainee-list');
    
    
     //Add controller for admin 
    Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get("Invite_User", function(){ return view("Invite_User"); })->name('invite.user');
    Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
});

//Detainee List
Route::controller(DetaineeProfileController::class)->group(function () {
    Route::get('detainee-list', 'index');
    Route::get('add-detainee', 'addDetainee');
    Route::post('save-detainee', 'saveDetainee'); 
    Route::get('edit-detainee/{id}', 'editDetainee');
    Route::post('update-detainee','updateDetainee');
    Route::get('delete-detainee/{id}', 'deleteDetainee');
    Route::get('assign-attorney/{id}', 'viewDetails');
});

//Cases List
Route::controller(CasesController::class)->group(function () {
    Route::get('cases-list', 'getCases');
    Route::get('add-cases/{id}', 'addCases');
    Route::get('edit-cases/{id}', 'editCases');   
    Route::post('update-cases', 'updateCases')->name('update-cases');
    Route::post('save-cases', 'saveCases'); //Add Cases
    Route::get('live-cases/{id}', 'caseOverview')->name('live-cases');
    Route::get('add-event/{case_id}', 'addEventForm')->name('add-event');
    Route::post('save-event/{case_id}', 'saveEvent')->name('save-event');
    Route::get('edit-event/{event_id}', 'editEvent')->name('edit-event');
    Route::get('delete-event/{event_id}', 'deleteEvent')->name('delete-event');
});



//Assigned Case
Route::post('assign-attorney', [CounselCaseController::class, 'assignAttorney'])->name('assign-attorney');
Route::get('/remove-assignment/{detainee_id}', [CounselCaseController::class, 'removeAssigned'])->name('remove-assignment');




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

