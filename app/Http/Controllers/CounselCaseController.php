<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\Counsel_Case_Assignment;
use App\Models\Detainee;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CounselCaseController extends Controller
{
   
public function saveTeam(Request $request)
{
    $request->validate([
        'team_name' => 'required',
        'case_id' => 'required', // Make sure 'case_id' is required
        'creation_date' => 'required|date',
        'description' => 'nullable',
        'status' => 'required|in:Active,Disbanded,On Hold',
    ]);

    // Create Team
    $team = new Team();
    $team->team_name = $request->team_name;
    $team->creation_date = $request->creation_date;
    $team->description = $request->description;
    $team->status = $request->status;
    $team->save();

    // Create Counsel Case Assignment
    $counselCaseAssignment = new Counsel_Case_Assignment();
    $counselCaseAssignment->case_id = $request->case_id;
    $counselCaseAssignment->team_id = $team->id; 
    $counselCaseAssignment->save();

    dd($counselCaseAssignment);

    return redirect()->route('view-teams')->with("success", "Team successfully added");
}
    

    public function removeAssigned($id){
        Counsel_Case_Assignment::where('case_id', '=', $id)->delete();
        return redirect()->back()->with('success','Team Assigned Removed Successfully');
    }
}
