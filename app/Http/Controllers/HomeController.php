<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $role = Role::findById(2);
        $permission = Permission::create(['name' => 'edit request']);
        $role->givePermissionTo($permission);
        $user = Auth::user();
        return view('new.profile', compact('user'));
    }

    public function welcome(User $user)
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }

    
}
