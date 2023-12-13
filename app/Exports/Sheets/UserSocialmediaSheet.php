<?php

namespace App\Exports\Sheets;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserSocialmediaSheet implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return DB::table('user_socialmedia')->get();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'socialmedia_id',
            'url',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'user_socialmedia';
    }
}
