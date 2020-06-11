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
use App\Inventory;

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
        $campaign_type = [];

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

        $inventory = $this->getInventoryByCampaignType($campaign);
        $a = [];    //inventory row
        $b = [];    //Available row

        foreach($inventory as $key=>$value)
        {
            foreach($value as $key2=>$value2)
            {
                if(is_array($value2))
                {
                    foreach($value2 as $key3=>$value3)
                    {
                        if($key3 == 0)
                        {
                            if(empty($a[$key][$key2]))
                            {
                                $a[$key][$key2] = $inventory[$key][$key2][$key3];
                            } else{
                                array_push($a[$key][$key2], array($inventory[$key][$key2][$key3]));
                            }
                        }else if($key3 == 1){
                            if(empty($b[$key][$key2]))
                            {
                                $b[$key][$key2] = $inventory[$key][$key2][$key3];
                            } else{
                                array_push($b[$key][$key2], array($inventory[$key][$key2][$key3]));
                            }
                        }
                    }
                }else{
                    $a[$key][0] =  $inventory[$key]['campaign_name'];
                    $b[$key][0] =  $inventory[$key]['campaign_name'];
                }
            }
        }

        $month = array_reduce(range(1,12),function($rslt,$m){ $rslt[$m] = date('F',mktime(0,0,0,$m,10)); return $rslt; });
        
        foreach(array_keys($a) as $key=>$value)
        {
            $request_form = Inventory::where('type', $a[$key][0])->update([
                'web' => 'bp',
                'month'=> 'January',
                'year'=>'2020',
                'type'=> $a[$key][0],
                'inventory'=> json_encode($a),
                'available'=>json_encode($b)
            ]);
        }

        $c = (array) Inventory::all();
        
        foreach($c[array_keys($c)[0]] as $key=>$value)
        {
            $i =0;
            $c[array_keys($c)[0]][$key] = (array) $c[array_keys($c)[0]][$key];
           foreach((array) $value as $key2=>$value2)
           {
               if($i !== 13)
               {
                unset($c[array_keys($c)[0]][$key][$key2]);
               }
               $i++;
           }
        }
         echo "<pre/>"; print_r($c[array_keys($c)[0]]);

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
