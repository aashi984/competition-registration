<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\SignupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Show the signup (registration) form when visiting the home page
Route::get('/', function () {
    return redirect('/signup');  // Redirect to the signup page instead of the register page
});

// Enable authentication with email verification
Auth::routes(['verify' => true]);


// Route to handle signup form POST
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup.submit');


// Route for Register (Competition Registration Form)
Route::get('/register', [RegistrationController::class, 'create'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

// Show home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Competition registration only for logged-in & verified users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/competition-register', [RegistrationController::class, 'create'])->name('competition.register.form');
    Route::post('/competition-register', [RegistrationController::class, 'store'])->name('competition.register.store');
});

// AJAX route to check if an email already exists (real-time validation)
Route::get('/check-email', function (Request $request) {
    $email = $request->query('email');
    $exists = DB::table('registrations')->where('email', $email)->exists();
    return response()->json(['exists' => $exists]);
})->name('check.email');

// Thank you page after form submission
Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');
