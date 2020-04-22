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
        for($k=0;$k<count($item);$k++)
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
                    //echo $key2."<br/>";
                    if(strpos($key2,"bp_") == true)
                    {
                        $bp[$bp_index][$key2] = json_decode($item[$key][$key2],true);
                    }
                    if(strpos($key2,"ptd_") == true)
                    {
                        $ptd[$ptd_index][$key2] = json_decode($item[$key][$key2],true);
                    }
                    
                }else{
                    if(strpos($key2,"bp_") == false)
                        $bp[$bp_index][$key2] = $item[$key][$key2];
                        $ptd[$ptd_index][$key2] = $item[$key][$key2];
                }
            }
            $bp_index++;
            $ptd_index++;
        } 
        echo "<pre/>"; print_r($bp);
    }

    public function index()
    {
        return view('new.revenue');
    }
}
