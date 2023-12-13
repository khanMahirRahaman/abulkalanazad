<?php

namespace App\Exports\Sheets;

use App\Models\Socialmedia;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class SocialMediaSheet implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return Socialmedia[]|Collection|\Illuminate\Support\Collection
     */
    public function collection()
    {
        return Socialmedia::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'url',
            'icon',
            'color',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'socialmedia';
    }
}
