<?php

namespace App\Http\Controllers;

use Encore\Admin\Actions\Interactor\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use DateTime;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use Excel;
use App\Imports\InventoryImport;
use App\Services\PayUService\Exception;


class InventoryController extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
    }

    public function index(Request $request)
    {
        return view('new.inventory');
    }

    public function import()
    {
        //try {

            echo "<pre/>"; print_r(Excel::toArray(new InventoryImport, request()->file('excel')));
          
          /*} catch (\Exception $e) {
          
                 return $e->getMessage();
          }*/
         
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

   

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        
        return response()->json(['success'=>json_encode($input['data'])]);
    }
}
