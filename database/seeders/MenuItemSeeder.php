<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->insertOrIgnore([
            // header
            // english
            [
                'id' => '1',
                'label' => 'Home',
                'link' => '/',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '2',
                'label' => 'News',
                'link' => '/category/news',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '3',
                'label' => 'Tech',
                'link' => '/category/technology',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '4',
                'label' => 'About',
                'link' => '/page/about',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '5',
                'label' => 'Contact',
                'link' => '/contact',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // header
            // indonesia

            [
                'id' => '6',
                'label' => 'Beranda',
                'link' => '/',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '7',
                'label' => 'Berita',
                'link' => '/category/berita',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '8',
                'label' => 'Teknologi',
                'link' => '/category/teknologi',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '9',
                'label' => 'Tentang',
                'link' => '/page/tentang',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '10',
                'label' => 'Kontak',
                'link' => '/kontak',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // header
            // arabic

            [
                'id' => '11',
                'label' => 'مسكن',
                'link' => '/',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '12',
                'label' => 'أخبار',
                'link' => '/category/akhb-r',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '13',
                'label' => 'تقنية',
                'link' => '/category/tkny',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '14',
                'label' => 'حول',
                'link' => '/page/hol',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '15',
                'label' => 'اتصال',
                'link' => '/ts-l',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 1,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            

            // footer
            // english

            [
                'id' => '16',
                'label' => 'Home',
                'link' => '/',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '17',
                'label' => 'Contact',
                'link' => '/contact',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '18',
                'label' => 'About',
                'link' => '/page/about',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 1,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // footer
            // indonesia

            [
                'id' => '19',
                'label' => 'Beranda',
                'link' => '/',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '20',
                'label' => 'Kontak',
                'link' => '/kontak',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '21',
                'label' => 'Tentang',
                'link' => '/page/tentang',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 2,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            // footer
            // arabic

            [
                'id' => '22',
                'label' => 'مسكن',
                'link' => '/',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '23',
                'label' => 'اتصال',
                'link' => '/ts-l',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => '24',
                'label' => 'حول',
                'link' => '/page/hol',
                'parent' => 0,
                'sort' => 0,
                'menu_id' => 2,
                'language' => 3,
                'depth' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
