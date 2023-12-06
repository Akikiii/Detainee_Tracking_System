<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $case_id, $event_id)
    {
        // Validate the incoming request
        $request->validate([
            'commentText' => 'required|string|max:255', 
        ]);

        // Create a new comment with associated case_id, event_id, user_id, and comment
        $comment=Comment::create([
            'case_id' => $case_id,
            'event_id' => $event_id,
            'user_id' => auth()->id(), // Assuming you're using Laravel's built-in authentication
            'commentText' => $request->input('commentText'),
        ]);
        //dd($comment);
        // Redirect back or wherever you want after submitting the comment
        return redirect()->back()->with('success', 'Comment posted successfully');
    }
}
