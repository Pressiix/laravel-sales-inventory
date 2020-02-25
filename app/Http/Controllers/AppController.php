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
        $customer = json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True);
        echo "<pre/>";print_r($customer );
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
        
            return view('request.form',[
                'sales_name' => auth()->user()->name,
                'customer' => $customer,
                'advertiser' => $advertiser
                ]);
        }
        else{
            if($sales_name)
            {
                return view('request.form', [
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
       /* $size = $request->size;
        $position = $request->position;
        $section = $request->section;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        echo "Size<pre/>"; print_r($size);echo "<pre/>";
        echo "Position<pre/>"; print_r($position);echo "<pre/>";
        echo "Section<pre/>"; print_r($section);echo "<pre/>";
        echo "Date From<pre/>"; print_r($date_from);echo "<pre/>";
        echo "Date To<pre/>"; print_r($date_to);echo "<pre/>";*/
         return view('request.review',[
            'sales_name' => $request->sales_name,
            'sales_type' => $request->sales_type,
            'customer_id' => $request->customer_id,
            'customer_name' => $request->customer_name,
            'advertiser_id' => $request->advertiser_id,
            'advertiser_name' => $request->advertiser_name,
            'campaign_name' => $request->campaign_name,
            'website' => $request->website,
            'type1' => $request->type1,
            'facebook' => $request->facebook,
            'facebook_type' => $request->facebook_type,
            'size' => $request->size,
            'position' => $request->position,
            'section' => $request->section,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'banner_url' => $request->banner_url,
            'create_at' => $request->create_at,
            'campaign_budget' => $request->campaign_budget
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
    
}
