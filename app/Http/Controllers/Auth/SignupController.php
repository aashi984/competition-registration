<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class SignupController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        return view('auth.signup');  // No .blade.php extension
    }

    // Handle the signup form submission
    public function signup(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Trigger the email verification
        event(new Registered($user));

        // Log the user in
        auth()->login($user);

        // Redirect to the email verification page
        return redirect()->route('verification.notice');
    }
}
