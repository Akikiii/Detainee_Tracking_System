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
Route::get('detainee-list',[DetaineeProfileController::class, 'index']);
Route::get('view-detainee/{id}', [DetaineeProfileController::class, 'viewdetails2'])->name('view-detainee');
Route::get('add-detainee',[DetaineeProfileController::class, 'addDetainee']);
Route::post('save-detainee',[DetaineeProfileController::class, 'saveDetainee']); 
Route::get('edit-detainee/{id}',[DetaineeProfileController::class, 'editDetainee']);
Route::post('update-detainee',[DetaineeProfileController::class,'updateDetainee']);
Route::get('delete-detainee/{id}',[DetaineeProfileController::class, 'deleteDetainee']);
Route::get('assign-attorney/{id}',[DetaineeProfileController::class, 'viewDetails']);

//Cases List
Route::get('cases-list',[CasesController::class, 'getCases']);
Route::get('add-cases/{id}',[CasesController::class, 'addCases']);
Route::get('edit-cases/{id}', [CasesController::class, 'editCases']);   
Route::post('update-cases', [CasesController::class, 'updateCases'])->name('update-cases');
Route::post('save-cases', [CasesController::class, 'saveCases']); //Add Cases
Route::get('live-cases/{id}', [CasesController::class, 'caseOverview'])->name('live-cases');
Route::get('add-event/{case_id}', [EventController::class, 'addEventForm'])->name('add-event');
Route::post('save-event/{case_id}', [EventController::class, 'saveEvent'])->name('save-event');
Route::get('edit-event/{event_id}', [EventController::class, 'editEvent'])->name('edit-event');
Route::get('delete-event/{event_id}', [EventController::class, 'deleteEvent'])->name('delete-event');



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

