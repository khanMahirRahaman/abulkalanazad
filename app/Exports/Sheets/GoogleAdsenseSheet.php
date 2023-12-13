<?php

namespace App\Exports\Sheets;

use App\Models\GoogleAdsense;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class GoogleAdsenseSheet implements FromCollection, WithTitle, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return GoogleAdsense::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'id',
            'ad_slot',
            'ad_client',
            'ad_size',
            'ad_width',
            'ad_height',
            'ad_format',
            'full_width_responsive',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'google_adsense';
    }
}
