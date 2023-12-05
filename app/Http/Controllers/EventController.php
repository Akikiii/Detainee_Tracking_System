<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Event;
use App\Models\Bail;
use App\Models\Detainee;
use App\Models\Cases;



class EventController extends Controller
{
    public function addEventForm($case_id)
    {
        // Load the view for adding a new event, passing the case_id for reference
        return view('add-event', compact('case_id'));
    } 

    public function saveEvent(Request $request, $case_id)
{
    $bailConfirmation = $request->input('bail_confirmation');
    $request->validate([
        'event_type' => [
            'required',
            Rule::unique('case_events')->where(function ($query) use ($case_id, $request) {
                return $query->where('case_id', $case_id)
                    ->where('event_type', $request->input('event_type'));
            }),
        ],
        'event_date' => 'required|date',
        'verdict' => 'required|in:guilty,not_guilty,no_contest',
        'description' => 'required',
        'related_entity' => 'required',
        'event_outcome' => 'required',
        'bail_confirmation' => 'required|in:paid,not_paid', 
    ]);

    $uploadedFile = $request->file('event_notes');
    $fileContents = $uploadedFile ? file_get_contents($uploadedFile->getRealPath()) : null;

    $case = Cases::with('detainee')->findOrFail($case_id);

    // Check if the event type is "Bail"
    if ($request->input('event_type') === 'Bail') {
        // Validate and process the Bail fields
        $request->validate([
            'bail_type' => 'required',
            'amount' => 'required|numeric',
        ]);

        // Create a new Bail record
        $bail = new Bail([
            'detainee_id' => $case->detainee_id,
            'case_id' => $case_id,
            'bail_type' => $request->input('bail_type'),
            'amount' => $request->input('amount'),
        ]);

        // Save the Bail record
        if (!$bail->save()) {
            dd('Failed to save Bail');
        }
    }

    // Create a new Event record
    Event::create([
        'case_id' => $case_id,
        'event_type' => $request->input('event_type'),
        'event_date' => $request->input('event_date'),
        'description' => $request->input('description'),
        'bail_confirmation' => $bailConfirmation,
        'related_entity' => $request->input('related_entity'),
        'event_outcome' => $request->input('event_outcome'),
        'verdict' => $request->input('verdict'),
    ]);

    return redirect()->route('live-cases', ['id' => $case_id])->with('success', 'Event added successfully');
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
            'event_outcome' => 'required',
        ]);
    // Find the event by its ID
        $event = Event::find($event_id);

        // Update event properties
        $event->event_type = $request->input('event_type');
        $event->event_date = $request->input('event_date');
        $event->description = $request->input('description');
        $event->related_entity = $request->input('related_entity');
        $event->event_outcome = $request->input('event_outcome');

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
