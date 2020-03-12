<?php

namespace App\Http\Controllers;
use App\User;
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
    public function index(User $user)
    {
        //Set home page by user role
        if(auth()->user()->isDev()) {
            $user = Auth::user();
            return view('backend.home', compact('user'));
        } else {
            $user = Auth::user();
            return view('new.profile', compact('user'));
        }
    }

    public function welcome(User $user)
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }

    
}
