<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        $user = Auth::user();
        
        if ($user->role ) {
            return route('home'); // Replace with the appropriate route for superadmin
        } else {
            return route('home'); // Replace with the appropriate route for regular users
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
