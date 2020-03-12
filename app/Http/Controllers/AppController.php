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
    public function test()
    {
       
        return view('test')->with('success','Item created successfully!');
    }
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function request()
    {
        $customer = array_column(json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True),'customer_fullname','id');
        $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
        $datos = file_get_contents(storage_path().'/jsondata/request-form.json');
        $data = json_decode($datos, true);

        return view('new.request_form',[
            'sales_name' => auth()->user()->name,
            'customer' => $customer,
            'advertiser' => $advertiser,
            'sectionArray' => $data,
        ]);
    }

    public function review(Request $request)
    {
        //echo "<pre/>"; print_r($request->all());
         return view('new.request_preview',[
             'item' => $request->all()
         ]);
    }

    public function storeRequest(Request $request)
    {
        if($request->input('action') === 'Edit')
        {
            $customer = array_column(json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True),'customer_fullname','id');
            $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
            $datos = file_get_contents(storage_path().'/jsondata/request-form.json');
            $data = json_decode($datos, true);
            //echo "<pre/>"; print_r($request->all());
            $item = $request->all();
            /*if(isset($item)){
                echo 'a';
            }else{
                echo 'b';
            }*/
            //echo "<pre/>"; print_r($customer);
            return view('new.request_form', [
                'action' => 'Edit',
                'sales_name' =>$request->sales_name,
                'customer' => $customer,
                'advertiser' => $advertiser,
                'item' => $item,
                'sectionArray' => $data
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
                        \''.$request->campaign_budget.'\',
                        \'1\',
                        \''.$request->customer_id.'\',
                        \''.$request->advertiser_id.'\'
                )
            ');

            //Send email to ...
            $this->sendEmail();
            
            return Redirect::to('request-form')->with('success','Request form created successfully!');
        }
         

        
    }

    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Developer',
            'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('watcharapon.piam@gmail.com')->send(new \App\Mail\SendMail($details));
    }


    public function booking(User $user)
    {
        //$user = Auth::user();
        return view('booking'/*, compact('user')*/);
    }

    public function showRevenue(User $user)
    {
        //$user = Auth::user();
        return view('revenue'/*, compact('user')*/);
    }

    public function showCampaignReport(User $user)
    {
        //$user = Auth::user();
        return view('campaign-report'/*, compact('user')*/);
    }

    public function showAdNetwork(User $user)
    {
        //$user = Auth::user();
        return view('ad-network'/*, compact('user')*/);
    }

    

    public function storeBooking(Request $request)
    {
        //Save upload image to 'avatar' folder which in 'storage/app/public' folder
        $path = $request->file('file')->store('files','public');
        return view('booking');
    }
    
    /*new design*/
    public function profile()
    {
        $user = Auth::user();
        return view('new.profile',compact('user'));
    }
    public function profile2()
    {
        $someModel = DB::connection('mysql')->select('select * from request'); // static method
        $user = Auth::user();
        return view('new.profile2',[
            'someModel' => json_decode(json_encode($someModel), True)
        ],compact('user'));

        /*$user = Auth::user();
        return view('new.profile2',compact('user'));*/
    }
    public function profile3()
    {
        $someModel = DB::connection('mysql')->select('select * from request'); // static method
        $user = Auth::user();
        return view('new.profile3',[
            'someModel' => json_decode(json_encode($someModel), True)
        ],compact('user'));
    }
    public function ad_network()
    {
        return view('new.ad_network');
    }
    public function ad_network_bymonth()
    {
        return view('new.ad_network_bymonth');
    }
    public function ad_network_create()
    {
        return view('new.ad_network_create');
    }
    public function booking_inventory()
    {
        return view('new.booking_inventory');
    }
    public function campaign_report()
    {
        return view('new.campaign_report');
    }
    public function campaign_report_create()
    {
        return view('new.campaign_report_create');
    }
    public function campaign_report_preview()
    {
        return view('new.campaign_report_preview');
    }
    
    public function create_new_advertiser()
    {
        return view('new.create_new_advertiser');
    }
    public function forgot()
    {
        return view('new.forgot');
    }
    /*public function request_form()
    {
        return view('new.request_form');
    }*/
    
    public function revenue()
    {
        return view('new.revenue');
    }
    public function success()
    {
        return view('new.success');
    }
    public function success_ad_network()
    {
        return view('new.success_ad_network');
    }
    public function success_campaign()
    {
        return view('new.success_campaign');
    }
}
