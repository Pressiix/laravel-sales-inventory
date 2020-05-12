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
use App\Campaign;
use URL;
use Input;

class CampaignController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function campaign_report(Request $request)
    {
        $campaign = DB::connection('mysql')->select('select * from campaign'); // static method
        $campaign =json_decode(json_encode($campaign), True);
        $item=[];

        if(isset($request->start) && isset($request->end))
        {
            $start = date_format(date_create($request->start),"Y-m-d");
                $end = date_format(date_create($request->end),"Y-m-d");
                $format = 'Y-m-d';
                $interval = new DateInterval('P1D');
                $realEnd = new DateTime($end);
                $realEnd->add($interval);
                $date_period = new DatePeriod(new DateTime($start), $interval, $realEnd);
                       

                foreach($date_period as $date)
                { 
                    $month[] = date("m",strtotime($date->format($format)));
                    $day[] = date("d",strtotime($date->format($format)));
                }
                $month = array_unique($month);
                $day = array_unique($day);
            $i=0;
            foreach($campaign as $value)
            {
                $report_date = date_format(date_create($value['update_at']),$format);
                if(in_array(date("m",strtotime($report_date)),$month) && in_array(date("d",strtotime($report_date)),$day) )
                {
                    $item[$i]['id'] = $value['id'];
                    $item[$i]['report_date'] =  date_format(date_create($value['update_at']),"Y-m-d");
                    $item[$i]['report_date_time'] =  date_format(date_create($value['update_at']),"Y-m-d H:i:s");
                    $item[$i]['advertiser_name'] = json_decode($value['advertiser'],true)[key(json_decode($value['advertiser'],true))];
                    $item[$i]['report_type'] = "Inventory";//json_decode($value['advertiser'],true)[key(json_decode($value['advertiser'],true))];
                    $item[$i]['campaign_name'] = $value['campaign_name'];
                    $i++;
                }
            }
        }
        else
        {
            foreach($campaign as $key=>$value)
            {
                    $item[$key]['id'] = $value['id'];
                    $item[$key]['report_date'] =  date_format(date_create($value['update_at']),"Y-m-d");
                    $item[$key]['report_date_time'] =  date_format(date_create($value['update_at']),"Y-m-d H:i:s");
                    $item[$key]['advertiser_name'] = json_decode($value['advertiser'],true)[key(json_decode($value['advertiser'],true))];
                    $item[$key]['report_type'] = "Inventory";//json_decode($value['advertiser'],true)[key(json_decode($value['advertiser'],true))];
                    $item[$key]['campaign_name'] = $value['campaign_name'];
            }
        }
        $item = collect($item)->sortByDesc('report_date_time')->all();
        //echo "<pre/>";print_r($item);
        return view('new.campaign_report',[
            'item'=>$item
        ]);
    }
    
    public function campaign_report_create()
    {
        $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
        //echo "<pre/>";print_r($advertiser);
        return view('new.campaign_report_create',[
            'advertiser'=>$advertiser
        ]);
    }

    public function campaign_report_preview(Request $request)
    {
        //echo "<pre/>";print_r($request->all());
        return view('new.campaign_report_preview',[
            'item'=>$request->all()
        ]);
    }

    public function campaign_report_preview2($id)
    {
        //Get all row
        $campaign = DB::connection('mysql')->select('select * from campaign'); // static method
        $campaign =json_decode(json_encode($campaign), True);
        $i=0;
        $item=[];
        $item = $this->getCampaignDetail($campaign,$id);
        //echo "<pre/>";print_r($item);
        return view('new.campaign_report_preview',[
            'item'=>$item
        ]);
    }

    public function store_campaign(Request $request)
    {
        if($request->input('action') === 'Edit'){
            $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
            return view('new.campaign_report_create',[
                'item'=>$request->all(),
                'advertiser'=>$advertiser
            ]);
        }
        else if($request->input('action') === 'Confirm')
        {
            //echo "<pre/>";print_r($request->all());
            $report_type[$request->report_type_id] = $request->report_type_name;
            $advertiser[$request->advertiser_id] = $request->advertiser_name;

            $item = [
                'campaign_name'=>$request->campaign_name,
                'report_type'=>json_encode((object) $report_type),
                'advertiser'=>json_encode((object) $advertiser),
                'start'=>date_format(date_create($request->start),"Y-m-d"),
                'end'=>date_format(date_create($request->end),"Y-m-d"),
                'item_name'=>json_encode((object) $request->item_name),
                'date'=>json_encode((object) $request->date),
                'ad_server_impression'=>json_encode((object) $request->ad_server_impression),
                'ad_server_click'=>json_encode((object) $request->ad_server_click),
                'ad_server_ctr'=>json_encode((object) $request->ad_server_ctr),
                'update_at'=>date("Y-m-d H:i:s")
            ];

            if(isset($request->id))
            {
                $campaign = Campaign::where('id', $request->id)->update($item);
            }
            else
            {
                $campaign = Campaign::create($item);
            }
            //Insert campaign
            

            return Redirect::to('campaign_success');
        }
    }

    public function campaign_download($id)
    {
        $campaign = DB::connection('mysql')->select('select * from campaign'); // static method
        $campaign =json_decode(json_encode($campaign), True);
        $i=0;
        $item=[];
        $item = $this->getCampaignDetail($campaign,$id);
        //echo "<pre/>";print_r($item);
        return view('new.campaign_report_pdf',[
            'item'=>$item
        ]);
    }

    private function getCampaignDetail($campaign,$id)
    {
        $item=[];
        foreach($campaign as $key=>$value)
        {
            if($value['id'] == $id)
            {
                foreach($value as $key2=>$value2)
                {
                    if(!is_array(json_decode($value[$key2], True)))
                    {
                        $item[$key2] = $value[$key2];
                    }
                    else if(is_array(json_decode($value[$key2], True)) && count(json_decode($value[$key2], True)) === 1)
                    {
                        if($key2=='ad_server_impression' ||$key2=='ad_server_click' ||$key2=='ad_server_ctr' || $key2 == 'date' || $key2 == 'item_name')
                        {
                            $item[$key2][0] = json_decode($value[$key2], True)[key(json_decode($value[$key2], True))];
                        }
                        else{
                            if($key2 == 'report_type' || $key2 == 'advertiser')
                            {
                                $item[$key2."_name"] = json_decode($value[$key2], True)[key(json_decode($value[$key2], True))];
                                $item[$key2."_id"] = key(json_decode($value[$key2], True));
                            }
                            else{
                                $item[$key2] = json_decode($value[$key2], True)[key(json_decode($value[$key2], True))];
                            }
                        }
                    }
                    else
                    {
                        $item[$key2] = json_decode($value[$key2], True);
                    }
                }
                break;
            }
        }
        return $item;
    }

    public function campaign_success()
    {
        return view('new.success_campaign');
    }
}