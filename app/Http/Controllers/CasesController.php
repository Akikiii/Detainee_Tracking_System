<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detainee;
use App\Models\Cases;
use App\Models\Event;
class CasesController extends Controller
{
    public function getCases(){
        // Fetch all cases  
        $cases = Cases::get();
        // Iterate through each case to determine the latest event and update the status
        foreach ($cases as $case) {
            // Fetch the latest event for the case based on both event_date and created_at
            $latestEvent = Event::where('case_id', $case->case_id)
                ->orderByDesc('event_date')
                ->orderByDesc('created_at')
                ->first();

            // If a latest event is found, update the case status
            if ($latestEvent) {
                $case->status = $latestEvent->event_type;
            }
        }
        return view('cases-list', compact('cases'));
    }
    public function addCases($detainee_id){
        return view('add-cases', ['detainee_id' => $detainee_id]);
    }

    public function caseOverview($id) {
        $case = Cases::find($id);
        $case_events = Event::where('case_id', $id)->get();
    
        return view('live-cases', compact('case', 'case_events'));
    }
    
    
    public function saveCases(Request $request, $detainee_id){
        $status = $request->status ?? 'Arrest';
        $combinedRules =[
            'case_id' => 'required',
            'case_name' => 'required',
            'location' => 'required|in:rtc,mtc',
            'case_created' => 'required|date',
            'status' => 'in: Arrest, Bail, Pretrial, Plea, Trial, Sentencing, Appeal, Finished,Arraignment',
        ];

        $request->validate($combinedRules);
        //Save Case Data
        $cases = new Cases();
        $cases->case_id = $request->case_id;
        $cases->detainee_id = $detainee_id;
        $cases->case_name = $request->case_name; 
        $cases->location = $request->location;
        $cases->case_created = $request->case_created;
        $cases->status = $status; 
        $cases->save();
        return redirect()->back()->with("success", "Case sucessfully added");
    }

    public function editCases($id){
        $data = Cases::where('case_id','=',$id)->first();
        return view('edit-cases',compact('data'));
    }
    

    public function updateCases(Request $request, $caseId) {
        $combinedRules = [
            'case_name' => 'required',
            'location' => 'in: rtc,mtc',
            'case_created' => 'required',
            'status' => 'in: Arrest, Bail, Pretrial, Plea, Trial, Sentencing, Appeal, Finished,Arraignment  ',
        ];
    
        $request->validate($combinedRules);
    
        // Find the case by ID
        $case = Cases::findOrFail($caseId);
    
        // Update Case Data
        $case->case_name = $request->case_name;
        $case->case_created = $request->case_created;
        $case->location = $request->location;
        $case->status = $request->status ?? 'Arrest';
        $case->save();
    
        return redirect()->back()->with("success", "Case successfully updated");
    }
    


    public function deleteCases($id){
        Cases::where('case_id','=',$id)->delete();
        return redirect()->back()->with('success','Cases Deleted Successfully');
    }

}
