<?php
/**
 *  Author : Watcharaphon Piamphuetna
 * 
 * ©2020 Bangkok Post Public Company Limited
 */

namespace App\Helpers;

use DateTime;
use DatePeriod;
use DateInterval;
use App\RequestForm;
use App\AdDescription;

class InventoryReportHelper
{
    /********************* Revenue Report  *******************************/
    /**
     * Get request form Detail
     *
     * @return void
     */
    public static function getRequestFormDetails($start='',$end='')
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

        foreach($item as $key=>$value)
        {
            if($value['status'] === 'Waiting')
            {
                unset($item[$key]);
            }
        }
        //replace a new index for item array
        $item = array_values($item);
        //Divide rows of details, separated by ad description and web names.
        foreach($item as $key=>$value)
        {
            //loop for each sub element of an arrays
            $a[] = array_keys($value);
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
                                        $bp[$bp_index][$key2] = "";
                                }
                            }
                        }
                        if(strpos($key2,"ptd_") !== false)
                        {
                            if(count(json_decode($item[$key][$key2],true)) > 1)
                            {
                                $ptd[$ptd_index][$key2] = array_values(json_decode($item[$key][$key2],true));
                            }
                            else if(count(json_decode($item[$key][$key2],true)) == 1){
                                if(isset(json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))]))
                                {
                                    $ptd[$ptd_index][$key2] = json_decode($item[$key][$key2],true)[array_key_first(json_decode($item[$key][$key2],true))];
                                }else{
                                        $ptd[$ptd_index][$key2] = "";
                                }
                            }
                        }
                    } 
                }else{
                    if(strpos($key2,"bp_") !== false && strpos($key2,"ptd_") == false)
                    {
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
        
        $bp = array_values(collect(self::getReportDetail($bp,"bp"))->sortByDesc('create_at')->all());
        $ptd = array_values(collect(self::getReportDetail($ptd,"ptd"))->sortByDesc('create_at')->all());

        if($start !== '' && $end !== '')
        {
            $start = date_format(date_create($start),"Y-m-d");
            $end = date_format(date_create($end),"Y-m-d");

            $bp = self::getDetailByDatePeriod($bp,$start,$end,"bp");
            $ptd = self::getDetailByDatePeriod($ptd,$start,$end,"ptd");
        }

        return [
            "bp"=>$bp,
            "ptd"=>$ptd
        ];
    }

    /**
     * Get request form detail by period 
     *
     * @param [type] $array
     * @param [type] $start
     * @param [type] $end
     * @param [type] $web_name
     * @return void
     */
    private static function getDetailByDatePeriod($array,$start,$end,$web_name)
    {
        $date_array = self::getDatePeriod($start,$end);
        
        foreach($array as $array_key=>$array_item)
        {
            //Filter array by date period from and date period to
            $item_date_period = self::getDatePeriod($array[$array_key][$web_name.'_period_from'],$array[$array_key][$web_name.'_period_to']);
            if(count(array_intersect($item_date_period, $date_array)) == 0)
            {
                unset($array[$array_key]);
            }
        }

        return array_values($array);
    }

    /**
     * separate revenue report detail by web name (BP, PTD)
     *
     * @param [type] $web
     * @param [type] $web_name
     * @return void
     */
    private static function getReportDetail($web,$web_name)
    {
        $x=0;
        $detail=[];
        foreach($web as $web_index=>$web_item)
        {
            
                foreach($web_item as $key=>$value)
                {
                    
                        //echo "<pre/>";print_r($web[$web_index][$web_name."_size"]);echo "<br/>----------------<br/";
                        if(is_array($value) && is_array($web[$web_index][$web_name."_size"]))
                        {
                            for($i=0;$i<count($web[$web_index][$web_name."_size"]);$i++)
                            {
                                if($key == $web_name."_size")
                                {
                                    $x = $x+$i;
                                }
                                
                                foreach(array_keys($web[0]) as $key2)
                                {
                                    if(is_array($web[$web_index][$key2]))
                                    {
                                        $detail[$x][$key2] = $web[$web_index][$key2][$i];
                                    }else{
                                        $detail[$x][$key2] = $web[$web_index][$key2];
                                    }
                                    
                                }
                            }
                        }
                        else
                        {
                            if(!empty($web[$web_index][$web_name."_campaign_budget"]) )
                            {
                                $detail[$x][$key] = $value;
                            }
                            
                        }
                }
                $x++;
        }
        return $detail;
    }


    /**
     * get period between date 
     *
     * @param [type] $start
     * @param [type] $end
     * @return void
     */
    private static function getDatePeriod($start,$end)
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