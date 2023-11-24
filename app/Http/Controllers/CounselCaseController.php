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
    public function assignAttorney(Request $request, $detainee_id)
    {
        // Assuming you have authenticated users, you can get the current user
        $currentUser = Auth::user();
        $assignment = new Counsel_Case_Assignment();
        $assignment->user_id = $currentUser->id;
        $assignment->assigned_by = $currentUser->name;
        $assignment->detainee_id = $detainee_id;
        $assignment->date_assigned = now(); // Use Carbon's now() method to get the current timestamp
        $assignment->save();
        return redirect()->back()->with('success', 'Team Assigned Successfully to Case!');
    }
    

    public function removeAssigned($id){
        Counsel_Case_Assignment::where('detainee_id','=',$id)->delete();
        return redirect()->back()->with('success','Team Assigned Removed Successfully');
    }
}
