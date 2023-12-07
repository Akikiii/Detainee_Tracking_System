<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\DetaineeProfileController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\CounselCaseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CommentController;
use App\Mail\InviteUser;
use App\Models\Cases;
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
    
        
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/add-user/{caseId}', [CounselCaseController::class, 'showAddUserForm'])
            ->name('admin.showAddUserForm');
        Route::post('/admin/add-user/{caseId}', [CounselCaseController::class, 'addUser'])
            ->name('admin.addUser');
    });
    


     Route::prefix('AttorneyInvite')->middleware(['auth','admin'])->group(function () {
        // Routes that require both authentication and admin role
        Route::get("Invite_User", function () {
            return view("Invite_User");
        })->name('invite.user');
    
        Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
    });
//OVERVIEW DASHBOARD
Route::get('/dashboard/overview', [DashboardController::class, 'overview'])->name('dashboard.overview');

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
Route::get('cases-list', [CasesController::class, 'getCases'])->name('cases-list');
Route::get('add-cases/{id}',[CasesController::class, 'addCases']);
Route::get('edit-cases/{id}', [CasesController::class, 'editCases']);
Route::get('delete-cases/{id}',[CasesController::class, 'deleteCases']);
Route::post('update-cases/{caseId}', [CasesController::class, 'updateCases'])->name('update-cases');
Route::post('save-cases/{detainee_id}', [CasesController::class, 'saveCases'])->name('save.cases');  //Add Cases   
Route::get('live-cases/{id}', [CasesController::class, 'caseOverview'])->name('live-cases');

Route::get('add-event/{case_id}', [EventController::class, 'addEventForm'])->name('add-event');
Route::post('save-event/{case_id}', [EventController::class, 'saveEvent'])->name('save-event');
Route::post('/update-event/{event}',[EventController::class,'updateEvent'])->name('update-event');
Route::get('edit-event/{event_id}', [EventController::class, 'editEvent'])->name('edit-event');
Route::get('delete-event/{event_id}', [EventController::class, 'deleteEvent'])->name('delete-event');
Route::get('/view-event/{event_id}', [EventController::class, 'viewEvent'])->name('view-event');


//Assigned Case
Route::get('/assign-to-case/{case_id}', [CounselCaseController::class, 'assignToCase'])->name('assignToCase');
Route::get('/remove-assigned-attorney/{case_id}', [CounselCaseController::class, 'removeAssignedAttorney'])->name('removeAssignedAttorney');


//Team List
Route::get('view-teams',[TeamController::class,'index'])->name("view-teams");
Route::get('/create-team-form', [TeamController::class, 'CreateTeam'])->name('create-team-form');
Route::post('/save-team', [TeamController::class, 'saveTeam'])->name('saveTeam');
Route::get('/view-team-members/{id}', [TeamController::class, 'viewTeamMembers'])->name('view-team-members');


Route::post('/add-member/{team_id}', [TeamController::class, 'addMember'])->name('add-member');
Route::get('/assign-member/{team_id}', [TeamController::class, 'assignMember'])->name('assign-member');
    

// Comment Box
Route::post('/post-comment/{case_id}/{event_id}', [CommentController::class, 'store'])->name('post-comment');


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

