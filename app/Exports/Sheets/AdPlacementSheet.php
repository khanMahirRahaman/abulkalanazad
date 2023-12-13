<?php

namespace App\Exports\Sheets;

use App\Models\AdPlacement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AdPlacementSheet implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return AdPlacement::all();
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
            'unit',
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
        return 'ad_placements';
    }
}
