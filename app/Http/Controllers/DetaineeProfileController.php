<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Detainee;
use App\Models\DetaineeDetails;
use App\Models\Counsel_Case_Assignment;
class DetaineeProfileController extends Controller
{
    public function index(){
        $data = Detainee::get();
        return view('detainee-list',compact('data'));
    }
    public function addDetainee(){
        return view('add-detainee');
    }
    public function viewDetainee()
{
    return view('view-detainee');
}


   public function saveDetainee(Request $request){
    $combinedRules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'middle_name' => 'required',
        'email_address' => 'required|email',
        'home_address' => 'required',
        'contact_number' => 'required',
        'detainee_id' => 'required',
        'gender' => 'required',
        'mother_name' => 'required',
        'father_name' => 'required',
        'spouse_name' => 'nullable',
        'related_photos' => 'required',
        'crime_history' => 'required',
        'max_detention_period' => 'required',
        'detention_begin' => 'required',
        'medical_information' => 'required',
        'emergency_contact_number' => 'required',
        'emergency_contact_name' => 'required'
    ];
    $request->validate($combinedRules);

    // Create a new Detainee record
    $detainee = new Detainee();
    $detainee->detainee_id = $request->detainee_id;
    $detainee->first_name = $request->first_name;
    $detainee->last_name = $request->last_name;
    $detainee->middle_name = $request->middle_name;
    $detainee->email_address = $request->email_address;
    $detainee->home_address = $request->home_address;
    $detainee->contact_number = $request->contact_number;
    $detainee->save();

    // Create a new DetaineeDetails record
    $detaineeDetails = new DetaineeDetails();
    $detaineeDetails->detainee_id = $request->detainee_id;
    $detaineeDetails->gender = $request->gender;
    $detaineeDetails->mother_name = $request->mother_name;
    $detaineeDetails->father_name = $request->father_name;
    
    // Check if 'spouse_name' is provided in the request before assigning it
    if ($request->has('spouse_name')) {
        $detaineeDetails->spouse_name = $request->spouse_name;
    }
    
    $detaineeDetails->related_photos = $request->related_photos;
    $detaineeDetails->crime_history = $request->crime_history;
    $detaineeDetails->max_detention_period = $request->max_detention_period;
    $detaineeDetails->detention_begin = $request->detention_begin;
    $detaineeDetails->medical_information = $request->medical_information;
    $detaineeDetails->emergency_contact_number = $request->emergency_contact_number;
    $detaineeDetails->emergency_contact_name = $request->emergency_contact_name;
    $detaineeDetails->save();
    
    return redirect()->back()->with("success", 'Detainee and Details Added Successfully');
}

    

    public function editDetainee($id){
        // 
        $data = Detainee::with('detaineeDetails')->where('detainee_id', $id)->first();
        return view ('edit-detainee', compact('data'));
    }
    
    public function updateDetainee(Request $request)
    {
        dd($request->all());
        $combinedRules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'email_address' => 'required|email',
            'home_address' => 'required',
            'contact_number' => 'required',
            'detainee_id' => 'required',
            'gender' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'spouse_name' => 'nullable',
            'related_photos' => 'required',
            'crime_history' => 'required',
            'max_detention_period' => 'required',
            'detention_begin' => 'required',
            'medical_information' => 'required',
            'emergency_contact_number' => 'required',
            'emergency_contact_name' => 'required'
        ];
    
        $request->validate($combinedRules);
    
        $id = $request->id;
    
        // Update Detainee data (basic information)
        $detainee = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email_address' => $request->email_address,
            'home_address' => $request->home_address,
            'contact_number' => $request->contact_number,
        ];
        Detainee::where('detainee_id', $id)->update($detainee);
    
        // Update DetaineeDetails data (broader details)
        $detaineeDetails = [
            'gender' => $request->gender,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'spouse_name' => $request->spouse_name,
            'related_photos' => $request->related_photos,
            'crime_history' => $request->crime_history,
            'max_detention_period' => $request->max_detention_period,
            'detention_begin' => $request->detention_begin,
            'medical_information' => $request->medical_information,
            'emergency_contact_number' => $request->emergency_contact_number,
            'emergency_contact_name' => $request->emergency_contact_name,
        ];
        DetaineeDetails::where('detainee_id', $id)->update($detaineeDetails);
        
    
        return redirect()->back()->with('Success', 'Detainee Profile and Details Updated Successfully');
    }
    

    public function deleteDetainee($id){
        Detainee::where('detainee_id','=',$id)->delete();
        return redirect()->back()->with('Success','Detainee Deleted Successfully');
    }

    //For Viewing
    public function viewDetails($id) {
        $assignedAttorney = Counsel_Case_Assignment::where('detainee_id', $id)->first();
        $detainee = Detainee::with('detaineeDetails')->find($id);
        return view('assign-attorney', ['detainee' => $detainee, 'counsel_case_assignment' => $assignedAttorney]);
    }
    

    public function viewDetails2($id) {
        $assignedAttorney = Counsel_Case_Assignment::where('detainee_id', $id)->first();
        $detainee = Detainee::with('detaineeDetails')->find($id);
        return view('view-detainee', ['detainee' => $detainee, 'counsel_case_assignment' => $assignedAttorney]);
    }
    
}
