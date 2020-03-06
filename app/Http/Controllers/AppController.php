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
        return view('new.profile3');
    }
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function request(Request $request)
    {
        if(isset($request)){
            $user = compact(Auth::user());
            $customer = array_column(json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True),'customer_fullname','id');
            $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_name','id');
            
            return view('new.request_form',[
                'sales_name' => auth()->user()->name,
                'customer' => $customer,
                'advertiser' => $advertiser
                ]);
        }
        else{
            if($sales_name)
            {
                return view('new.request_form', [
                    'sales_name' => $sales_name,
                    'sales_type' => $sales_type,
                    'customer_name' => $customer_name,
                    'campaign_name' => $campaign_name,
                    'facebook' => $facebook,
                    'facebook_type' => $facebook_type,
                    'create_at' => $create_at,
                    'campaign_budget' => $campaign_budget
                ]);
            }
        }
        
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
            //echo "<pre/>";print_r($request->size);
            $customer = array_column(json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True),'customer_fullname','id');
            $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_name','id');

            return view('request.form', [
                'sales_name' => $request->sales_name,
                'sales_type' => $request->sales_type,
                'customer_id' => $request->customer_id,
                'customer_name' => $request->customer_name,
                'campaign_name' => $request->campaign_name,
                'advertiser_id' => $request->advertiser_id,
                'advertiser_name' => $request->advertiser_name,
                'website' => $request->website,
                'type1' => $request->type1,
                'facebook' => $request->facebook,
                'facebook_type' => $request->facebook_type,
                'create_at' => $request->create_at,
                'campaign_budget' => $request->campaign_budget,
                'customer' => $customer,
                'advertiser' => $advertiser,
                'size' => $request->size,
                'position' => $request->position,
                'section' => $request->section,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'banner_url' => $request->banner_url,
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
            
            return Redirect::to('request-form');
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
        $someModel = DB::connection('mysql')->select('select * from request'); // static method
        $user = Auth::user();
        return view('my-activity',[
            'someModel' => json_decode(json_encode($someModel), True)
        ],compact('user'));
        /*if($request->from && $request->to)
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
        }*/
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
    public function create_new_customer()
    {
        return view('new.create_new_customer');
    }
    public function forgot()
    {
        return view('new.forgot');
    }
    /*public function request_form()
    {
        return view('new.request_form');
    }*/
    public function request_preview()
    {
        return view('new.request_preview');
    }
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
