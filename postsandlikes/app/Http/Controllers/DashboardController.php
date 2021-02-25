<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        // dd(Auth::user()->posts);
        // if you wanna see an object and its relationships call table/fiels as a function
        // dd(Auth::user()->posts;
        // dd(Auth::user()->posts());
        return view('dashboard');
    }
}
