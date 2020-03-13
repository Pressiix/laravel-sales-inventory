<?php

namespace App\Http\Controllers\role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;

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

    public function test()
    {
        echo public_path().Auth::user()->profile_picture;
    }

    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Developer',
            'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('watcharapon.piam@gmail.com')->send(new SendMail($details));
    }
}
