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
    public function index()
    {
        return view('new.inventory');
    }

    public function import()
    {
        try {
            $import = new InventoryImport();
            echo "<pre/>"; print_r(Excel::toArray($import, request()->file('excel')));
          } catch (\Exception $e) {
                return $e->getMessage();
          }
    }
    
}
