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
use Excel;
use App\Imports\InventoryImport;
use InventoryReportHelper;

class RevenueReportController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->start) && isset($request->end))
        {
            $start = date_format(date_create($request->start),"Y-m-d");
            $end = date_format(date_create($request->end),"Y-m-d");

            $array = InventoryReportHelper::getRequestFormDetails($start,$end);
            
        }else{
            $array = InventoryReportHelper::getRequestFormDetails();
        }

        $bp = $array['bp'];
        $ptd = $array['ptd'];

        return view('new.revenue',[
            "bp"=>$bp,
            "ptd"=>$ptd
        ]);
    }

    // Export data
    public function export(Request $request){

        /*if ($request->input('exportexcel') != null ){
        return Excel::download(new UsersExport, 'users.xlsx');
        }

        if ($request->input('exportcsv') != null ){
        return Excel::download(new UsersExport, 'users.csv');
        }

        return redirect()->action('PagesController@index');*/
    }
}
