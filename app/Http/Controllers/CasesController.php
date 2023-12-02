<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detainee;
use App\Models\Cases;
use App\Models\Event;
class CasesController extends Controller
{
    public function getCases(){
        $data = Cases::with('detainee')->get();
        return view('cases-list',compact('data'));
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
            'violations' => 'required',
            'case_created' => 'required|date',
            'arrest_report' => 'required',
            'testimonies' => 'required',
            'status' => 'in: Arrest, Bail, Pretrial, Plea, Trial, Sentencing, Appeal, Finished,Arraignment',
        ];

        $request->validate($combinedRules);
        //Save Case Data
        $cases = new Cases();
        $cases->case_id = $request->case_id;
        $cases->detainee_id = $detainee_id;
        $cases->case_name = $request->case_name; 
        $cases->violations = $request->violations;
        $cases->case_created = $request->case_created;
        $cases->arrest_report = $request->arrest_report;
        $cases->testimonies = $request->testimonies;
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
            'violations' => 'required',
            'case_created' => 'required',
            'arrest_report' => 'required',
            'testimonies' => 'required',
            'status' => 'in: Arrest, Bail, Pretrial, Plea, Trial, Sentencing, Appeal, Finished,Arraignment  ',
        ];
    
        $request->validate($combinedRules);
    
        // Find the case by ID
        $case = Cases::findOrFail($caseId);
    
        // Update Case Data
        $case->case_name = $request->case_name;
        $case->violations = $request->violations;
        $case->case_created = $request->case_created;
        $case->arrest_report = $request->arrest_report;
        $case->testimonies = $request->testimonies;
        $case->status = $request->status ?? 'Arrest';
        $case->save();
    
        return redirect()->back()->with("success", "Case successfully updated");
    }
    


    public function deleteCases($id){
        Cases::where('case_id','=',$id)->delete();
        return redirect()->back()->with('success','Cases Deleted Successfully');
    }

}
