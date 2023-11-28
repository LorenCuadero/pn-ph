<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VerifyOtpController extends Controller
{
    public function verifyOTP(Request $request)
    {
        // Validate the OTP entered by the user
        $enteredOTP = $request->input('otp');
        $cachedOTP = Cache::get('otp_' . $request->input('email'));

        if ($enteredOTP == $cachedOTP) {
            // OTP is valid, grant access
            // You can implement your logic here
            return redirect()->route('dashboard'); // Example: Redirect to the dashboard after successful OTP verification
        } else {
            // Invalid OTP, show an error message
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }
    }

}
