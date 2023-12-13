<?php

namespace App\Imports\Sheets;

use App\Models\AdPlacement;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeSheet;

class AdPlacementSheetImport implements ToCollection, WithEvents, SkipsEmptyRows, WithHeadingRow
{
    use Importable, RegistersEventListeners;

    /**
     * @param BeforeSheet $event
     * @return void
     */
    public static function beforeSheet(BeforeSheet $event)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AdPlacement::query()->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            DB::table('ad_placements')->insert([
                'id'         => $row['id'],
                'name'       => $row['name'],
                'slug'       => $row['slug'],
                'unit'       => $row['unit'],
                'active'     => $row['active'] == null ? 'y' : $row['active'],
                'created_at' => Carbon::create($row['created_at'])->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::create($row['updated_at'])->format('Y-m-d H:i:s')
            ]);
        }
    }
}
