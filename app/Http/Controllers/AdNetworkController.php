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
            $current_month =  date_format(date_create(now()->toDateTimeString()),"m");
            $last_month =  date('m', strtotime('-1 month', strtotime(date_format(date_create(now()->toDateTimeString()),"Y-m-d"))));
            //echo $last_month;
            $advertiser=[];
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
                        if($key2 == 'advertiser'){
                            foreach(json_decode($value2,true) as $value3)
                            {
                                $advertiser[$index2] = $value3;
                                $index2++;
                            }
                        }
                    }
                }
                $index++;
            }


            $advertiser=array_values(array_unique($advertiser));
            
            for($i=0;$i<count($advertiser);$i++)
            {
                $index3=0;
                for($j=0;$j<count($ad);$j++)
                {
                    if(in_array($advertiser[$i],$ad[$j]['advertiser']))
                    {   
                        //echo $pageview[$i]." = ".json_encode($ad[$j]['page_view'])."<br/>";
                        for($k=0;$k<count($ad[$j]['advertiser']);$k++)
                        {
                            if(date_format(date_create($ad[$j]['start']),"m") == $current_month || date_format(date_create($ad[$j]['start']),"m") == $last_month)
                            {
                                if($advertiser[$i] == $ad[$j]['advertiser'][$k])
                                {
                                    $index3 = ($index3 == 0 &&  date_format(date_create($ad[$j]['start']),"m") == $current_month ? 1 : $index3);
                                    //echo "\$pageview[".$i."] = ".$ad[$j]['page_view'][$k]." / Start = ".$ad[$j]['start']." /End = ".$ad[$j]['end']." / Revenue = ".$ad[$j]['revenue'][$k]."<br/>";
                                    $item[$i]['advertiser'] = $ad[$j]['advertiser'][$k];
                                    $item[$i]['day'][$index3] = round((strtotime($ad[$j]['end'])-strtotime($ad[$j]['start'])) / (60 * 60 * 24));
                                    $item[$i]['start'][$index3] = $ad[$j]['start'];
                                    $item[$i]['end'][$index3] = $ad[$j]['end'];
                                    $item[$i]['impression'][$index3] = $ad[$j]['impression'][$k];
                                    $item[$i]['ecpm'][$index3] = $ad[$j]['ecpm'][$k];
                                    $item[$i]['revenue'][$index3] = $ad[$j]['revenue'][$k];
                                    $index3++;
                                }
                            }
                        }
                    }
                }
                
            }
        echo "<pre/>";print_r(array_values($item));
        /*return view('new.ad_network',[
            'item' => $items
        ]);*/
    }

    public function ad_network(Request $request)
    {
        if(isset($request->month) && isset($request->year))
        {
            $current_month =  date_format(date_create($request->year."-".$request->month."-01"),"m");
            $last_month =  date('m', strtotime('-1 month', strtotime(date_format(date_create($request->year."-".$request->month."-01"),"Y-m-d"))));
            $current_year = date_format(date_create($request->year."-".$request->month."-01"),"Y");
            $last_year = date('Y', strtotime('-1 month', strtotime(date_format(date_create($request->year."-".$request->month."-01"),"Y-m-d"))));
        }
        else{
            $current_month =  date_format(date_create(now()->toDateTimeString()),"m");
            $last_month =  date('m', strtotime('-1 month', strtotime(date_format(date_create(now()->toDateTimeString()),"Y-m-d"))));
            $current_year = date_format(date_create(now()->toDateTimeString()),"Y");
            $last_year = date('Y', strtotime('-1 month', strtotime(date_format(date_create(now()->toDateTimeString()),"Y-m-d"))));
        }
            $advertiser=[];
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
                        if($key2 == 'advertiser'){
                            foreach(json_decode($value2,true) as $value3)
                            {
                                $advertiser[$index2] = $value3;
                                $index2++;
                            }
                        }
                    }
                }
                $index++;
            }


            $advertiser=array_values(array_unique($advertiser));
            
            for($i=0;$i<count($advertiser);$i++)
            {
                $index3=0;
                for($j=0;$j<count($ad);$j++)
                {
                    if(in_array($advertiser[$i],$ad[$j]['advertiser']))
                    {   
                        //echo $pageview[$i]." = ".json_encode($ad[$j]['page_view'])."<br/>";
                        for($k=0;$k<count($ad[$j]['advertiser']);$k++)
                        {
                            if((date_format(date_create($ad[$j]['start']),"m") == $current_month && date_format(date_create($ad[$j]['start']),"Y") == $current_year) || (date_format(date_create($ad[$j]['start']),"m") == $last_month && date_format(date_create($ad[$j]['start']),"Y") == $last_year))
                            {
                                if($advertiser[$i] == $ad[$j]['advertiser'][$k])
                                {
                                    $index3 = ($index3 == 0 &&  date_format(date_create($ad[$j]['start']),"m") == $current_month ? 1 : $index3);
                                    //echo "\$pageview[".$i."] = ".$ad[$j]['page_view'][$k]." / Start = ".$ad[$j]['start']." /End = ".$ad[$j]['end']." / Revenue = ".$ad[$j]['revenue'][$k]."<br/>";
                                    $item[$i]['advertiser'] = $ad[$j]['advertiser'][$k];
                                    $item[$i]['day'][$index3] = round((strtotime($ad[$j]['end'])-strtotime($ad[$j]['start'])) / (60 * 60 * 24));
                                    $item[$i]['start'][$index3] = $ad[$j]['start'];
                                    $item[$i]['end'][$index3] = $ad[$j]['end'];
                                    $item[$i]['impression'][$index3] = $ad[$j]['impression'][$k];
                                    $item[$i]['ecpm'][$index3] = $ad[$j]['ecpm'][$k];
                                    $item[$i]['revenue'][$index3] = $ad[$j]['revenue'][$k];
                                    $index3++;
                                }
                            }
                        }
                    }
                }
                
            }
            //echo "<pre/>";print_r(array_values($item));
            return view('new.ad_network',[
                'last_month'=>\DateTime::createFromFormat('!m',$last_month)->format('F'),
                'last_year'=>$last_year,
                'current_month'=>\DateTime::createFromFormat('!m',$current_month)->format('F'),
                'current_year'=>$current_year,
                'item' => $item
            ]);
    }
    public function ad_network_bymonth(Request $request)
    {
        $month = (isset($request->last_month) ? $request->last_month : $request->current_month );
        $year = (isset($request->last_year) ? $request->last_year : $request->current_year );

        $month =  date_format(date_create($month." 01 ".$year),"m");

        $advertiser=[];
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
                        if($key2 == 'advertiser'){
                            foreach(json_decode($value2,true) as $value3)
                            {
                                $advertiser[$index2] = $value3;
                                $index2++;
                            }
                        }
                    }
                }
                $index++;
            }


            $advertiser=array_values(array_unique($advertiser));
            
            for($i=0;$i<count($advertiser);$i++)
            {
                $index3=0;
                for($j=0;$j<count($ad);$j++)
                {
                    if(in_array($advertiser[$i],$ad[$j]['advertiser']))
                    {   
                        for($k=0;$k<count($ad[$j]['advertiser']);$k++)
                        {
                            if((date_format(date_create($ad[$j]['start']),"m") == $month && date_format(date_create($ad[$j]['start']),"Y") == $year) || (date_format(date_create($ad[$j]['end']),"m") == $month && date_format(date_create($ad[$j]['end']),"Y") == $year))
                            {
                                if($advertiser[$i] == $ad[$j]['advertiser'][$k])
                                {
                                    //Select only dates that aren't in the specified month.
                                    if(date_format(date_create($ad[$j]['start']),"m") !== date_format(date_create($ad[$j]['end']),"m"))
                                    {
                                        //if month number from start date = specific month number
                                        if(date_format(date_create($ad[$j]['start']),"m") == $month)
                                        {
                                            $period = $this->getDatePeriod(date_format(date_create($ad[$j]['start']),"Y-m-d"),date("Y-m-t", strtotime(date_format(date_create($ad[$j]['start']),"Y-m-d"))) );
                                        }
                                        //if month number from end date = specific month number
                                        if(date_format(date_create($ad[$j]['end']),"m") == $month)
                                        {
                                            $period = $this->getDatePeriod(date_format(date_create($year."-".$month."-01"),"Y-m-d"),date("Y-m-t", strtotime(date_format(date_create($ad[$j]['end']),"Y-m-d"))) );
                                        }
                                    }
                                    else{
                                        $period = $this->getDatePeriod(date_format(date_create($ad[$j]['start']),"Y-m-d"),date_format(date_create($ad[$j]['end']),"Y-m-d"));
                                    }
                                    foreach($period as $key=>$date)
                                    {
                                        if($key == 0)
                                        {
                                            $index3 = (int) date_format(date_create($period[$key]),"d");
                                        }
                                        $advertiser_name =  $ad[$j]['advertiser'][$k];
                                        //echo $advertiser_name."[".$index3."] = ".(int) date_format(date_create($period[$key]),"d")."<br/>";
                                        if($index3 >= 0 && $index3 <= 14)
                                        {
                                                    if((int) date_format(date_create($period[$key]),"d") <= 7)
                                                    {
                                                        //$item[0][$advertiser_name]['date'] = $period[$key];
                                                        $item[0][$advertiser_name]['advertiser'] = $ad[$j]['advertiser'][$k];
                                                        $item[0][$advertiser_name]['pageview'] = $ad[$j]['page_view'][$k];
                                                        //$item[0][$advertiser_name]['total_day'] = round((strtotime($ad[$j]['end'])-strtotime($ad[$j]['start'])) / (60 * 60 * 24));
                                                        //$item[0][$advertiser_name]['start'] = $ad[$j]['start'];
                                                        //$item[0][$advertiser_name]['end'] = $ad[$j]['end'];
                                                        $item[0][$advertiser_name]['impression'] = $ad[$j]['impression'][$k];
                                                        $item[0][$advertiser_name]['ecpm'] = $ad[$j]['ecpm'][$k];
                                                        $item[0][$advertiser_name]['revenue'] = $ad[$j]['revenue'][$k];
                                                    }
                                                    if((int) date_format(date_create($period[$key]),"d") > 7 && (int) date_format(date_create($period[$key]),"d") <= 14)
                                                    {   
                                                        //$item[0][$advertiser_name]['date2'] = $period[$key];
                                                        $item[0][$advertiser_name]['advertiser'] = $ad[$j]['advertiser'][$k];
                                                        $item[0][$advertiser_name]['pageview2'] = $ad[$j]['page_view'][$k];
                                                        //$item[0][$advertiser_name]['total_day2'] = round((strtotime($ad[$j]['end'])-strtotime($ad[$j]['start'])) / (60 * 60 * 24));
                                                        //$item[0][$advertiser_name]['start2'] = $ad[$j]['start'];
                                                        //$item[0][$advertiser_name]['end2'] = $ad[$j]['end'];
                                                        $item[0][$advertiser_name]['impression2'] = $ad[$j]['impression'][$k];
                                                        $item[0][$advertiser_name]['ecpm2'] = $ad[$j]['ecpm'][$k];
                                                        $item[0][$advertiser_name]['revenue2'] = $ad[$j]['revenue'][$k];
                                                    }
                                        }else if($index3 >= 15 && $index3 <= 31 )
                                        {
                                                    if((int) date_format(date_create($period[$key]),"d") > 14 && (int) date_format(date_create($period[$key]),"d") <= 21)
                                                    {
                                                        //$item[1][$advertiser_name]['date'] = $period[$key];
                                                        $item[1][$advertiser_name]['advertiser'] = $ad[$j]['advertiser'][$k];
                                                        $item[1][$advertiser_name]['pageview'] = $ad[$j]['page_view'][$k];
                                                        //$item[1][$advertiser_name]['total_day'] = round((strtotime($ad[$j]['end'])-strtotime($ad[$j]['start'])) / (60 * 60 * 24));
                                                        //$item[1][$advertiser_name]['start'] = $ad[$j]['start'];
                                                        //$item[1][$advertiser_name]['end'] = $ad[$j]['end'];
                                                        $item[1][$advertiser_name]['impression'] = $ad[$j]['impression'][$k];
                                                        $item[1][$advertiser_name]['ecpm'] = $ad[$j]['ecpm'][$k];
                                                        $item[1][$advertiser_name]['revenue'] = $ad[$j]['revenue'][$k];
                                                    }
                                                    if((int) date_format(date_create($period[$key]),"d") > 21)
                                                    {
                                                        //$item[1][$advertiser_name]['date2'] = $period[$key];
                                                        $item[1][$advertiser_name]['advertiser'] = $ad[$j]['advertiser'][$k];
                                                        $item[1][$advertiser_name]['pageview2'] = $ad[$j]['page_view'][$k];
                                                        //$item[1][$advertiser_name]['total_day2'] = round((strtotime($ad[$j]['end'])-strtotime($ad[$j]['start'])) / (60 * 60 * 24));
                                                        //$item[1][$advertiser_name]['start2'] = $ad[$j]['start'];
                                                        //$item[1][$advertiser_name]['end2'] = $ad[$j]['end'];
                                                        $item[1][$advertiser_name]['impression2'] = $ad[$j]['impression'][$k];
                                                        $item[1][$advertiser_name]['ecpm2'] = $ad[$j]['ecpm'][$k];
                                                        $item[1][$advertiser_name]['revenue2'] = $ad[$j]['revenue'][$k];
                                                    }
                                        }
                                        $index3++;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $item = array_values($item);
            
        //echo "<pre/>";print_r($item);
        
        return view('new.ad_network_bymonth',[
            'month' => (isset($request->last_month) ? $request->last_month : $request->current_month ),
            'year' => (isset($request->last_year) ? $request->last_year : $request->current_year ),
            'item'=>$item
        ]);
    }
    public function ad_network_preview(Request $request)
    {
        //echo "<pre/>";print_r($request->all());
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
            unset($item['advertiser_id'],$item['advertiser_name'],$item['new_advertiser']);
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

    private function getDatePeriod($start,$end)
    {
                $format = 'Y-m-d';
                $interval = new DateInterval('P1D');
                $realEnd = new DateTime($end);
                $realEnd->add($interval);
                $date_period = new DatePeriod(new DateTime($start), $interval, $realEnd);

                foreach($date_period as $date)
                { 
                    $date_array[] = date("Y-m-d",strtotime($date->format($format)));
                }
                return  $date_array;
    }
}