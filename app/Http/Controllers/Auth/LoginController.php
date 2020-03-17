<?php

  

namespace App\Http\Controllers\Auth;

  

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Redirect;
  

class LoginController extends Controller

{

  

    use AuthenticatesUsers;

    

    //protected $redirectTo = '/';

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }

  

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function login(Request $request)

    {   

        $input = $request->all();

  

        $this->validate($request, [

            'username' => 'required',

            'password' => 'required',

        ]);

  

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))

        {

            return Redirect::to($this->redirectTo());

        }else{

            return redirect()->route('login')

                ->with('error','Email-Address And Password Are Wrong.');

        }
    }

    /** Set home routing after user has login */
    protected function redirectTo()
    {
            return '/home';
    }

}