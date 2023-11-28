<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendOTPMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the email exists in the database
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            // Email not found, show an error message
            return redirect()->back()->with('email-not-found', 'Email not found.');
        }

        // Email found, validate the password
        if (!Hash::check($request->input('password'), $user->password)) {
            // Incorrect password, show an error message
            return redirect()->back()->with('incorrect-password', 'Incorrect password.');
        }

        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Store the OTP in the user's record (you may use a different storage method)
        $user->otp = $otp;
        $user_email = $user->email;

        $user->save();

        // Send the OTP to the user's email
        Mail::to($user->email)->send(new SendOTPMail($otp, $user->email));

        // Pass both email and OTP to the OTP verification view
        return view('otp_verification', compact('user_email'));
    }

    public function loginPage()
    {
        return view('pages.welcome');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerate();

        return redirect('/');
    }

    public function verifyOTP(Request $request)
    {
        // Validate the submitted OTP and email
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric|min:100000|max:999999',
        ]);

        // Get the user by their email
        $user = User::where('email', $request->input('email'))->first();

        $user_email = $user->email;

        if (!$user) {
            // User not found, you may want to handle this differently
            return redirect()->route('login')->with('error', 'User not found.');
        }

        // Check if the submitted OTP matches the one stored in the user's record
        if ($request->input('otp') == $user->otp) {
            // Log the user in
            Auth::login($user);

            // Redirect to the intended dashboard based on the user's role
            if ($user->role == '0') {
                return redirect()->route('payable.index');
            } elseif ($user->role == '1') {
                return redirect()->route('students.index');
            } else {
                return redirect()->route('dashboard.index');
            }
        } else if (strlen($request->input('otp')) > 6) {
            return view('otp_verification', compact('user_email'))
                ->withErrors(['error' => 'OTP is incorrect.']);
        } else if ($request->input('otp') != $user->otp) {
            return view('otp_verification', compact('user_email'))
                ->withErrors(['error' => 'OTP is incorrect.']);
        }
    }

    public function authorizedRedirect()
    {
        if (Auth::user()->role == '0') {
            return redirect()->route('payable.index');
        } elseif (Auth::user()->role == '1') {
            return redirect()->route('students.index');
        } else {
            return redirect()->route('dashboard.index');
        }
    }


    public function forgotPassword()
    {
        return view('forgot');
    }

    public function postRecover(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect()->back()->with('email-not-found', 'Email not found.');
        }

        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Store the OTP in the user's record (you may use a different storage method)
        $user->otp = $otp;
        $user_email = $user->email;
        $user->save();

        Mail::to($user->email)->send(new SendOTPMail($otp, $user->email));

        // Pass both email and OTP to the OTP verification view for recovery
        return view('recover-by-otp', compact('user_email'));
    }

    public function recoverOTP(Request $request)
    {
        // Validate the submitted OTP and email
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric|min:100000|max:999999',
        ]);

        // Get the user by their email
        $user = User::where('email', $request->input('email'))->first();
        $user_email = $user->email;

        if (!$user) {
            // User not found, you may want to handle this differently
            return redirect()->route('login')->with('error', 'User not found.');
        }
        // Check if the submitted OTP matches the one stored in the user's record
        if ($request->input('otp') == $user->otp) {

            return view('reset', compact('user_email'));
        } else if ($request->input('otp') != $user->otp) {
            return redirect()->back();
        }
    }

    public function submitReset(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('login')->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }

    public function confirm_changes(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email not found.');
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Check if the 'keep_logged_in' checkbox is checked
        if ($request->has('keep_logged_in')) {
            Auth::login($user);

            // Redirect to the intended dashboard based on the user's role
            if ($user->role == '0') {
                return redirect()->route('payable.index');
            } elseif ($user->role == '1') {
                return redirect()->route('students.index');
            } else {
                return redirect()->route('dashboard.index');
            }
        }

        return redirect()->route('login')->with('success', 'Password changed successfully.');
    }

    public function validate_from_current_pass(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        $user_email = $user->email;
        if (!$user) {
            return redirect()->back()->with('email-not-found', 'Email not found.');
        }

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->with('incorrect-password', 'Incorrect password.');
        }

        return view('reset-pass-auth', compact('user_email'));
    }
}
