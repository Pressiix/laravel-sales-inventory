<?php

namespace App\Http\Controllers;

use Encore\Admin\Actions\Interactor\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use DateTime;
use DatePeriod;
use DateInterval;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Advertiser;
use App\Customer;
use App\RequestForm;
use App\AdDescription;
use URL;
use Input;
use NotificationHelper;
use Illuminate\Support\Facades\Log;

class RequestFormController extends Controller
{
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

            //echo "<pre/>";print_r($data);
            return view('new.request_form',[
                'sales_name' => auth()->user()->firstname.' '.auth()->user()->lastname,
                'customer' => $customer,
                'advertiser' => $advertiser,
                'sectionArray' => $data,
            ]);
    }

    public function review(Request $request)
    {
        if(auth()->user()->hasRole('sale-management'))
        {
            $userRole = 'sale-management';
        }
        else if(auth()->user()->hasRole('sale')){
            $userRole = 'sale';
        }
        else if(auth()->user()->hasRole('admin')){
            $userRole = 'admin';
        }else{
            $userRole = '';
        }

        //$item = $request->all();
        //echo "<pre/>"; print_r($request->all());

        /********************************** */
        $i=0;
        $bp_banner_file=[];
        $bp_quotation_file=[];
        $ptd_banner_file=[];
        $ptd_quotation_file=[];
        if(isset($request->old_bp_banner_file)){   //EDIT REQUEST FORM
                if(isset($request->bp_banner_file)){
                    if(count($request->old_bp_banner_file) == count($request->bp_banner_file))
                    {
                        foreach($request->old_bp_banner_file as $banner){
                                \File::delete(public_path().'/storage/files/'.$banner);
                                \Storage::disk('storage')->put('public/files/', $request->file('bp_banner_file')[$i]);
                                $bp_banner_file[$i] = $request->file('bp_banner_file')[$i]->hashName();
                                $i++;
                        }

                    }else{
                        foreach($request->old_bp_banner_file as $banner){
                            if(isset($request->bp_banner_file[$i])){
                                if($banner !== $request->bp_banner_file[$i])
                                {
                                    \File::delete(public_path().'/storage/files/'.$banner);
                                }
                                \Storage::disk('storage')->put('public/files/', $request->file('bp_banner_file')[$i]);
                                $bp_banner_file[$i] = $request->file('bp_banner_file')[$i]->hashName();
                            }
                            else{
                                $bp_banner_file[$i] = $banner;
                            }
                            $i++;
                        }

                    }
                    $i=0;
                }else{
                    foreach($request->old_bp_banner_file as $banner){
                        $bp_banner_file[$i] = $banner;
                        $i++;
                    }$i=0;

                }
        }
        else{  //NEW REQUEST FORM
            if(isset($request->bp_banner_file)){
                foreach($request->file('bp_banner_file') as $banner){
                    \Storage::disk('storage')->put('public/files/', $banner);
                    $bp_banner_file[$i] = $banner->hashName();
                    $i++;
                }
                $i=0;

            }
        }

        if(isset($request->old_bp_quotation_file)){   //EDIT REQUEST FORM
                if(isset($request->bp_quotation_file)){
                    if(count($request->old_bp_quotation_file) == count($request->bp_quotation_file))
                    {
                        foreach($request->old_bp_quotation_file as $quotation){
                                \File::delete(public_path().'/storage/files/'.$quotation);
                                \Storage::disk('storage')->put('public/files/', $request->file('bp_quotation_file')[$i]);
                                $bp_quotation_file[$i] = $request->file('bp_quotation_file')[$i]->hashName();
                                $i++;
                        }
                        //echo 'A';
                    }else{
                        foreach($request->old_bp_quotation_file as $quotation){
                            if(isset($request->bp_quotation_file[$i])){
                                if($quotation !== $request->bp_quotation_file[$i])
                                {
                                    \File::delete(public_path().'/storage/files/'.$quotation);
                                }
                                \Storage::disk('storage')->put('public/files/', $request->file('bp_quotation_file')[$i]);
                                $bp_quotation_file[$i] = $request->file('bp_quotation_file')[$i]->hashName();
                            }
                            else{
                                $bp_quotation_file[$i] = $quotation;
                            }
                            $i++;
                        }
                        //echo 'B';
                    }
                    $i=0;
                }else{
                    foreach($request->old_bp_quotation_file as $quotation){
                        $bp_quotation_file[$i] = $quotation;
                        $i++;
                    }$i=0;
                    //echo 'C';
                }
        }
        else{  //NEW REQUEST FORM
            if(isset($request->bp_quotation_file)){
                foreach($request->file('bp_quotation_file') as $quotation){
                    \Storage::disk('storage')->put('public/files/', $quotation);
                    $bp_quotation_file[$i] = $quotation->hashName();
                    $i++;
                }
                $i=0;
                //echo 'D';
            }
        }

        if(isset($request->old_ptd_banner_file)){   //EDIT REQUEST FORM
                if(isset($request->ptd_banner_file)){
                    if(count($request->old_ptd_banner_file) == count($request->ptd_banner_file))
                    {
                        foreach($request->old_ptd_banner_file as $banner){
                                \File::delete(public_path().'/storage/files/'.$banner);
                                \Storage::disk('storage')->put('public/files/', $request->file('ptd_banner_file')[$i]);
                                $ptd_banner_file[$i] = $request->file('ptd_banner_file')[$i]->hashName();
                                $i++;
                        }
                        //echo 'A';
                    }else{
                        foreach($request->old_ptd_banner_file as $banner){
                            if(isset($request->ptd_banner_file[$i])){
                                if($banner !== $request->ptd_banner_file[$i])
                                {
                                    \File::delete(public_path().'/storage/files/'.$banner);
                                }
                                \Storage::disk('storage')->put('public/files/', $request->file('ptd_banner_file')[$i]);
                                $ptd_banner_file[$i] = $request->file('ptd_banner_file')[$i]->hashName();
                            }
                            else{
                                $ptd_banner_file[$i] = $banner;
                            }
                            $i++;
                        }
                        //echo 'B';
                    }
                    $i=0;
                }else{
                    foreach($request->old_ptd_banner_file as $banner){
                        $ptd_banner_file[$i] = $banner;
                        $i++;
                    }$i=0;
                    //echo 'C';
                }
        }
        else{  //NEW REQUEST FORM
            if(isset($request->ptd_banner_file)){
                foreach($request->file('ptd_banner_file') as $banner){
                    \Storage::disk('storage')->put('public/files/', $banner);
                    $ptd_banner_file[$i] = $banner->hashName();
                    $i++;
                }
                $i=0;
                //echo 'D';
            }
        }

        if(isset($request->old_ptd_quotation_file)){   //EDIT REQUEST FORM
                if(isset($request->ptd_quotation_file)){
                    if(count($request->old_ptd_quotation_file) == count($request->ptd_quotation_file))
                    {
                        foreach($request->old_ptd_quotation_file as $quotation){
                                \File::delete(public_path().'/storage/files/'.$quotation);
                                \Storage::disk('storage')->put('public/files/', $request->file('ptd_quotation_file')[$i]);
                                $ptd_quotation_file[$i] = $request->file('ptd_quotation_file')[$i]->hashName();
                                $i++;
                        }
                        //echo 'A';
                    }else{
                        foreach($request->old_ptd_quotation_file as $quotation){
                            if(isset($request->ptd_quotation_file[$i])){
                                if($quotation !== $request->ptd_quotation_file[$i])
                                {
                                    \File::delete(public_path().'/storage/files/'.$quotation);
                                }
                                \Storage::disk('storage')->put('public/files/', $request->file('ptd_quotation_file')[$i]);
                                $ptd_quotation_file[$i] = $request->file('ptd_quotation_file')[$i]->hashName();
                            }
                            else{
                                $ptd_quotation_file[$i] = $quotation;
                            }
                            $i++;
                        }
                        //echo 'B';
                    }
                    $i=0;
                }else{
                    foreach($request->old_ptd_quotation_file as $quotation){
                        $ptd_quotation_file[$i] = $quotation;
                        $i++;
                    }$i=0;
                    //echo 'C';
                }
        }
        else{  //NEW REQUEST FORM
            if(isset($request->ptd_quotation_file)){
                foreach($request->file('ptd_quotation_file') as $quotation){
                    \Storage::disk('storage')->put('public/files/', $quotation);
                    $ptd_quotation_file[$i] = $quotation->hashName();
                    $i++;
                }
                $i=0;
                //echo 'D';
            }
        }

        $item = $request->all();
        $item['bp_banner_file'] = $bp_banner_file;
        $item['bp_quotation_file'] = $bp_quotation_file;
        $item['ptd_banner_file'] = $ptd_banner_file;
        $item['ptd_quotation_file'] = $ptd_quotation_file;
        //CHECK POST VARIABLE
        //echo "<pre/>"; print_r($request->all());

        if(isset($request->request_id))
        {
            $request_id = $request->request_id;
        }
        else    //When Sale type create a request form
        {
            $request_id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
        }

        return view('new.request_preview',[
            'request_id'=>$request_id,
            'previous_url' => url()->previous(),
            'item' => $item,
            'userRole' => $userRole
        ]);

    }



    public function review2($id)
    {
        $request_form = RequestForm::find($id);
        if(is_null($request_form))
        {
            \Redirect::to('/profile3')->with('error','Cannot read a file');
        }
        $request_form = $request_form->getOriginal();
        $ad_desc = AdDescription::where('request_id',$id)->first()->getOriginal();
        $new_ad_desc['ad_desc_id'] = $ad_desc['id'];
        $ad_desc = array_slice($ad_desc, 1, -1);
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

        if(auth()->user()->hasRole('sale-management'))
        {
            $userRole = 'sale-management';
        }
        else if(auth()->user()->hasRole('sale')){
            $userRole = 'sale';
        }
        else if(auth()->user()->hasRole('admin')){
            $userRole = 'admin';
        }else{
            $userRole = '';
        }

        $item = array_merge($request_form,$new_ad_desc);
        //echo "<pre/>"; print_r($item); echo "<pre/>";
        return view('new.request_preview',[
            'sales_name'=>$item['sales_name'],
            'previous_url' => url()->previous(),
            'item' => $item,
            'userRole' => $userRole
        ]);

    }

    public function storeRequest(Request $request)
    {
            if($request->input('action') === 'Edit')
            {
                //echo 'aaa';
                $customer = array_column(json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True),'customer_fullname','id');
                $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
                $datos = file_get_contents(storage_path().'/jsondata/request-form.json');
                $data = json_decode($datos, true);
                $item = $request->all();
                //echo "<pre/>"; print_r($item);
                return view('new.request_form', [
                    'action' => 'Edit',
                    'request_id' => $request->request_id,
                    'sales_name' =>$request->sales_name,
                    'customer' => $customer,
                    'advertiser' => $advertiser,
                    'item' => $item,
                    'sectionArray' => $data
                ]);
            }

            else if($request->input('action') === 'Submit')
            {
                $get_request = RequestForm::where('request_id', $request->request_id)->first();
                if(!is_null($get_request)){
                    //DELETE BEFORE SAVE
                    AdDescription::where('request_id',RequestForm::where('request_id', $request->request_id)->first()->getOriginal()['id'] )->delete();
                    RequestForm::where('request_id', $request->request_id)->delete();
                }               

                $request_id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 9);
                //Save new request and ad description
                    $request_form = RequestForm::create([
                        'request_id' => $request_id,
                        'sales_name'=>$request->sales_name,
                        'sales_type'=>$request->sales_type,
                        'campaign_name'=>$request->campaign_name,
                        'status'=> 'Waiting',
                        'create_at'=>date("Y-m-d H:i:s"),
                        'update_by'=>$request->sales_name,
                        'update_at'=>date("Y-m-d H:i:s"),
                        'advertiser_id'=>$request->advertiser_id,
                        'customer_id'=>$request->customer_id
                    ]);
                    $request_form->relateAd()->create([
                        'bp_type' => (isset($request->bp_type) ? json_encode((object) $request->bp_type) : json_encode((object) array(NULL)) ),
                        'bp_social' => (isset($request->bp_social) ? json_encode((object) $request->bp_social) : json_encode((object) array(NULL)) ),
                        'bp_facebook' => (isset($request->bp_facebook) ? json_encode((object) $request->bp_facebook) : json_encode((object) array(NULL)) ),
                        'bp_web' => (isset($request->bp_web) ? json_encode((object) $request->bp_web) : json_encode((object) array(NULL)) ),
                        'bp_size'=> (isset($request->bp_size_id) ? json_encode((object) array_combine( $request->bp_size_id , $request->bp_size_text )) : json_encode((object) array(NULL)) ),
                        'bp_position'=> (isset($request->bp_position_id) ? json_encode((object) array_combine( array_keys($request->bp_position_id) , $request->bp_position_text )) : json_encode((object) array(NULL)) ),
                        'bp_section'=> (isset($request->bp_section_id) ? json_encode((object) array_combine( array_keys($request->bp_section_id) , $request->bp_section_text )) : json_encode((object) array(NULL)) ),
                        'bp_period_from'=> (isset($request->bp_period_from) ? json_encode((object) $request->bp_period_from) : json_encode((object) array(NULL)) ),
                        'bp_period_to'=> (isset($request->bp_period_to) ? json_encode((object) $request->bp_period_to) : json_encode((object) array(NULL)) ),
                        'bp_device'=> (isset($request->bp_device) ? json_encode((object) $request->bp_device) : json_encode((object) array(NULL)) ),
                        'bp_banner_url'=> (isset($request->bp_banner_url) ? json_encode((object) $request->bp_banner_url) : json_encode((object) array(NULL)) ),
                        'bp_banner_file'=> (isset($request->bp_banner_file) ? json_encode((object) $request->bp_banner_file) : json_encode((object) array(NULL)) ),
                        'bp_quotation_file'=> (isset($request->bp_quotation_file) ? json_encode((object) $request->bp_quotation_file) : json_encode((object) array(NULL)) ),
                        'bp_impression_need'=> (isset($request->bp_impression_need) ? json_encode((object) $request->bp_impression_need) : json_encode((object) array(NULL)) ),
                        'bp_ad_detail'=> (isset($request->bp_ad_detail) ? json_encode((object) $request->bp_ad_detail) : json_encode((object) array(NULL)) ),
                        'bp_campaign_budget'=>(isset($request->bp_campaign_budget) ? $request->bp_campaign_budget : NULL),
                        'ptd_type' => (isset($request->ptd_type) ? json_encode((object) $request->ptd_type) : json_encode((object) array(NULL)) ),
                        'ptd_social' => (isset($request->ptd_social) ? json_encode((object) $request->ptd_social) : json_encode((object) array(NULL)) ),
                        'ptd_facebook' => (isset($request->ptd_facebook) ? json_encode((object) $request->ptd_facebook) : json_encode((object) array(NULL)) ),
                        'ptd_web' => (isset($request->ptd_web) ? json_encode((object) $request->ptd_web) : json_encode((object) array(NULL)) ),
                        'ptd_size'=> (isset($request->ptd_size_id) ? json_encode((object) array_combine( $request->ptd_size_id , $request->ptd_size_text )) : json_encode((object) array(NULL)) ),
                        'ptd_position'=> (isset($request->ptd_position_id) ? json_encode((object) array_combine( array_keys($request->ptd_position_id) , $request->ptd_position_text )) : json_encode((object) array(NULL)) ),
                        'ptd_section'=> (isset($request->ptd_section_id) ? json_encode((object) array_combine( array_keys($request->ptd_section_id) , $request->ptd_section_text )) : json_encode((object) array(NULL)) ),
                        'ptd_period_from'=> (isset($request->ptd_period_from) ? json_encode((object) $request->ptd_period_from) : json_encode((object) array(NULL)) ),
                        'ptd_period_to'=> (isset($request->ptd_period_to) ? json_encode((object) $request->ptd_period_to) : json_encode((object) array(NULL)) ),
                        'ptd_device'=> (isset($request->ptd_device) ? json_encode((object) $request->ptd_device) : json_encode((object) array(NULL)) ),
                        'ptd_banner_url'=> (isset($request->ptd_banner_url) ? json_encode((object) $request->ptd_banner_url) : json_encode((object) array(NULL)) ),
                        'ptd_banner_file'=> (isset($request->ptd_banner_file) ? json_encode((object) $request->ptd_banner_file) : json_encode((object) array(NULL)) ),
                        'ptd_quotation_file'=> (isset($request->ptd_quotation_file) ? json_encode((object) $request->ptd_quotation_file) : json_encode((object) array(NULL)) ),
                        'ptd_impression_need'=> (isset($request->ptd_impression_need) ? json_encode((object) $request->ptd_impression_need) : json_encode((object) array(NULL)) ),
                        'ptd_ad_detail'=> (isset($request->ptd_ad_detail) ? json_encode((object) $request->ptd_ad_detail) : json_encode((object) array(NULL)) ),
                        'ptd_campaign_budget'=>(isset($request->ptd_campaign_budget) ? $request->ptd_campaign_budget : NULL),
                    ]);

                    //echo "<pre/>"; print_r($b); echo "<pre/>";

                //Send email to ...
                NotificationHelper::sendNotificationEmail();

                return view('new.success_request_submit');
            }
            else if($request->input('action') === 'Approve')
            {
                //echo "<pre/>";print_r($request->all());
                //Update request status = Approve
                $request_update = RequestForm::where('id', $request->id)
                ->update([
                    'sales_name'=>$request->sales_name,
                    'sales_type'=>$request->sales_type,
                    'campaign_name'=>$request->campaign_name,
                    'status'=> 'Approve',
                    'update_by'=>auth()->user()->firstname.' '.auth()->user()->lastname,
                    'update_at'=>date("Y-m-d H:i:s"),
                    'advertiser_id'=>$request->advertiser_id,
                    'customer_id'=>$request->customer_id
                ]);

                $ad_desc_update = AdDescription::where('request_id', $request->id)
                ->update([
                    'bp_type' => (isset($request->bp_type) ? json_encode((object) $request->bp_type) : json_encode((object) array(NULL)) ),
                        'bp_social' => (isset($request->bp_social) ? json_encode((object) $request->bp_social) : json_encode((object) array(NULL)) ),
                        'bp_facebook' => (isset($request->bp_facebook) ? json_encode((object) $request->bp_facebook) : json_encode((object) array(NULL)) ),
                        'bp_web' => (isset($request->bp_web) ? json_encode((object) $request->bp_web) : json_encode((object) array(NULL)) ),
                        'bp_size'=> (isset($request->bp_size_id) ? json_encode((object) array_combine( $request->bp_size_id , $request->bp_size_text )) : json_encode((object) array(NULL)) ),
                        'bp_position'=> (isset($request->bp_position_id) ? json_encode((object) array_combine( array_keys($request->bp_position_id) , $request->bp_position_text )) : json_encode((object) array(NULL)) ),
                        'bp_section'=> (isset($request->bp_section_id) ? json_encode((object) array_combine( array_keys($request->bp_section_id) , $request->bp_section_text )) : json_encode((object) array(NULL)) ),
                        'bp_period_from'=> (isset($request->bp_period_from) ? json_encode((object) $request->bp_period_from) : json_encode((object) array(NULL)) ),
                        'bp_period_to'=> (isset($request->bp_period_to) ? json_encode((object) $request->bp_period_to) : json_encode((object) array(NULL)) ),
                        'bp_device'=> (isset($request->bp_device) ? json_encode((object) $request->bp_device) : json_encode((object) array(NULL)) ),
                        'bp_banner_url'=> (isset($request->bp_banner_url) ? json_encode((object) $request->bp_banner_url) : json_encode((object) array(NULL)) ),
                        'bp_banner_file'=> (isset($request->bp_banner_file) ? json_encode((object) $request->bp_banner_file) : json_encode((object) array(NULL)) ),
                        'bp_quotation_file'=> (isset($request->bp_quotation_file) ? json_encode((object) $request->bp_quotation_file) : json_encode((object) array(NULL)) ),
                        'bp_impression_need'=> (isset($request->bp_impression_need) ? json_encode((object) $request->bp_impression_need) : json_encode((object) array(NULL)) ),
                        'bp_ad_detail'=> (isset($request->bp_ad_detail) ? json_encode((object) $request->bp_ad_detail) : json_encode((object) array(NULL)) ),
                        'bp_campaign_budget'=>(isset($request->bp_campaign_budget) ? $request->bp_campaign_budget : NULL),
                        'ptd_type' => (isset($request->ptd_type) ? json_encode((object) $request->ptd_type) : json_encode((object) array(NULL)) ),
                        'ptd_social' => (isset($request->ptd_social) ? json_encode((object) $request->ptd_social) : json_encode((object) array(NULL)) ),
                        'ptd_facebook' => (isset($request->ptd_facebook) ? json_encode((object) $request->ptd_facebook) : json_encode((object) array(NULL)) ),
                        'ptd_web' => (isset($request->ptd_web) ? json_encode((object) $request->ptd_web) : json_encode((object) array(NULL)) ),
                        'ptd_size'=> (isset($request->ptd_size_id) ? json_encode((object) array_combine( $request->ptd_size_id , $request->ptd_size_text )) : json_encode((object) array(NULL)) ),
                        'ptd_position'=> (isset($request->ptd_position_id) ? json_encode((object) array_combine( array_keys($request->ptd_position_id) , $request->ptd_position_text )) : json_encode((object) array(NULL)) ),
                        'ptd_section'=> (isset($request->ptd_section_id) ? json_encode((object) array_combine( array_keys($request->ptd_section_id) , $request->ptd_section_text )) : json_encode((object) array(NULL)) ),
                        'ptd_period_from'=> (isset($request->ptd_period_from) ? json_encode((object) $request->ptd_period_from) : json_encode((object) array(NULL)) ),
                        'ptd_period_to'=> (isset($request->ptd_period_to) ? json_encode((object) $request->ptd_period_to) : json_encode((object) array(NULL)) ),
                        'ptd_device'=> (isset($request->ptd_device) ? json_encode((object) $request->ptd_device) : json_encode((object) array(NULL)) ),
                        'ptd_banner_url'=> (isset($request->ptd_banner_url) ? json_encode((object) $request->ptd_banner_url) : json_encode((object) array(NULL)) ),
                        'ptd_banner_file'=> (isset($request->ptd_banner_file) ? json_encode((object) $request->ptd_banner_file) : json_encode((object) array(NULL)) ),
                        'ptd_quotation_file'=> (isset($request->ptd_quotation_file) ? json_encode((object) $request->ptd_quotation_file) : json_encode((object) array(NULL)) ),
                        'ptd_impression_need'=> (isset($request->ptd_impression_need) ? json_encode((object) $request->ptd_impression_need) : json_encode((object) array(NULL)) ),
                        'ptd_ad_detail'=> (isset($request->ptd_ad_detail) ? json_encode((object) $request->ptd_ad_detail) : json_encode((object) array(NULL)) ),
                        'ptd_campaign_budget'=>(isset($request->ptd_campaign_budget) ? $request->ptd_campaign_budget : NULL),
                ]);

                return view('new.success_request_approve');
            }
    }


    public function success()
    {
        return view('new.success');
    }

    public function GetApproveRequest()
    {
        $data_temp = [];
        $data = [];
        $r_keys = [];
        $request = (array) RequestForm::where('status','Approve')->get();
        $request = $request[array_keys($request)[0]];
        foreach($request as $item)
        {
             array_push($r_keys,$item['id']);
        }
        $ad_desc = (array) AdDescription::whereIn('request_id', $r_keys)->get();
        $ad_desc = $ad_desc[array_keys($ad_desc)[0]];

        foreach($request as $key=>$item)
        {
            $data_temp['request_item'][$key] = $item->getOriginal();
            $data_temp['ad_item'][$key] = $ad_desc[$key]->getOriginal();
        }

        foreach($data_temp['request_item'] as $key=>$item)
        {
            foreach($data_temp['ad_item'] as $key2=>$item2)
            {
                if(isset($data_temp['request_item'][$key]['matching']))
                {
                    break;
                }else{
                    if($item['id'] == $item2['request_id'])
                    {
                        unset($item2['id']);
                        $data[$key] = array_merge($item,$item2);
                        unset($data[$key]['id']);
                        $data_temp['request_item'][$key]['matching'] = 1;
                    }
                }
            }
        }
         echo "<pre/>"; print_r($data);
    }

    public static function test()
    {
        echo URL::to('/');
    }
}
