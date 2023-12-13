<?php

namespace Database\Seeders;

use App\Models\SiteSocialmedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSocialmediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSocialmedia::create([
            'socialmedia_id' => 3,
            'name' => 'Retenvi',
            'url' => 'https://www.youtube.com/channel/UCUYm8eLTfJDyHSHBLgFU5Gg'
        ]);

        SiteSocialmedia::create([
            'socialmedia_id' => 4,
            'name' => 'Retenvi',
            'url' => 'https://www.instagram.com/retenvi_'
        ]);
    }
}
