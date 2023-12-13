<?php

namespace App\Exports\Sheets;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineSheet implements FromCollection, WithTitle, WithHeadings
{
    /**
     * @return Collection|\Illuminate\Support\Collection|LanguageLine[]
     */
    public function collection()
    {
        return LanguageLine::all();
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'id',
            'group',
            'key',
            'text',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'language_lines';
    }
}
