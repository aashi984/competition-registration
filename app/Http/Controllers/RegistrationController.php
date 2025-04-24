<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // Displayingg the registration form
    public function create()
    {
        $countries = ['India', 'USA', 'UK', 'Canada'];

        $colleges = [
            'Indian Institute of Technology Madras',
            'National Institute of Technology Trichy',
            'Anna University',
            'SRM University',
            'VIT Vellore',
            'PSG College of Technology',
            'Amrita Vishwa Vidyapeetham',
            'Coimbatore Institute of Technology',
            'BITS Pilani',
            'Delhi Technological University',
            'Arunachala College of Engineering for Women',
        ];

        return view('register', compact('countries', 'colleges'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'contact_number' => ['required', 'digits:10'],
            'gender' => ['required'],
            'email' => ['required', 'email', 'unique:registrations,email'],
            'country' => ['required'],
            'college' => ['required'],
            'year' => ['required'],
            'domain' => 'required|string|max:255',
        ],  [
                'name.required' => 'The name field is required.',
                'name.regex' => 'The name can only contain letters and spaces.',
                'contact_number.required' => 'The contact number is required.',
                'contact_number.digits' => 'The contact number must be exactly 10 digits.',
                'gender.required' => 'Gender is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already registered.',
                'country.required' => 'Please select a country.',
                'college.required' => 'Please select a college.',
                'year.required' => 'Please select your year of study.',
                'domain.required' => 'Please specify your domain/department.',  
            ]);


            
        

        Registration::create([
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'gender' => $request->gender,
            'email' => $request->email,
            'country' => $request->country,
            'college' => $request->college,
            'year' => $request->year,
            'domain' => $request->domain 
        ]);
        
        return redirect()->route('thankyou')->with('success', 'Registration successful!');
    }

    public function showRegistrations()
    {
        $registrations = Registration::all();

        return view('admin.registrations', compact('registrations'));
    }
}
