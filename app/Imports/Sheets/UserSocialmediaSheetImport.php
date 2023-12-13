<?php

namespace App\Imports\Sheets;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserSocialmediaSheetImport implements ToCollection, WithEvents, SkipsEmptyRows, WithHeadingRow
{
    use Importable, RegistersEventListeners;

    /**
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('user_socialmedia')->upsert([
                'id'             => $row['id'],
                'user_id'        => $row['user_id'],
                'socialmedia_id' => $row['socialmedia_id'],
                'url'            => $row['url'],
                'created_at'     => Carbon::create($row['created_at'])->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::create($row['updated_at'])->format('Y-m-d H:i:s')
            ],
            ['id', 'user_id', 'socialmedia_id', 'url', 'created_at', 'updated_at'],
            ['id', 'user_id', 'socialmedia_id', 'url', 'created_at', 'updated_at']);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
