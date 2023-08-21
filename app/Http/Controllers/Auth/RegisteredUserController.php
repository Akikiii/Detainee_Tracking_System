<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
    //Registration Stuffs Down here
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'office_address' => ['required', 'string'],
            'contact_number' => ['required', 'string'],
            'gender' => ['required', 'in:male,female'],
            'education_qualifications' => ['required', 'string'],
            'practice_areas' => ['required', 'string'],
            'work_experience' => ['required', 'string'],
            'professional_affiliations' => ['required', 'string'],
            'cases_handled' => ['required', 'string'],
            'language_spoken' => ['required', 'string'],
            'office_hours_open' => ['required', 'date_format:H:i'],
            'office_hours_close' => ['required', 'date_format:H:i'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'office_address' => $request->office_address,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'education_qualifications' => $request->education_qualifications,
            'practice_areas' => $request->practice_areas,
            'work_experience' => $request->work_experience,
            'professional_affiliations' => $request->professional_affiliations,
            'cases_handled' => $request->cases_handled,
            'language_spoken' => $request->language_spoken,
            'office_hours_open' => $request->office_hours_open,
            'office_hours_close' => $request->office_hours_close,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
