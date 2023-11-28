<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // ...

    // Add this method to display the OTP login form
    public function showOtpLoginForm()
    {
        return view('auth.otp-login');
    }

    // Add this method to send OTP via email and proceed with login
    public function otpLogin(Request $request)
    {
        // Validate the email provided in the OTP form
        $request->validate([
            'email' => 'required|email',
        ]);

        // Generate a random OTP (you can implement this logic)
        $otp = generateRandomOTP();

        // Send the OTP email
        Mail::to($request->email)->send(new OTPMail($otp));

        // Store the OTP in the session for verification
        $request->session()->put('otp', $otp);

        // Redirect the user to the OTP verification form
        return redirect()->route('otp.login.form');
    }
}
