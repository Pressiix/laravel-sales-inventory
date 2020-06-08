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

use ReaderEntityFactory;

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

    public function import(Request $request)
    {
        /*try {

            echo "<pre/>"; print_r(Excel::toArray(new InventoryImport, request()->file('excel')));
          
          } catch (\Exception $e) {
          
                 return $e->getMessage();
          }*/
          $array = [];
          $array2 = [];
          $row_index = 0;
          $type= array("leader board","sticky","hybrid","multi","leader board (mobile)","sticky  (mobile)","hybrid   (mobile)","multi  (mobile)");
          $content = '';

                $reader = ReaderEntityFactory::createXLSXReader();
                $file = $request->file('excel');// get file
                
                /*$file = "/assets/import/test_from_press.xlsx";*/

                $reader->open($file);
                
                //$reader = ReaderFactory::create(Type::XLSX); // for XLSX files
                // loop semua sheet dan dapatkan sheet orders
                foreach ($reader->getSheetIterator() as $sheet) 
                {
                    //$content .= '<table border="1">';
                    if ($sheet->getName() === 'Sheet1') //get array from specific sheet name ***
                    {
                        foreach ($sheet->getRowIterator() as $row) {
                            $array[$row_index] = implode(array_map(function ($cell) {
                                    return "\"".$cell."\",";
                            }, $row->getCells()));
                            
                            //$array[$row_index] = explode(",", $array[$row_index]);
                            $row_index++;		
                        }
                    break;
                    }
                    
                }
                
                foreach($array as $key => $value)
                {
                    $array2[$key] = explode(",", $value);
                }
                echo "<pre/>"; print_r($array2);
            
         
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
