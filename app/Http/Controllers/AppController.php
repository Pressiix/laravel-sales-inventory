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
        
            $customer = array_column(json_decode(json_encode(Customer::all()), True),'customer_fullname','id');
            $advertiser = array_column(json_decode(json_encode(Advertiser::all()), True),'advertiser_fullname','id');
            $datos = file_get_contents(storage_path().'/jsondata/request-form.json');
            $data = json_decode($datos, true);
    
            return view('new.request_form',[
                'sales_name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                'customer' => $customer,
                'advertiser' => $advertiser,
                'sectionArray' => $data,
            ]);
        
    }

    public function review(Request $request)
    {
        if(strpos(URL::previous(),'request_form'))
        {
            $item = $request->all();
            $referer = 'request_form';
            //echo "<pre/>"; print_r($item);
            
        }

        return view('new.request_preview',[
            'item' => $request->all(),
            'referer' => $referer
        ]);
         
    }

    public function review2($id)
    {
        $request_form = RequestForm::find($id)->getOriginal();
        $ad_desc = array_slice(AdDescription::where('request_id',$id)->first()->getOriginal(), 1, -1);
        $request_form['customer_name'] = Customer::where('id',$request_form['customer_id'])->first()->getOriginal()['customer_fullname'];
        $request_form['advertiser_name'] = Advertiser::where('id',$request_form['advertiser_id'])->first()->getOriginal()['advertiser_fullname'];
        $request_form['total_bp_web'] = 9;
        $request_form['total_ptd_web'] = 9;
        foreach($ad_desc as $key=>$value)
        {
            $i=0;
            $key_check = (strpos($key,'_size') ? true : (strpos($key,'_position') ? true : (strpos($key,'_section') ? true : false ) ) );
            if($key_check){
                foreach(json_decode($value,true) as $key2=>$value2)
                {
                    $new_ad_desc[$key.'_id'][$i] = $key2;
                    $new_ad_desc[$key.'_text'][$i] = $value2;
                    $i++;
                }
            }
            else{
                $new_ad_desc[$key] = (is_array(json_decode($value,true)) ? json_decode($value,true) : ($value == '' ? '' : $value));
            }
        }

        $item = array_merge($request_form,$new_ad_desc);
        //echo "<pre/>"; print_r($item);
        return view('new.request_preview',[
            'item' => $item,
            'referer' => 'profile2'
        ]);
        
    }

    public function storeRequest(Request $request)
    {
            if($request->input('action') === 'Edit')
            {
               // echo "<pre/>"; print_r($request->all());
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
                        'sales_name'=>$request->sales_name,
                        'sales_type'=>$request->sales_type,
                        'campaign_name'=>$request->campaign_name,
                        'status'=>'Waiting',
                        'create_at'=>date("Y-m-d H:i:s"),
                        'create_by'=>$request->sales_name,
                        'update_by'=>$request->sales_name,
                        'update_at'=>date("Y-m-d H:i:s"),
                        'advertiser_id'=>$request->advertiser_id,
                        'customer_id'=>$request->customer_id
                    ]);
                    $request_form->relateAd()->create([
                        'bp_facebook' => $request->bp_facebook,
                        'bp_web' => json_encode((object) $request->bp_web),
                        'bp_size'=> json_encode((object) array_combine( $request->bp_size_id , $request->bp_size_text )),
                        'bp_position'=> json_encode((object) array_combine( $request->bp_position_id , $request->bp_position_text )),
                        'bp_section'=> json_encode((object) array_combine( $request->bp_section_id , $request->bp_section_text )),
                        'bp_period_from'=> json_encode((object) $request->bp_period_from),
                        'bp_period_to'=>json_encode((object) $request->bp_period_to),
                        'bp_device'=> json_encode((object) $request->bp_device),
                        'bp_banner_url'=> json_encode((object) $request->bp_banner_url),
                        'bp_banner_file'=> json_encode((object) $request->bp_banner_file),
                        'bp_quotation_file'=> json_encode((object) $request->bp_quotation_file),
                        'bp_impression_need'=> json_encode((object) $request->bp_impression_need),
                        'bp_ad_detail'=> json_encode((object) $request->bp_ad_detail),
                        'bp_campaign_budget'=>$request->bp_campaign_budget,
                        'ptd_facebook' => $request->ptd_facebook,
                        'ptd_web' => json_encode((object) $request->ptd_web),
                        'ptd_size'=> json_encode((object) array_combine( $request->ptd_size_id , $request->ptd_size_text )),
                        'ptd_position'=> json_encode((object) array_combine( $request->ptd_position_id , $request->ptd_position_text )),
                        'ptd_section'=> json_encode((object) array_combine( $request->ptd_section_id , $request->ptd_section_text )),
                        'ptd_period_from'=> json_encode((object) $request->ptd_period_from),
                        'ptd_period_to'=> json_encode((object) $request->ptd_period_to),
                        'ptd_device'=> json_encode((object) $request->ptd_device),
                        'ptd_banner_url'=> json_encode((object) $request->ptd_banner_url),
                        'ptd_banner_file'=> json_encode((object) $request->ptd_banner_file),
                        'ptd_quotation_file'=> json_encode((object) $request->ptd_quotation_file),
                        'ptd_impression_need'=> json_encode((object) $request->ptd_impression_need),
                        'ptd_ad_detail'=> json_encode((object) $request->ptd_ad_detail),
                        'ptd_campaign_budget'=>$request->ptd_campaign_budget,
                    ]);
                //echo json_encode((object) $request->bp_web);
                //echo "<pre/>"; print_r($request->all()); echo "<pre/>";

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
        //print_r(json_decode(json_encode($someModel), True));
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
