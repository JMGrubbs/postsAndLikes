<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->only('email', 'password'));
        $this->validate($request, [
            'email'=>'required|email',
            'pasword'=>'required',
        ]);
        if(!Auth::attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalis lofin details');
        }
        
        return redirect()->route('dashboard');
    }
}