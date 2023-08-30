<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\Counsel_Case_Assignment;
use App\Models\Detainee;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CounselCaseController extends Controller
{
    public function assignAttorney(Request $request)
    {
        // Assuming you have authenticated users, you can get the current user
        $currentUser = Auth::user();

        // Assuming you have the case ID and detainee ID from the request
        $caseId = $request->input('case_id');
        $detaineeId = $request->input('detainee_id');

        // Create a new assignment record
        $assignment = new Counsel_Case_Assignment();
        $assignment->user_id = $currentUser->id;
        $assignment->detainee_id = $detaineeId;
        $assignment->assigned_by = $currentUser->name; // You can change this to the appropriate field
        $assignment->date_assigned = Carbon::now();
        $assignment->save();

        return response()->json(['message' => 'Attorney assigned successfully']);
    }
    public function removeAssignedAttorney(Request $request)
    {
        // Assuming you have the assignment ID from the request
        $assignmentId = $request->input('assignment_id');

        // Find the assignment record by ID
        $assignment = Counsel_Case_Assignment::find($assignmentId);

        if (!$assignment) {
            return response()->json(['message' => 'Assignment not found'], 404);
        }

        // Delete the assignment record
        $assignment->delete();

        return response()->json(['message' => 'Assignment removed successfully']);
    }
}
