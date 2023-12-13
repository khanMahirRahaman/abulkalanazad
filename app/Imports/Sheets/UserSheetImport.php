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

class UserSheetImport implements ToCollection, WithEvents, SkipsEmptyRows, WithHeadingRow
{
    use Importable, RegistersEventListeners;

    /**
     * @param BeforeSheet $event
     * @return void
     */
    public static function beforeSheet(BeforeSheet $event)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->delete();
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
            DB::table('users')->insert([
                'id'                => $row['id'],
                'name'              => $row['name'],
                'email'             => $row['email'],
                'email_verified_at' => $row['email_verified_at'],
                'username'          => $row['username'],
                'password'          => $row['password'],
                'photo'             => $row['photo'],
                'occupation'        => $row['occupation'],
                'about'             => $row['about'],
                'language'          => $row['language'],
                'darkmode'          => $row['darkmode'],
                'active'            => $row['active'],
                'banned_at'         => $row['banned_at'] == null ? null : Carbon::create($row['banned_at'])->format('Y-m-d H:i:s'),
                'remember_token'    => $row['remember_token'],
                'created_at'        => Carbon::create($row['created_at'])->format('Y-m-d H:i:s'),
                'updated_at'        => Carbon::create($row['updated_at'])->format('Y-m-d H:i:s')
            ]);
        }
    }
}
