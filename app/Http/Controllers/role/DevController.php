<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index()
    {
        return view('backend.home');
    }

    public function createUser()
    {
        return view('backend.home');
    }
}
