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

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class InventoryImport implements ToModel, WithCalculatedFormulas, WithHeadingRow, WithMultipleSheets, SkipsUnknownSheets
{
    use WithConditionalSheets;


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
            //return model
        ]);
    }

    /*public function headingRow(): int
    {
        use row 1 as heading row
        return 2;
    }*/

    public function sheets(): array
    {
        return [
            // 1. Select sheet by index
            0 => new FirstSheetImport(),
            1 => new SecondSheetImport()

            // 2. Select sheet by sheet name
            //'Sheet1' => new FirstSheetImport(),
            //'Sheet2' => new SecondSheetImport()
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }

    public function conditionalSheets(): array
    {
        return [
            0 => new FirstSheetImport(),
            1 => new SecondSheetImport()
        ];
    }

}
