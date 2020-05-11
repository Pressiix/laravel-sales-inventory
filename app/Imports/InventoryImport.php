<?php

namespace App\Imports;

use App\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

//use custom row as heading row
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use row 1 as default heading row
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
HeadingRowFormatter::default('none');

class InventoryImport implements ToModel, WithCalculatedFormulas, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function modelss(array $row)
    {
        return new Inventory([
            //
        ]);
    }

    /*public function headingRow(): int
    {
        use row 1 as heading row
        return 1;
    }*/

}
