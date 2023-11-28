<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == '0') {
            return view('pages.student-parent-auth.payable.index');
        } elseif ($role == '1') {
            return view('pages.staff-auth.students.index');
        } else {
            return view('pages.admin-auth.dashboard.index');
        }
    }
}
