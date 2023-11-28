<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
    
        event(new Registered($user = $this->create($request->all())));
    
        if (Str::contains($request->input('email'), '@student')) {
            $user->role = 0;
        } else {
            $user->role = 1; 
        }
    
        $this->guard()->login($user);
    
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    public function accounts()
    {
        return view('pages.admin-auth.accounts.index');
    }
}
