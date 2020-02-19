<?php

namespace App\Http\Controllers;

use App\Models\RequestForm;
use Encore\Admin\Actions\Interactor\Form;
use Illuminate\Http\Request;
use App\Http\Requests\SaleFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DateTime;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;

class AppController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function request(Request $request)
    {
        if(isset($request)){
            $user = compact(Auth::user());
            return view('request-form',['sales_name' => auth()->user()->name]);
        }
        else{
            if($sales_name)
            {
                return view('request-form', [
                    'sales_name' => $sales_name,
                    'sales_type' => $sales_type,
                    'customer_name' => $customer_name,
                    'campaign_name' => $campaign_name,
                    'facebook' => $facebook,
                    'facebook_type' => $facebook_type,
                    'create_at' => $create_at
                ]);
            }
        }
        
    }

    public function review(Request $request)
    {
        return view('request-review',[
            'sales_name' => $request->sales_name,
            'sales_type' => $request->sales_type,
            'customer_name' => $request->customer_name,
            'campaign_name' => $request->campaign_name,
            'facebook' => $request->facebook,
            'facebook_type' => $request->facebook_type[0].'/'.$request->facebook_type[1],
            'create_at' => $request->create_at
        ]);
    }

    public function storeRequest(Request $request)
    {
        if($request->input('action') === 'Edit')
        {
            
            return view('request-form', [
                'sales_name' => $request->sales_name,
                'sales_type' => $request->sales_type,
                'customer_name' => $request->customer_name,
                'campaign_name' => $request->campaign_name,
                'facebook' => $request->facebook,
                'facebook_type' => $request->facebook_type,
                'create_at' => $request->create_at
            ]);
        }
        else
        {
            DB::connection('mysql')->insert('
                insert into request values (
                        NULL,
                        \'1\',
                        \''.$request->sales_name.'\',
                        \''.$request->sales_type.'\',
                        \''.$request->campaign_name.'\',
                        \''.$request->facebook.'\',
                        \''.$request->facebook_type.'\',
                        \'Waiting\',
                        \''.$request->create_at.'\',
                        \'1\',
                        \'1\',
                        \'1\'
                )'
            );

            //Send email to ...
            $this->sendEmail();
            
            return Redirect::to('request-form');
        }
         

        
    }

    private function sendEmail()
    {

    }


    public function showPendingList()
    {
        $someModel = DB::connection('mysql')->select('select * from request'); // static method
        $user = Auth::user();
        return view('pending-list',[
            'someModel' => json_decode(json_encode($someModel), True)
        ],compact('user'));
    }

    public function showMyActivities(Request $request)
    {
        if($request->from && $request->to)
        {
            $date_from = DateTime::createFromFormat('Y-m-d', $request->from)->format('j F Y');
            $date_to = DateTime::createFromFormat('Y-m-d', $request->to)->format('j F Y');
            $someModel = DB::connection('mysql')->select('select * from request'); // static method
            return view('request.activity-list',[
                'someModel' => json_decode(json_encode($someModel), True)
            ]);
        }
        else{
            return view('request.activity-list');
        }
        
        
    }

    public function createCustomer()
    {
        return view('create-customer');
    }

    public function storeCustomer(Request $request)
    {
         DB::connection('mysql')->insert('
            insert into request values (
                    NULL,
                    \'1\',
                    \''.$request->sales_name.'\',
                    \''.$request->sales_type.'\',
                    \''.$request->campaign_name.'\',
                    \''.$request->facebook.'\',
                    \''.$request->facebook_type.'\',
                    \'Waiting\',
                    \''.$request->create_at.'\',
                    \'1\',
                    \'1\',
                    \'1\'
            )'
        );
        
        return Redirect::to('create-customer');
    }


    public function booking(User $user)
    {
        $user = Auth::user();
        return view('booking', compact('user'));
    }

    
}
