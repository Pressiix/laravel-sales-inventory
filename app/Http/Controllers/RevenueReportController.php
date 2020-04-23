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

class RevenueReportController extends Controller
{

    public function test()
    {
        $item = [];
        $bp = [];
        $ptd=[];
        $bp_index=0;
        $ptd_index=0;
        $request = RequestForm::all();
        $addesc = AdDescription::all();
        for($i=0;$i<count($request);$i++)
        {
            $item1[$request[$i]->getOriginal()['id']] = $request[$i]->getOriginal();
        }
        for($j=0;$j<count($addesc);$j++)
        {
            $item2[$addesc[$j]->getOriginal()['request_id']] = $addesc[$j]->getOriginal();
            unset($item2[$addesc[$j]->getOriginal()['request_id']]['id'] ,$item2[$addesc[$j]->getOriginal()['request_id']]['request_id']);
        }
        $item = array_values(array_replace_recursive($item1,$item2));
        $count = count($item);
        for($k=0;$k<$count;$k++)
        {
            if($item[$k]['status'] == 'Waiting')
            {
                unset($item[$k]);
            }

        }
        $item = array_values($item);
        
        foreach($item as $key=>$value)
        {
            $field = array_keys($value);
            foreach($field as $key2)
            {
                if(is_array(json_decode($item[$key][$key2],true)))
                {
                    if($key2 !== "bp_web" && $key2 !== "ptd_web"){
                        if(strpos($key2,"bp_") !== false)
                        {
                            if(count(json_decode($item[$key][$key2],true)) > 1)
                            {
                                $bp[$bp_index][$key2] = array_values(json_decode($item[$key][$key2],true));
                            }
                            else if(count(json_decode($item[$key][$key2],true)) == 1){
                                if(isset(json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))]))
                                {
                                    $bp[$bp_index][$key2] = json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))];

                                }else{
                                    unset($bp[$bp_index]);
                                    break;
                                }
                            }
                        }
                        if(strpos($key2,"ptd_") !== false)
                        {
                            if(count(json_decode($item[$key][$key2],true)) > 1)
                            {
                                $ptd[$ptd_index][$key2] = array_values(json_decode($item[$key][$key2],true));
                            }
                            else if(count(json_decode($item[$key][$key2],true)) == 1 ){
                                if(isset(json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))]))
                                {
                                    $ptd[$ptd_index][$key2] = json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))];

                                }else{
                                    unset($ptd[$ptd_index]);
                                    break;
                                }
                            }
                        }
                    } 
                }else{
                    if(strpos($key2,"bp_") !== false && strpos($key2,"ptd_") == false){
                        $bp[$bp_index][$key2] = $item[$key][$key2];
                    }
                    else if(strpos($key2,"bp_") == false && strpos($key2,"ptd_") !== false)
                    {
                        $ptd[$ptd_index][$key2] = $item[$key][$key2];
                    }
                    else if(strpos($key2,"bp_") == false && strpos($key2,"ptd_") == false){
                        $bp[$bp_index][$key2] = $item[$key][$key2];
                        $ptd[$ptd_index][$key2] = $item[$key][$key2];
                    }      
                }
            }
            $bp_index++;
            $ptd_index++;
        }
        $bp = array_values($bp);
        $ptd = array_values($ptd);
        
        $revenue_detail['bangkokpost'] = $this->getReportDetail($bp,"bp");
        $revenue_detail['posttoday'] = $this->getReportDetail($ptd,"ptd");
       echo "<pre/>"; print_r($revenue_detail);
    }

    private function getReportDetail($web,$web_name)
    {
        $x=0;
        $detail=[];
        foreach($web as $web_index=>$web_item)
        {
                foreach($web_item as $key=>$value)
                {
                    if(is_array($value))
                    {
                        $detail[$x][$key] = $value[0];
                    }
                    else
                    {
                        $detail[$x][$key] = $value;
                        if(strpos($key,$web_name."_campaign_budget")!== false && is_array($web[$web_index][$web_name.'_size'])){
                            foreach($web[$web_index][$web_name.'_size'] as $key2=>$value2)
                            {
                                if($key2 !== 0)
                                {
                                    $x++;
                                    foreach(array_keys($web[$web_index]) as $web_key)
                                    {
                                        if(is_array($web[$web_index][$web_key]))
                                        {
                                            $detail[$x][$web_key] = $web[$web_index][$web_key][$key2];
                                        }
                                        else{
                                            $detail[$x][$web_key] = $web[$web_index][$web_key];
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $x++;
        }
        return $detail;
    }

    public function index()
    {
        return view('new.revenue');
    }
}
