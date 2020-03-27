<?php

namespace App\Http\Controllers;

use Encore\Admin\Actions\Interactor\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use DateTime;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Advertiser;
use App\Customer;
use App\RequestForm;
use App\AdDescription;
use URL;

class AppController extends Controller
{
    public function test()
    {
        
    }
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function request()
    {
        //if(auth()->user()->hasRole(['dev','sale','sale-management'])){
            $customer = array_column(json_decode(json_encode(Customer::all()), True),'customer_fullname','id');
            $advertiser = array_column(json_decode(json_encode(Advertiser::all()), True),'advertiser_fullname','id');
            $datos = file_get_contents(storage_path().'/jsondata/request-form.json');
            $data = json_decode($datos, true);
    
            //echo "<pre/>"; print_r(array_merge_recursive(['0' => 'Choose...'], $customer));
            return view('new.request_form',[
                'sales_name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                'customer' => $customer,
                'advertiser' => $advertiser,
                'sectionArray' => $data,
            ]);
        /*}
        else{
            return abort('403');
        }*/
        
    }

    public function review(Request $request)
    {
        if(strpos(URL::previous(),'request_form'))
        {
            
            //echo "<pre/>"; print_r($request->all());
            return view('new.request_preview',[
                'item' => $request->all(),
                'referer' => 'request_form'//$referer
            ]);
        }
        else{
            //$referer = "pending_list";
        }
        /*return view('new.request_preview',[
            'item' => $request->all(),
            'referer' => $referer
        ]);*/
         
    }

    public function storeRequest(Request $request)
    {
            if($request->input('action') === 'Edit')
            {
                $customer = array_column(json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True),'customer_fullname','id');
                $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
                $datos = file_get_contents(storage_path().'/jsondata/request-form.json');
                $data = json_decode($datos, true);
                $item = $request->all();

                return view('new.request_form', [
                    'action' => 'Edit',
                    'sales_name' =>$request->sales_name,
                    'customer' => $customer,
                    'advertiser' => $advertiser,
                    'item' => $item,
                    'sectionArray' => $data
                ]);
            }

            else if($request->input('action') === 'Submit')
            {
                //Save new request and ad description
                    $request_form = RequestForm::create([
                        'request_id' => '1',
                        'sales_name'=>$request->sales_name,
                        'sales_type'=>$request->sales_type,
                        'campaign_name'=>$request->campaign_name,
                        'status'=>'Waiting',
                        'create_at'=>date("Y-m-d h:i:s"),
                        'create_by'=>$request->sales_name,
                        'update_by'=>NULL,
                        'update_at'=>NULL,
                        'advertiser_id'=>$request->advertiser_id,
                        'customer_id'=>$request->customer_id
                    ]);
                    $request_form->relateAd()->create([
                        'bp_facebook' => $request->bp_facebook,
                        'bp_web' => json_encode((object) $request->bp_web),
                        'bp_size'=> json_encode((object) $request->bp_size_text),
                        'bp_position'=> json_encode((object) $request->bp_position_text),
                        'bp_section'=> json_encode((object) $request->bp_section_text),
                        'bp_period_from'=> json_encode((object) $request->bp_date_from),
                        'bp_period_to'=>json_encode((object) $request->bp_date_to),
                        'bp_device'=> json_encode((object) $request->bp_device),
                        'bp_url'=> json_encode((object) $request->bp_banner_url),
                        'bp_banner_file'=> json_encode((object) $request->bp_ad_desc_file),
                        'bp_quotation_file'=> json_encode((object) $request->bp_quotation),
                        'bp_impression'=> json_encode((object) $request->bp_impression_need),
                        'bp_detail'=> json_encode((object) $request->bp_ad_detail),
                        'bp_campaign_budget'=>$request->bp_campaign_budget,
                        'ptd_facebook' => $request->ptd_facebook,
                        'ptd_web' => json_encode((object) $request->ptd_web),
                        'ptd_size'=> json_encode((object) $request->ptd_size_text),
                        'ptd_position'=> json_encode((object) $request->ptd_position_text),
                        'ptd_section'=> json_encode((object) $request->ptd_section_text),
                        'ptd_period_from'=> json_encode((object) $request->ptd_date_from),
                        'ptd_period_to'=> json_encode((object) $request->ptd_date_to),
                        'ptd_device'=> json_encode((object) $request->ptd_device),
                        'ptd_url'=> json_encode((object) $request->ptd_banner_url),
                        'ptd_banner_file'=> json_encode((object) $request->ptd_ad_desc_file),
                        'ptd_quotation_file'=> json_encode((object) $request->ptd_quotation),
                        'ptd_impression'=> json_encode((object) $request->ptd_impression_need),
                        'ptd_detail'=> json_encode((object) $request->ptd_ad_detail),
                        'ptd_campaign_budget'=>$request->ptd_campaign_budget,
                    ]);
                //echo json_encode((object) $request->bp_web);
                //echo "<pre/>"; print_r($request->bp_web); echo "<pre/>";

                //Send email to ...
                //$this->sendEmail();
                
                return Redirect::to('request_form')->with('success','Request form created successfully!');
            }
            else if($request->input('action') === 'Approve')
            {
                //Update request status = Approve
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
        //echo "<pre/>"; print_r(compact('user'));
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
