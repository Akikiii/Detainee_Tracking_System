<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InviteUser;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function sendInvitation(Request $request)
    {
        $email = $request->input('email');
        $role = $request->input('user_role');

        // Send the invitation email
        Mail::to($email)->send(new InviteUser($role));
        return redirect()->back()->with('success', 'Invitation email sent successfully.');
    }
}
