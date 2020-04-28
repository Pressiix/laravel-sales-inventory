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
    public function index(Request $request)
    {
        $item = [];
        $bp = [];
        $ptd=[];
        $bp_index=0;
        $ptd_index=0;
        //Get query result from request table and ad description table
        $request_form = RequestForm::all();
        $addesc = AdDescription::all();
        //put the usage array column to an array variables
        for($i=0;$i<count($request_form);$i++)
        {
            $item1[$request_form[$i]->getOriginal()['id']] = $request_form[$i]->getOriginal();
        }
        for($j=0;$j<count($addesc);$j++)
        {
            $item2[$addesc[$j]->getOriginal()['request_id']] = $addesc[$j]->getOriginal();
            //remove an unusage array column
            unset($item2[$addesc[$j]->getOriginal()['request_id']]['id'] ,$item2[$addesc[$j]->getOriginal()['request_id']]['request_id']);
        }
        //merge query result from request table and ad description table
        $item = array_values(array_replace_recursive($item1,$item2));
        //get report detail only approve status
        for($k=0;$k<count($item);$k++)
        {
            //remove a rows if status not equal approve status
            if($item[$k]['status'] == 'Waiting')
            {
                unset($item[$k]);
            }
        }
        //replace a new index for item array
        $item = array_values($item);
        //Divide rows of details, separated by ad description and web names.
        foreach($item as $key=>$value)
        {
            //loop for each sub element of an arrays
            foreach(array_keys($value) as $key2)
            {
                //If the value in the column is an array of data.
                if(is_array(json_decode($item[$key][$key2],true)))
                {
                    //both bp_web and ptd_web are unusage column
                    if($key2 !== "bp_web" && $key2 !== "ptd_web"){
                        //If the array key begins with the word "bp_".
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
                                    if($key2 !== "bp_ad_detail")
                                    {
                                        unset($bp[$bp_index]);
                                        break;
                                    }else{
                                        $bp[$bp_index][$key2] = "";
                                    }
                                }
                            }
                        }
                        //If the array key begins with the word "ptd_".
                        if(strpos($key2,"ptd_") !== false)
                        {
                            //echo $key2."=".$item[$key][$key2]."<br/>";
                            if(count(json_decode($item[$key][$key2],true)) > 1)
                            {
                                $ptd[$ptd_index][$key2] = array_values(json_decode($item[$key][$key2],true));
                            }
                            else if(count(json_decode($item[$key][$key2],true)) == 1){
                                if(isset(json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))]))
                                {
                                    $ptd[$ptd_index][$key2] = json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))];
                                    //echo "[".$ptd_index."] = ".json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))]."<br/>";
                                }else{
                                    if($key2 !== "ptd_ad_detail")
                                    {
                                        unset($ptd[$ptd_index]);
                                        break;
                                    }else{
                                        $ptd[$ptd_index][$key2] = "";
                                    }
                                }
                            }
                        }
                    } 
                }else{
                    if(strpos($key2,"bp_") !== false && strpos($key2,"ptd_") == false){
                        $bp[$bp_index][$key2] = $item[$key][$key2];
                        if(!isset($bp[$bp_index]['type']))
                        {
                            $bp[$bp_index]['type'] = "BP";
                        }
                    }
                    else if(strpos($key2,"bp_") == false && strpos($key2,"ptd_") !== false)
                    {
                        $ptd[$ptd_index][$key2] = $item[$key][$key2];
                        if(!isset($ptd[$ptd_index]['type']))
                        {
                            $ptd[$ptd_index]['type'] = "PTD";
                        }
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
        
        $bp = array_values(collect($this->getReportDetail($bp,"bp"))->sortByDesc('create_at')->all());
        $ptd = array_values(collect($this->getReportDetail($ptd,"ptd"))->sortByDesc('create_at')->all());

        if(isset($request->start) && isset($request->end))
        {
            $start = date_format(date_create($request->start),"Y-m-d");
            $end = date_format(date_create($request->end),"Y-m-d");

            $bp = $this->getDetailByDatePeriod($bp,$start,$end,"bp");
            $ptd = $this->getDetailByDatePeriod($ptd,$start,$end,"ptd");
        }
        //echo "<pre/>";print_r($ptd);
        return view('new.revenue',[
            "bp"=>$bp,
            "ptd"=>$ptd
        ]);
    }

    /**
     * Customize data for display on the data table.
     */
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

    /**
     * Create an array of dates between the period from and period to columns.
     */
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

    /**
     * Select only the set of data between the specified date range.
     */
    private function getDetailByDatePeriod($array,$start,$end,$web_name)
    {
        $date_array = $this->getDatePeriod($start,$end);
        
        foreach($array as $array_key=>$array_item)
        {
            //Filter array by date period from and date period to
            $item_date_period = $this->getDatePeriod($array[$array_key][$web_name.'_period_from'],$array[$array_key][$web_name.'_period_to']);
            foreach($item_date_period as $date)
            {
                if(!in_array($date,$date_array) && !in_array($date,$date_array) )
                {
                    unset($array[$array_key]);
                }
            }
            //Filter array by another field name (create at)
            /*if(!in_array(($array[$array_key]['create_at'],$date_array)))
            {
                unset($array[$array_key]);
            }*/
        }
        return array_values($array);
    }
}
