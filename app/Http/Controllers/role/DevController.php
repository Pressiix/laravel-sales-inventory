<?php

namespace App\Http\Controllers\role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DevController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('backend.home', compact('user'));
    }

    public function createUser()
    {
        return view('backend.home');
    }
}
