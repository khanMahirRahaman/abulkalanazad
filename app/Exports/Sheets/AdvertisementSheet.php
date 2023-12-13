<?php

namespace App\Exports\Sheets;

use App\Models\Advertisement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AdvertisementSheet implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Advertisement::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'id',
            'name',
            'type',
            'url',
            'image',
            'size',
            'ga',
            'active',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'advertisements';
    }
}
