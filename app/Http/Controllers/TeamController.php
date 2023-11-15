<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index(){
        $data = Team::get();
        return view("view-teams",compact("data"));
    }
    public function CreateTeam(){
        return view('create-team_form');
    }
    public function viewTeamMembers($id)
    {   
        $team = Team::find($id);
    
        return view('view-team-members', compact('team'));
    }
    
    public function saveNewMember(Request $request, $userId)
    {
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Check if the user is not already a member
        if (!Member::where('user_id', $user->id)->exists()) {
            // Check if the specified team_id exists in the teams table
            if (Team::where('id', $userId)->exists()) {
                // Create a new Member instance
                $member = new Member();
                $member->user_id = $user->id;
                $member->team_id = $userId; // Assuming you're passing the team ID in the URL
    
                // Add additional details if needed
                $member->name = $user->name;
    
                // Save the new member
                $member->save();
    
                // Redirect back with success message or perform any other action
                return redirect()->back()->with('success', 'User added as a member successfully');
            } else {
                // Redirect back with an error message indicating that the team_id is not valid
                return redirect()->back()->with('error', 'Invalid team_id provided');
            }
        } else {
            // Redirect back with an error message or perform any other action
            return redirect()->back()->with('error', 'User is already a member');
        }
    }
    
    

    public function addMember()
    {
        $users = User::all();
        return view('add-member', ['users' => $users]);
    }

    public function saveTeam(Request $request)
    {
        $combinedRules = [
            'team_name' => 'required',
            'case_id' => 'required',
            'creation_date' => 'required',
            'description' => 'required',
            'status' => 'in:Active,Pending,Finished',
        ];

        $request->validate($combinedRules);
        
        // Save Team Data
        $team = new Team();
        $team->team_name = $request->team_name;
        $team->team_leader_name = $request->user()->name; // Set the current user as team leader
        $team->case_id = $request->case_id;
        $team->creation_date = $request->creation_date;
        $team->description = $request->description;
        $team->status = $request->status ?? 'Active';
        $team->save();
        
        return redirect()->back()->with("success", "Team successfully added");
    }

    public function editTeam($id)
    {
        $data = Team::where('id', $id)->first();
        return view('edit-team', compact('data'));
    }

    public function updateTeam(Request $request)
    {
        $combinedRules = [
            'team_name' => 'required',
            'case_id' => 'required',
            'creation_date' => 'required',
            'description' => 'required',
            'status' => 'in:Active,Pending,Finished',
        ];

        $request->validate($combinedRules);
        $id = $request->id;

        $team = [
            'team_name' => $request->team_name,
            'case_id' => $request->case_id,
            'creation_date' => $request->creation_date,
            'description' => $request->description,
            'status' => $request->status,
        ];

        Team::where('id', $id)->update($team);

        return redirect()->back()->with('success', 'Team Successfully updated!');
    }
}
