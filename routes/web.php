<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\DetaineeProfileController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\CounselCaseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
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


Route::middleware(['web', 'auth', 'isAdmin'])->group(function () {
    // Your routes go here
});

Route::post('/invite/send', [InviteController::class, 'sendInvitation'])->name('invite.send');


Route::get('/', function () {
    return view('welcome');
});
    Route::get("auth.register", function(){ return view("auth.register"); })->name('register.user');
    Route::get("create_detainee", function(){ return view("create_detainee"); })->name('register.detainee'); 
    Route::get("add-detainee", function () {
        return view("add-detainee");
    })->name('detainee-list');

    Route::get('view-profile', [ProfileController::class, 'viewDetails'])->name('view.profile')->middleware('auth');
    
     //Add controller for admin 
    Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get("Invite_User", function(){ return view("Invite_User"); })->name('invite.user');
    Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
});


//User List

Route::get('/view-user/{id}', [UserController::class, 'show'])->name('view-user');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('edit-user');
Route::get('/user-list', [UserController::class, 'userList'])->name('user-list');
Route::get('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('delete-user');





//Detainee List
Route::get('detainee-list',[DetaineeProfileController::class, 'index']);
Route::get('view-detainee/{id}', [DetaineeProfileController::class, 'viewdetails2'])->name('view-detainee');
Route::get('add-detainee',[DetaineeProfileController::class, 'addDetainee']);
Route::post('save-detainee',[DetaineeProfileController::class, 'saveDetainee']); 
Route::get('edit-detainee/{id}',[DetaineeProfileController::class, 'editDetainee']);
Route::post('update-detainee/{id}',[DetaineeProfileController::class,'updateDetainee']);
Route::get('delete-detainee/{id}',[DetaineeProfileController::class, 'deleteDetainee']);
Route::get('assign-attorney/{id}',[DetaineeProfileController::class, 'viewDetails']);

//Cases List
Route::get('cases-list',[CasesController::class, 'getCases']);
Route::get('add-cases/{id}',[CasesController::class, 'addCases']);
Route::get('edit-cases/{id}', [CasesController::class, 'editCases']);   
Route::post('update-cases/{caseId}', [CasesController::class, 'updateCases'])->name('update-cases');
Route::post('save-cases/{detainee_id}', [CasesController::class, 'saveCases'])->name('save.cases');  //Add Cases   
Route::get('live-cases/{id}', [CasesController::class, 'caseOverview'])->name('live-cases');
Route::get('add-event/{case_id}', [EventController::class, 'addEventForm'])->name('add-event');
Route::post('save-event/{case_id}', [EventController::class, 'saveEvent'])->name('save-event');
Route::post('/update-event/{event}',[EventController::class,'updateEvent'])->name('update-event');
Route::get('edit-event/{event_id}', [EventController::class, 'editEvent'])->name('edit-event');
Route::get('delete-event/{event_id}', [EventController::class, 'deleteEvent'])->name('delete-event');



//Assigned Case
Route::post('assign-attorney/{detainee}', [CounselCaseController::class, 'assignAttorney'])->name('assign-attorney');
Route::get('/remove-assignment/{detainee_id}', [CounselCaseController::class, 'removeAssigned'])->name('remove-assignment');


//Team List
Route::get('view-teams',[TeamController::class,'index'])->name("view-teams");
Route::get('/create-team-form', [TeamController::class, 'CreateTeam'])->name('create-team-form');
Route::post('/save-team', [TeamController::class, 'saveTeam'])->name('saveTeam');
Route::get('/view-team-members/{id}', [TeamController::class, 'viewTeamMembers'])->name('view-team-members');


Route::post('/add-member/{team_id}', [TeamController::class, 'addMember'])->name('add-member');
Route::get('/assign-member/{team_id}', [TeamController::class, 'assignMember'])->name('assign-member');
    

// User List


Route::get('/dashboard',    function () {
    return view('dashboard_admin');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes();
require __DIR__.'/auth.php';

