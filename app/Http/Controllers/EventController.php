<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function addEventForm($case_id)
    {
        // Load the view for adding a new event, passing the case_id for reference
        return view('add-event', compact('case_id'));
    } 

    public function saveEvent(Request $request, $case_id)
    {
        // Validate the form input
        $request->validate([
            'event_type' => 'required',
            'event_date' => 'required|date',
            'description' => 'required',
            'related_entity' => 'required',
            'event_location' => 'required',
            'event_outcome' => 'required',
            'event_notes' => 'nullable|file|mimes:doc,docx,pdf,jpg,png|max:2048',
        ]);

        $uploadedFile = $request->file('event_notes');
        if ($uploadedFile) {
            $fileContents = file_get_contents($uploadedFile->getRealPath());
        } else {
            $fileContents = null;
        }


        // Create a new event and associate it with the case using the case_id
        Event::create([
            'case_id' => $case_id,
            'event_type' => $request->input('event_type'),
            'event_date' => $request->input('event_date'),
            'description' => $request->input('description'),
            'related_entity' => $request->input('related_entity'),
            'event_location' => $request->input('event_location'),
            'event_outcome' => $request->input('event_outcome'),
            'event_notes' => $fileContents,
        ]);
        return redirect()->route('live-cases', ['id' => $case_id])->with('success', 'Event added successfully');
    }

    public function editEvent($event_id)
    {
        // Retrieve the event data based on the event_id
        $event = Event::findOrFail($event_id);
    
        // Pass the $case_id to the view
        $case_id = $event->case_id;
        
        // Return the edit view with the event data and case_id
        return view('edit-event', compact('event', 'case_id'));
    }
    

    // Update an event
    public function updateEvent(Request $request, $event_id)
    {
        // Validate the form input
        $request->validate([
            'event_type' => 'required',
            'event_date' => 'required|date',
            'description' => 'required',
            'related_entity' => 'required',
            'event_location' => 'required',
            'event_outcome' => 'required',
        ]);
    // Find the event by its ID
        $event = Event::find($event_id);

        // Update event properties
        $event->event_type = $request->input('event_type');
        $event->event_date = $request->input('event_date');
        $event->description = $request->input('description');
        $event->related_entity = $request->input('related_entity');
        $event->event_location = $request->input('event_location');
        $event->event_outcome = $request->input('event_outcome');
        $event->event_notes = $request->input('event_notes');

        // Save the updated event
        $event->save();

        return redirect()->route('live-cases', ['case_id' => $event->case_id])->with('success', 'Event updated successfully');
    }
        // Delete an event
        public function deleteEvent($event_id)
        {
            // Find the event by its ID
            $event = Event::find($event_id);
    
            // Get the case ID before deleting the event
            $case_id = $event->case_id;
    
            // Delete the event
            $event->delete();
    
            return redirect()->route('live-cases', ['id' => $case_id])->with('success', 'Event deleted successfully');
        }
}
