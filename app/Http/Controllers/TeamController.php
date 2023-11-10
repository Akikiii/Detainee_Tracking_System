<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Member;
use App\Models\User;

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
