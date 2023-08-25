<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\detainee;
class DetaineeProfileController extends Controller
{
    public function index(){
        $data = detainee::get();
        return view('detainee-list',compact('data'));
    }
    public function addDetainee(){
        return view('add-detainee');
    }
    public function saveDetainee(Request $request){

        //Ensures that there is data inputted in creating 
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'email_address' => 'required|email',
            'home_address' => 'required',
            'contact_address' => 'required'
        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $middle_name = $request->middle_name;
        $home_address = $request->home_address;
        $contact_address = $request->contact_address;
        $email_address = $request->email_address;

        $detainee = new Detainee();
        $detainee->first_name = $first_name;
        $detainee->last_name = $last_name;
        $detainee->middle_name = $middle_name;
        $detainee->home_address = $home_address;
        $detainee->contact_address = $contact_address;
        $detainee->email_address = $email_address;
        $detainee->save();

        return redirect()->back()->with("success",'Detainee Added Successfully');
    }

    public function editDetainee($id){
        $data = detainee::where('id','=',$id)->first();
        return view ('edit-detainee',compact('data'));
    }
    public function updateDetainee(Request $request){
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'email_address' => 'required|email',
            'home_address' => 'required',
            'contact_address' => 'required'
        ]);

        $id = $request->id;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $middle_name = $request->middle_name;
        $home_address = $request->home_address;
        $contact_address = $request->contact_address;
        $email_address = $request->email_address;

        detainee::where('id','=',$id)->update([
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'middle_name'=>$middle_name,
            'email_address'=>$email_address,
            'home_address'=>$home_address,
            'contact_address'=>$contact_address
        ]);
        return redirect()->back()->with('Success', 'Detainee Profile Updated Successfully');
    }
    public function deleteDetainee($id){
        detainee::where('id','=',$id)->delete();
        return redirect()->back()->with('Success','Detainee Deleted Successfully');
    }
}
