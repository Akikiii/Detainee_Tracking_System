<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counsel_Case_Assignment;
use App\Models\Cases;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;  

class CounselCaseController extends Controller
{
    public function assignToCase(Request $request)
{
    // Get the case_id from the URL
    $url = $request->url();
    $parts = explode('/', $url);
    $caseId = end($parts);

    $case = Cases::with('detainee')->where('case_id', $caseId)->first();

    // Check if the case is found
    if (!$case) {
        return redirect()->back()->with('error', 'Case not found.');
    }

    // Check if the detainee relationship is loaded
    if (!$case->relationLoaded('detainee')) {
        $case->load('detainee');
    }

    // Check if the detainee is found
    if (!$case->detainee) {
        return redirect()->back()->with('error', 'Detainee not found for the case.');
    }

    // Get the detainee_id from the relationship
    $detaineeId = $case->detainee->detainee_id;

    // Get the current user
    $userId = Auth::id();

    // Create a new Counsel_Case_Assignment record
    $assignment = new Counsel_Case_Assignment();
    $assignment->case_id = $caseId;
    $assignment->assigned_lawyer = $userId;
    $assignment->detainee_id = $detaineeId;
    $assignment->date_assigned = now();
    $assignment->team_id = null;
    $assignment->save();

    // You can add any additional logic or redirect the user as needed

    return redirect()->back()->with(['case' => $case, 'success' => 'Case assigned successfully.']);
}

public function removeAssignedAttorney($case_id)
{
    // Retrieve the case
    $case = Cases::findOrFail($case_id);

    // Detach the assigned attorney
    $case->assignedAttorney()->detach();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Assigned attorney removed successfully.');
}
public function showAddUserForm($caseId)
{
    $existingUsers = User::all();

    // You can add any additional logic or view data as needed

    return view('add_user_form', ['caseId' => $caseId, 'existingUsers' => $existingUsers]);
}

public function addUser(Request $request, $caseId)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    $userId = $request->input('user_id');

    // Get the detainee_id from the related Cases model
    $detaineeId = Cases::where('case_id', $caseId)->value('detainee_id');

    // Create a new Counsel_Case_Assignment record
    $assignment = new Counsel_Case_Assignment();
    $assignment->case_id = $caseId;
    $assignment->assigned_lawyer = $userId;
    $assignment->detainee_id = $detaineeId;
    $assignment->date_assigned = now();
    $assignment->team_id = null;
    $assignment->save();

    return redirect()->route('cases-list')->with('success', 'User added to the case successfully');
}


}
