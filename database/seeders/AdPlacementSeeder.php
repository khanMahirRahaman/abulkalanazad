<?php

namespace Database\Seeders;

use App\Models\AdPlacement;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdPlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdPlacement::create([
            'name'   => 'sidebar-right-top',
            'slug'   => 'sidebar-right-top',
            'unit'   => 1,
            'active' => 'y'
        ]);

        AdPlacement::create([
            'name'   => 'sidebar-right-bottom',
            'slug'   => 'sidebar-right-bottom',
            'unit'   => 1,
            'active' => 'y'
        ]);

        AdPlacement::create([
            'name'   => 'sidebar-left-top',
            'slug'   => 'sidebar-left-top',
            'unit'   => 1,
            'active' => 'y'
        ]);

        AdPlacement::create([
            'name'   => 'sidebar-left-bottom',
            'slug'   => 'sidebar-left-bottom',
            'unit'   => 1,
            'active' => 'y'
        ]);

        AdPlacement::create([
            'name'   => 'home-horizontal',
            'slug'   => 'home-horizontal',
            'unit'   => 2,
            'active' => 'y'
        ]);
    }
}
