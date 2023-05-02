<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function _construct(){
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){


        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        // create a new user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]
        );

        // redirect user
        return redirect()->route('dashboard'); 
    }
}
