<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'superadmin') {
            return view('home'); // Superadmin dashboard view
        } else {
            return view('home'); // User dashboard view
        }
    }
}
