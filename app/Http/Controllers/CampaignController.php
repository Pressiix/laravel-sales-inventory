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

class CampaignController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function campaign_report()
    {
        return view('new.campaign_report');
    }
    
    public function campaign_report_create()
    {
        return view('new.campaign_report_create');
    }

    public function campaign_report_preview(Request $request)
    {
        //echo "<pre/>";print_r($request->all());
        return view('new.campaign_report_preview',[
            'item'=>$request->all()
        ]);
    }

    public function store_campaign(Request $request)
    {
        if($request->input('action') === 'Edit'){
            //echo "<pre/>";print_r($request->all());
            return view('new.campaign_report_create',[
                'item'=>$request->all()
            ]);
        }
        else if($request->input('action') === 'Confirm')
        {
            //Insert campaign
            $campaign = Campaign::create([
                ///
            ]);
            
            return view('new.success_campaign');
        }
        
    }
}