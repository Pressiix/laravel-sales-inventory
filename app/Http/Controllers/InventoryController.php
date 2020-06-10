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

    public function test()
    {
        $datos = file_get_contents(storage_path().'/jsondata/result.json');
        $data = json_decode($datos, true);
        $campaign = [];
        $index = 0;
        

        foreach($data as $key => $value)
        {
           $index = ($index > 3 ? 0 : $index);
           
                if($data[$key]['campaign'] == 'Inventory' || $data[$key]['campaign'] == 'Available')
                {
                    $campaign[$key] = $value;
                }else{
                    $campaign[$key]['campaign'] = $data[$key]['campaign'];
                }
                              
           $index++;
        }

        
        
        echo "<pre/>";print_r($this->getInventoryByCampaignType($campaign));  
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
                    if ($sheet->getName() === 'Sheet2') //get array from specific sheet name ***
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

    private function getInventoryByCampaignType($data)
    {
        $index = 0;
        $index2 = 0;
        $new = [];

        foreach($data as $key => $value)
        {
            $index = ($index > 2 ? 0 : $index);
            
            if($index == 2)
            {
                for($i=0;$i<=count($data[$key]);$i++)
                {
                    if($i<=27)  //daily impression
                    {
                        if($i == 0)
                        {
                            $new[$index2]['campaign_name'] = $data[($key-2)]['campaign'];
                        }
                        $new[$index2][($i+1)] = array($data[($key-1)][($i+1)],$data[$key][($i+1)]);
                    }else{
                        if($i == 28)
                        {
                            $new[$index2]['Inventory'] = array($data[($key-1)]['campaign'],$data[$key]['campaign']);
                        }
                        if($i == 29)
                        {
                            $new[$index2]['week1'] = array($data[($key-1)]['week1'],$data[($key-1)]['week1']);
                        }
                        if($i == 30)
                        {
                            $new[$index2]['week2'] = array($data[($key-1)]['week2'],$data[($key-1)]['week2']);
                        }
                        if($i == 31)
                        {
                            $new[$index2]['week3'] = array($data[($key-1)]['week3'],$data[($key-1)]['week3']);
                        }
                        if($i == 32)
                        {
                            $new[$index2]['week4'] = array($data[($key-1)]['week4'],$data[($key-1)]['week4']);
                        }
                    }
                }
                $index2++;
            }
            $index++;
        }
        return $new;
    }

}
