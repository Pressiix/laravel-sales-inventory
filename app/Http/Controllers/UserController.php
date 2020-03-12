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

        //Delete old profile picture in storage
        if(Auth::user()->profile_picture)
        {
            if(\File::exists(url('/').Auth::user()->profile_picture)){
                \File::delete(url('/').Auth::user()->profile_picture);
            }
        }
        
        //Save upload image to 'avatar' folder which in 'storage/app/public' folder
        if($request->file('image'))
        {
            if(strpos($request->file('image')->getMimeType(), 'jpeg') !== false || strpos($request->file('image')->getMimeType(), 'png') !== false)
            {
                //Upload file to storage folder
                \Storage::disk('storage')->put('public/avatar/', $request->file('image'));
                //Update profile picture in database
                DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update(['profile_picture' => '/storage/avatar/'.$request->file('image')->hashName()]);

                return redirect('/profile')->with('success','Your profile picture has been successfully uploaded!');
            }
            else{
                return redirect('/profile')->with('error','Upload unsuccessfully!, Please upload .jpg or png file');
            }
        }
        
        
    }

}





