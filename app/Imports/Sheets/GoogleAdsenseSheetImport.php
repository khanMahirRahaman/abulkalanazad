<?php

namespace App\Imports\Sheets;

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

class GoogleAdsenseSheetImport implements ToCollection, WithEvents, SkipsEmptyRows, WithHeadingRow
{
    use Importable, RegistersEventListeners;

    /**
     * @param BeforeSheet $event
     * @return void
     */
    public static function beforeSheet(BeforeSheet $event)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('google_adsense')->delete();
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
            DB::table('google_adsense')->insert([
                'id'                    => $row['id'],
                'ad_slot'               => $row['ad_slot'],
                'ad_client'             => $row['ad_client'],
                'ad_size'               => $row['ad_size'],
                'ad_width'              => $row['ad_width'],
                'ad_height'             => $row['ad_height'],
                'ad_format'             => $row['ad_format'],
                'full_width_responsive' => $row['full_width_responsive'],
                'created_at'            => Carbon::create($row['created_at'])->format('Y-m-d H:i:s'),
                'updated_at'            => Carbon::create($row['updated_at'])->format('Y-m-d H:i:s')
            ]);
        }
    }
}
