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


class InventoryController extends Controller
{
    public function index()
    {
        return view('new.inventory');
    }

    public function import()
    {
         echo "<pre/>"; print_r(Excel::toArray(new InventoryImport, request()->file('excel')));
    }
    
}
