<?php

namespace App\Http\Controllers;

use App\Models\RequestForm;
use Encore\Admin\Actions\Interactor\Form;
use Illuminate\Http\Request;
use App\Http\Requests\SaleFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DateTime;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdvertiserController extends Controller
{
    public function test()
    {
        $customer = json_decode(json_encode(DB::connection('mysql')->table('customer')->get()), True);
        //$customer = array_column($customer ,'customer_name'.''.'customer_surname','id');
        echo "<pre/>";print_r($customer );
        //return view('test',['options' => $customer]);
    }
    
    public function createAdvertiser()
    {
        return view('new.create_new_advertiser');
    }

    public function storeAdvertiser(Request $request)
    {
         DB::connection('mysql')->insert('
            insert into advertiser values (
                NULL,
                \''.$request->advertiser_firstname.'\',
                \''.$request->advertiser_lastname.'\',
                \''.$request->advertiser_firstname.' '.$request->advertiser_lastname.'\',
                \''.$request->advertiser_nickname.'\',
                \''.$request->advertiser_telephone.'\',
                \''.$request->advertiser_email.'\',
                \''.$request->company_name.'\',
                \''.$request->company_type.'\',
                \''.$request->company_product.'\',
                \''.$request->company_telephone.'\',
                \''.$request->company_email.'\'
            )'
        );
        
        return Redirect::to('create_new_advertiser');
    }


    

    
}
