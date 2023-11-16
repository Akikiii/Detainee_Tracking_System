<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class TeamController extends Controller
{

    public function showUserToAssign($id)
    {
        $user = User::findOrFail($id);
        return view('assign-member', compact('user'));
    }
    public function index(){
        $data = Team::get();
        return view("view-teams",compact("data"));
    }
    public function CreateTeam(){
        return view('create-team_form');
    }
    public function viewTeamMembers($id)
    {
        $team = Team::findOrFail($id);
        return view('view-team-members', compact('team'));
    }
  

    public function addMember($teamId)
    {
        $team = Team::findOrFail($teamId);
        $users = User::all();
        return view('add-member', ['users' => $users, 'team' => $team]);
    }
    


    public function AssignMember($team_id)
    {
        // Find the user by ID
        $user = User::findOrFail($team_id);
    
        // Check if the user has a team
        $team = $user->team;
    
        // If the user does not have a team, create a member record without a team_id
        if (!$team) {
            Member::create([
                'user_id' => $user->id,
                'team_id' => null,
                'name' => $user->name,
            ]);
    
            return redirect()->route('user-list')->with('success', 'User added as a member without a team.');
        }
    
        // If the user has a team, create a member record with the team_id
        Member::create([
            'user_id' => $user->id,
            'team_id' => $team->id,
            'name' => $user->name,
        ]);
    
        return redirect()->route('user-list')->with('success', 'User added as a member successfully.');
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
