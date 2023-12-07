<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Detainee;
use App\Models\DetaineeDetails;
use App\Models\Counsel_Case_Assignment;
use App\Models\Event;
class DetaineeProfileController extends Controller
{
    public function index(){
        $data = Detainee::all();
        return view('detainee-list', compact('data'));
    }
    
    public function addDetainee(){
        return view('add-detainee');
    }
   

   public function saveDetainee(Request $request){
    $combinedRules = [
        'first_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:30',
        'last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:30',
        'middle_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:30',
        'email_address' => 'required|email|max:255',
        'home_address' => 'required|string|max:255',
        'contact_number' => 'required|numeric|digits:11',
        'detainee_id' => 'required|integer|max:9999999|unique:detainees,detainee_id|',
        'gender' => 'required|in:Male,Female',
        'mother_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:30',
        'father_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:30',
        'spouse_name' => 'nullable|string|regex:/^[a-zA-Z\s]+$/|max:30',
        'related_photos' => 'required', //Violations not related_photos
        'crime_history' => 'required|string',
        'detention_begin' => 'required|date|before_or_equal:today',
        'birthday' => 'required|date|before_or_equal:' . now()->subYears(15)->format('Y-m-d'),
        'emergency_contact_number' => 'required|numeric|digits:11',
        'emergency_contact_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:30',
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
    $detaineeDetails->detention_begin = $request->detention_begin;
    $detaineeDetails->birthday = $request->birthday;
    $detaineeDetails->emergency_contact_number = $request->emergency_contact_number;
    $detaineeDetails->emergency_contact_name = $request->emergency_contact_name;
    $detaineeDetails->save();
    
    return redirect()->back()->with("success", 'Detainee and Details Added Successfully');
}

    

public function editDetainee($id) {
    // Assuming you are retrieving the detainee and detainee details by ID from the database
    $detainee = Detainee::findOrFail($id);
    $detaineeDetails = DetaineeDetails::where('detainee_id', $id)->first();

    // Pass the $detainee, $detaineeDetails, and $id to the view
    return view('edit-detainee', ['detainee' => $detainee, 'detaineeDetails' => $detaineeDetails, 'detaineeId' => $id]);
}

    
public function updateDetainee(Request $request, $detaineeId) {

    $combinedRules = [
        'first_name' => 'required|string|alpha|max:30',
        'last_name' => 'required|string|alpha|max:30',
        'middle_name' => 'required|string|alpha|max:30',
        'email_address' => 'required|email|max:255',
        'home_address' => 'required|string|max:255',
        'contact_number' => 'required|numeric|digits:11',
        'detainee_id' => 'required|integer|max:9999999',
        'gender' => 'required|in:Male,Female',
        'mother_name' => 'required|string|alpha|max:255',
        'father_name' => 'required|string|alpha|max:255',
        'spouse_name' => 'nullable|string|alpha|max:255',
        'related_photos' => 'required',
        'crime_history' => 'required|string',
        'detention_begin' => 'required|date|before_or_equal:today',
        'birthday' => 'required|date|before_or_equal:' . now()->subYears(15)->format('Y-m-d'),
        'emergency_contact_number' => 'required|numeric|digits:11',
        'emergency_contact_name' => 'required|string|alpha|max:255',
    ];
    
    $request->validate($combinedRules);

    // Update Detainee record
    $detainee = Detainee::where('detainee_id', $detaineeId)->first();
    $detainee->detainee_id = $request->detainee_id;
    $detainee->first_name = $request->first_name;
    $detainee->last_name = $request->last_name;
    $detainee->middle_name = $request->middle_name;
    $detainee->email_address = $request->email_address;
    $detainee->home_address = $request->home_address;
    $detainee->contact_number = $request->contact_number;
    $detainee->save();

    // Update DetaineeDetails record
    $detaineeDetails = DetaineeDetails::where('detainee_id', $detaineeId)->first();
    $detaineeDetails->detainee_id = $request->detainee_id;
    $detaineeDetails->gender = $request->gender;
    $detaineeDetails->mother_name = $request->mother_name;  
    $detaineeDetails->father_name = $request->father_name;
    
    // Check if 'spouse_name' is provided in the request before updating it
    if ($request->has('spouse_name')) {
        $detaineeDetails->spouse_name = $request->spouse_name;
    } else {
        // If 'spouse_name' is not provided in the request, you may want to set it to null or an empty value
        $detaineeDetails->spouse_name = null;
    }

    $detaineeDetails->related_photos = $request->related_photos;
    $detaineeDetails->crime_history = $request->crime_history;
    $detaineeDetails->detention_begin = $request->detention_begin;
    $detaineeDetails->birthday = $request->birthday;
    $detaineeDetails->emergency_contact_number = $request->emergency_contact_number;
    $detaineeDetails->emergency_contact_name = $request->emergency_contact_name;
    $detaineeDetails->save();
    
    if ($detainee->wasChanged() && $detaineeDetails->wasChanged()) {
        // Changes were made and saved successfully
        return redirect()->back()->with("success", 'Detainee and Details Updated Successfully');
        
    } else {
        // No changes were made or there was an issue with saving
        return redirect()->back()->with("error", 'Detainee and Details Update Failed');
    }
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
        
            // Iterate through each case to determine its latest event and update the status
            foreach ($detainee->cases as $case) {
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
        
            return view('view-detainee', ['detainee' => $detainee, 'counsel_case_assignment' => $assignedAttorney]);
        }
        
        
    
}
