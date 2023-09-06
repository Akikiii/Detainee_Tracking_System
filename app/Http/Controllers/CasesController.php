<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;
class CasesController extends Controller
{
    public function getCases(){
        $data = Cases::get();
        return view('cases-list',compact('data'));
    }

    public function addCases(){
        return view('add-cases');
    }

    public function saveCases(Request $request){

        $combinedRules =[
            //'case_id' => 'required',
            'case_name' => 'required',
            'violations' => 'required',
            'case_created' => 'required',
            'arrest_report' => 'required',
            'testimonies' => 'required'
        ];

        $request->validate($combinedRules);

        //Save Case Data
        $cases = new Cases();
        //$cases->case_id = $request->case_id;
        $cases->case_name = $request->case_name; 
        $cases->violations = $request->violations;
        $cases->case_created = $request->case_created;
        $cases->arrest_report = $request->arrest_report;
        $cases->testimonies = $request->testimonies;
        $cases->save();

        return redirect()->back()->with("success", "Case sucessfully added");
    }

    public function editCases($id){
        $data = Cases::where('id','=',$id)->first();
        return view('edit-cases',compact('data'));
    }

    public function updateCases(Request $request){
        $combinedRules =[
            //'case_id' => 'required',
            'case_name' => 'required',
            'violations' => 'required',
            'case_created' => 'required',
            'arrest_report' => 'required',
            'testimonies' => 'required'
        ];

        $request->validate($combinedRules);
        $id = $request->id;

        $cases = [
            //'case_id' => $request->case_id,
            'case_name' => $request->case_name,
            'violations' => $request->violations,
            'case_created' => $request->case_created,
            'arrest_report' => $request->arrest_report,
            'testimonies' => $request->testimonies
        ];
        Cases::where('id',$id)->update($cases);

        return redirect()->back()->with('success', 'Case Successfully updated!');
    }


    public function deleteCases($id){
        Cases::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Cases Deleted Successfully');
    }

}