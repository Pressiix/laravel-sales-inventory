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

class AppController extends Controller
{
    public function test()
    {
        
    }
    
    public function profile()
    {
        $user = Auth::user();
        //echo "<pre/>"; print_r($user); echo "<pre/>";
        return view('new.profile',compact('user'));
    }
    public function profile2()
    {
        $user = Auth::user();
        //Get all row
        $someModel = DB::connection('mysql')->select('select * from request'); // static method
        $someModel =json_decode(json_encode($someModel), True);
        //Sorting result array by date time
        $someModel = collect($someModel)->sortByDesc('create_at')->all();
        return view('new.profile2',[
            'someModel' => $someModel
        ],compact('user'));
    }

    public function profile3(Request $request)
    {
            $item=[];
            $someModel = DB::connection('mysql')->select('select * from request'); // static method
            $someModel =json_decode(json_encode($someModel), True);
            $user = Auth::user();
            $sales_name = auth()->user()->firstname.' '.auth()->user()->lastname; 
            //If user search data by date range
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

                foreach($someModel as $value)
                {
                    $create_at = date_format(date_create($value['create_at']),$format);
                    if($value['sales_name'] == $sales_name && in_array(date("m",strtotime($create_at)),$month) && in_array(date("d",strtotime($create_at)),$day) )
                    {
                        foreach($date_period as $date) { 
                            if($create_at == $date->format($format) )
                            {
                                $item[] =$value;
                            }
                        }
                    }
                }
            }
            else
            {
                foreach($someModel as $value)
                {
                    if($value['sales_name'] == $sales_name)
                    {
                        $item[] = $value;
                    }
                }
            }
            if(!empty($item))
            {
                $item = collect($item)->sortByDesc('create_at')->all();
            }

            return view('new.profile3',[
                'someModel' => $item
            ],compact('user'));
    }

    
    public function booking_inventory()
    {
        return view('new.booking_inventory');
    }
    
    
}
