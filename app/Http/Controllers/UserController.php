<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }
    public function update(Request $request)
    { 
        $user = Auth::user();
        //echo '<pre/>';print_r($user );
        
        DB::table('users')->where('id', Auth::user()->id)->update([
                        'email' => $request->email,
                        'telephone' => $request->telephone
                    ]);
        return redirect('/profile');      
    }

    public function uploadProfileImage(Request $request)
    {
        $user = Auth::user();
        if(Auth::user()->profile_picture)
        {
            if(\File::exists(public_path(Auth::user()->profile_picture))){
                \File::delete(public_path(Auth::user()->profile_picture));
            }
        }
        
        //Save upload image to 'avatar' folder which in 'storage/app/public' folder
        if($request->file('image'))
        {
            //$path = $request->file('image')->store('avatar','public');
            //print_r($request->file('image')->hashName());
            \Storage::disk('public')->put('avatar/', $request->file('image'));
            DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update(['profile_picture' => '/storage/avatar/'.$request->file('image')->hashName()]);
        }
        
        return redirect('/profile');
    }

}





