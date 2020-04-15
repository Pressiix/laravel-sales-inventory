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
use App\AdNetwork;
use App\Campaign;
use URL;
use Input;

class AdNetworkController extends Controller
{

    public function test()
    {
        $pageview=[];
        $ad = json_decode(AdNetwork::all(),true);
        $index=0;
        $index2=0;
        $item=[];
        foreach($ad as $key=>$value)
        {
            foreach($value as $key2=>$value2)
            {
                if($key2 !== 'id' && $key2 !== 'start' && $key2 !== 'end'){
                    $ad[$index][$key2] = json_decode($value2,true);
                    if($key2 == 'page_view'){
                        foreach(json_decode($value2,true) as $value3)
                        {
                            $pageview[$index2] = $value3;
                            $index2++;
                        }
                    }
                }
            }
            $index++;
        }


        $pageview=array_values(array_unique($pageview));
        echo "<pre/>";print_r($ad);
    }
    public function ad_network(Request $request)
    {
        if(isset($request->month) && isset($request->year))
        {
            echo $request->month." ".$request->year;
        }
        else{
            return view('new.ad_network');
        }
    }
    public function ad_network_bymonth()
    {
        return view('new.ad_network_bymonth');
    }
    public function ad_network_preview(Request $request)
    {
        echo "<pre/>";print_r($request->all());
        return view('new.ad_network_preview',[
            'item' => $request->all()
        ]);
    }
    public function ad_network_create()
    {
        $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
        return view('new.ad_network_create',[
            'advertiser'=>$advertiser
        ]);
    }
    public function ad_network_store(Request $request)
    {
        if($request->input('action') === 'Edit')
        {
            $advertiser = array_column(json_decode(json_encode(DB::connection('mysql')->table('advertiser')->get()), True),'advertiser_fullname','id');
            return view('new.ad_network_create',[
                'item' => $request->all(),
                'advertiser'=>$advertiser
            ]);
        }else if($request->input('action') === 'Submit'){
            ///
            $item = $request->all();
            for($i=0;$i<count($item['pageview']);$i++)
            {
                $item['advertiser'][$i] = (isset($item['new_advertiser'][$i]) ? $item['new_advertiser'][$i] : $item['advertiser_name'][$i]);
                if(isset($item['advertiser_id'][$i]))
                {
                    unset($item['advertiser_id'][$i]);
                    unset($item['advertiser_name'][$i]);
                }
                else{
                    unset($item['new_advertiser'][$i]);
                }
            }
            unset($item['advertiser_id']);
            unset($item['advertiser_name']);
            unset($item['new_advertiser']);
            //echo "<pre/>";print_r($item);
            $ad_network = AdNetwork::create([
                'start'=>date_format(date_create($item['start']),"Y-m-d H:i:s"),
                'end'=>date_format(date_create($item['end']),"Y-m-d H:i:s"),
                'page_view'=>json_encode((object) $item['pageview']),
                'advertiser'=> json_encode((object) $item['advertiser']),
                'impression'=>json_encode((object) $item['impression']),
                'ecpm'=>json_encode((object) $item['ecpm']),
                'revenue'=>json_encode((object) $item['revenue'])
            ]);

            return view('new.success_ad_network');
        }
    }
}