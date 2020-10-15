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

    /**
     * 
     * Get : Month / Year / Section 
     * 
     * @return view : Inventory Dashboard
     * 
     */
    public function index(Request $request)
    {
        $section = isset($request->section) ? $request->section : 'Home';
        if(isset($request->month) && isset($request->year))
        {
            $month = $request->month;
            $month_label = \DateTime::createFromFormat('!m',$month)->format('F');
            $year = $request->year;
        }else{
            $date = date_create(now()->toDateTimeString());
            $month = date_format($date,"m");
            $month_label = \DateTime::createFromFormat('!m',$month)->format('F');
            $year = date_format($date,"Y");
        }

        return view('new.inventory',[
            "month" => $month,
            "month_label" => $month_label,
            "year" => $year,
            "section" => $section,
            "data" => self::getData($section,$month_label,$year)
        ]);
    }


    /**
     * ajax function for saving data to a Database
     *
     * @param Request $request
     * @return Response-Message
     */
    public function ajaxSave(Request $request)
    {
        $input = $request->all();
        $data = json_decode(json_encode($input['data']),true);
        $month = $input['month'];
        $year = $input['year'];
        $section = $input['section'];
        $web = $input['web'];

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
        $b = [];   //Available row

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
        
        foreach(array_keys($a) as $key=>$value)
        {
            $count = count(Inventory::where('type',$a[$key][0])->where('month',$month)->where('year',$year)->where('section',$section)->get());
            if($count == 0)
            {
                    $request_form = Inventory::create([
                        'web' => $web,
                        'month'=> $month,
                        'year'=>$year,
                        'section'=>$section,
                        'type'=> $a[$key][0],
                        'inventory'=> json_encode($a[$key]),
                        'available'=>json_encode($b[$key])
                    ]);
            }else{
                    //Update data Test
                    $request_form = Inventory::where('type',$a[$key][0])->where('month',$month)->where('year',$year)->where('section',$section)->update([
                        'web' => $web,
                        'month'=> $month,
                        'year'=>$year,
                        'section'=>$section,
                        'type'=> $a[$key][0],
                        'inventory'=> json_encode($a[$key]),
                        'available'=>json_encode($b[$key])
                    ]);
                    
            }
        }

        return response()->json(['success'=>"Data has been saved!"]);
    }


    /**
     * ปรับ format ของข้อมูลก่อนทำการเซฟลง DB 
     *
     * @param [type] $data
     * @return void
     */
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


    
    /**
     * Get data for display in Inventory Dashboard
     *
     * @param [type] $section
     * @param [type] $month
     * @param [type] $year
     * @return void
     */
    private function getData($section,$month,$year)
    {
        $result = Inventory::where('section',$section)->where('month',$month)->where('year',$year)->get()->toArray();
        
        //get data from home section if current section has no data
        if(count($result) == 0){
            $result = Inventory::where('section',"Home")->where('month',$month)->where('year',$year)->get()->toArray();
         }
        
        $data = [];
        foreach($result as $key=>$item)
        {
            $item_inventory = json_decode($item['inventory'],true);
            unset($item_inventory['Inventory']);
            $item_available = json_decode($item['available'],true);
            unset($item_available['Available']);
            $type = $item_inventory[0];

            $numeric_key_array = array_filter($item_inventory, function($key) { return is_numeric($key); }, ARRAY_FILTER_USE_KEY);
            $last_key = key(array_slice($numeric_key_array, -1, 1, true));
            $last_key = $last_key+4;  //4 = none numeric array keys

            $i=0;
            foreach($item_inventory as $key=>$item)
            {
                if(is_numeric($key))
                {
                    if($i == 0)
                    {
                        $data[$type]['inventory'][$i] = 'Inventory';
                        $data[$type]['available'][$i] = 'Available';
                    }else{
                        $key = $i <= 8 ? $key : $key-1;
                        //Week 1 - 3
                        $week = $i == 8 ? 1 : $i == 16 ? 2 : $i == 24 ? 3 : 0;
                        if($week == 0)
                        {
                            
                            $data[$type]['inventory'][$i] = $item_inventory[$key];
                            $data[$type]['available'][$i] = $item_available[$key];
                        }else{
                            $data[$type]['inventory'][$i] = $item_inventory['week'.$week];
                            $data[$type]['available'][$i] = $item_available['week'.$week];
                            //$i++;
                        }
                    }
                }else{
                     $last_numeric_key = $last_key - 4;
                     for($i=$last_key;$i>$last_numeric_key;$i--)
                     {
                        $data[$type]['inventory'][$i-1] = $item_inventory[$i-4];
                        $data[$type]['available'][$i-1] = $item_available[$i-4];
                        //echo ($i-1)." ".$item_inventory[$i-4]."<br/>";
                     }
                    //Week 4
                    $data[$type]['inventory'][$last_key] = $item_inventory['week4'];
                    $data[$type]['available'][$last_key] = $item_available['week4'];
                    break;
                }
                $i++;
            }
        }

        return $data;
    }

    /**
     * Import Excel function
     *
     * @param Request $request
     * @return void
     */
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

    // public function test3()
    // {
    //     $result = Inventory::where('month','October')->where('year','2020')->get()->toArray();
    //     $data = [];
    //     foreach($result as $key=>$item)
    //     {
    //         $item_inventory = json_decode($item['inventory'],true);
    //         unset($item_inventory['Inventory']);
    //         $item_available = json_decode($item['available'],true);
    //         unset($item_available['Available']);
    //         $type = $item_inventory[0];

    //         $numeric_key_array = array_filter($item_inventory, function($key) { return is_numeric($key); }, ARRAY_FILTER_USE_KEY);
    //         $last_key = key(array_slice($numeric_key_array, -1, 1, true));
    //         $last_key = $last_key+4;  //4 = none numeric array keys

    //         $i=0;
    //         foreach($item_inventory as $key=>$item)
    //         {
    //             if(is_numeric($key))
    //             {
    //                 if($i == 0)
    //                 {
    //                     $data[$type]['inventory'][$i] = 'Inventory';
    //                     $data[$type]['available'][$i] = 'Available';
    //                 }else{
    //                     $key = $i <= 8 ? $key : $key-1;
    //                     //Week 1 - 3
    //                     $week = $i == 8 ? 1 : $i == 16 ? 2 : $i == 24 ? 3 : 0;
    //                     if($week == 0)
    //                     {
                            
    //                         $data[$type]['inventory'][$i] = $item_inventory[$key];
    //                         $data[$type]['available'][$i] = $item_available[$key];
    //                     }else{
    //                         $data[$type]['inventory'][$i] = $item_inventory['week'.$week];
    //                         $data[$type]['available'][$i] = $item_available['week'.$week];
    //                         //$i++;
    //                     }
    //                 }
    //             }else{
    //                  $last_numeric_key = $last_key - 4;
    //                  for($i=$last_key;$i>$last_numeric_key;$i--)
    //                  {
    //                     $data[$type]['inventory'][$i-1] = $item_inventory[$i-4];
    //                     $data[$type]['available'][$i-1] = $item_available[$i-4];
    //                     //echo ($i-1)." ".$item_inventory[$i-4]."<br/>";
    //                  }
    //                 //Week 4
    //                 $data[$type]['inventory'][$last_key] = $item_inventory['week4'];
    //                 $data[$type]['available'][$last_key] = $item_available['week4'];
    //                 break;
    //             }
    //             $i++;
    //         }
    //     }
        
    //     echo "<pre/>"; print_r($data);
    // }

}
