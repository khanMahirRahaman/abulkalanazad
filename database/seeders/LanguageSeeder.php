<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'language' => 'English',
            'language_code' => 'en',
            'country' => 'United States',
            'country_code' =>'US',
            'direction' =>'ltr',
            'active' => 'y',
            'default' => 'y'
        ]);

        Language::create([
            'language' => 'Bahasa Indonesia',
            'language_code' => 'id',
            'country' => 'Indonesia',
            'country_code' =>'ID',
            'direction' =>'ltr',
            'active' => 'y'
        ]);

        Language::create([
            'language' => 'Arabic',
            'language_code' => 'ar',
            'country' => 'Saudi Arabia',
            'country_code' =>'SA',
            'direction' =>'rtl',
            'active' => 'y'
        ]);

        $dataArr = [
            [
                'en' => [
                    'name' => 'English',
                    'script' => 'Latin',
                    'native' => 'English',
                    'regional' => 'en_US'
                ]
            ],
            [
                'id' => [
                    'name' => 'Indonesian',
                    'script' => 'Latin',
                    'native' => 'Bahasa Indonesia',
                    'regional' => 'id_ID'
                ]
            ],
            [
                'ar' => [
                    'name' => 'Arabic',
                    'script' => 'Arab',
                    'native' => 'Arabic',
                    'regional' => 'ar_SA'
                ]
            ]
        ];

        $dataJson = json_encode(Arr::collapse($dataArr), JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

        File::put(storage_path('app/public/file/supportedLocales.json'), trim($dataJson, '[]'));
    }
}
