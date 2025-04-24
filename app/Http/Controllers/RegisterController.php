<?php

namespace App\Http\Controllers;
use App\Models\Competitor;
use Illuminate\Http\Request;



class RegisterController extends Controller
{
    public function showForm()
    {
        $countries = ['India', 'United States', 'Canada', 'Australia', 'Germany']; 
        $colleges = [
            'Indian Institute of Technology (IIT) Madras',
            'Anna University, Chennai',
            'College of Engineering, Guindy (CEG), Anna University',
            'PSG College of Technology, Coimbatore',
            'Cochin University of Science and Technology (CUSAT), Coimbatore Campus',
            'Sri Sivasubramaniya Nadar College of Engineering (SSNCE), Chennai',
            'VIT University, Vellore',
            'Bannari Amman Institute of Technology, Sathyamangalam',
            'Karunya Institute of Technology and Sciences, Coimbatore',
            'Rajalakshmi Engineering College, Chennai',
            'Shiv Nadar University, Chennai Campus',
            'Mepco Schlenk Engineering College, Sivakasi',
            'Kongu Engineering College, Erode',
            'Amrita Vishwa Vidyapeetham, Coimbatore',
            'SRM Institute of Science and Technology, Chennai',
            'Vel Tech Dr. RR & Dr. SR Technical University, Chennai',
            'Thiagarajar College of Engineering, Madurai',
            'Sathyabama Institute of Science and Technology, Chennai',
            'Tidel Park Institute of Technology, Chennai'
        ];

        return view('register', compact('countries', 'colleges'));
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => ['required', 'regex:/^[A-Za-z ]+$/'],
            'email' => ['required', 'email', 'unique:competitors,email'],
            'contact_number' => ['required', 'digits:10'],
            'gender' => ['required'],
            'country' => ['required'],
            'college' => ['required'],
            'year' => ['required'],
            'domain' => ['required'],
        ]);

        Competitor::create($validated);

        return redirect('/')->with('success', 'Registration successful!');
    }

    public function showRegistrations()
    {
        $registrations = Competitor::all(); // Get all registered competitors
        return view('admin.registrations', compact('registrations'));
    }
}
