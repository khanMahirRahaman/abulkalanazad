<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class AnalyticsTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'title_google_analytics',
            'text' => [
                'en' => 'Google Analytics',
                'id' => 'Google Analytics',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'link_see_more',
            'text' => [
                'en' => 'See More',
                'id' => 'Lihat lebih lanjut',
            ]
        ]);

        /*
        |-------------------------------
        | Sessions by device
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'title_sessions_by_device',
            'text' => [
                'en' => 'Sessions by Device',
                'id' => 'Sessions by Device',
            ]
        ]);

        /*
        |-------------------------------
        | Visitor & PageView
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'title_visitor_&_pageview',
            'text' => [
                'en' => 'Visitor & Pageview',
                'id' => 'Visitor & Pageview',
            ]
        ]);

        /*
        |-------------------------------
        | Most Visited Pages
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'title_most_visited_pages',
            'text' => [
                'en' => 'Most Visited Pages',
                'id' => 'Halaman Paling Banyak Dikunjungi',
            ]
        ]);

        /*
        |-------------------------------
        | Browser used by Users
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'title_browser_used_by_users',
            'text' => [
                'en' => 'Browser used by users',
                'id' => 'Browser used by users',
            ]
        ]);

        /*
        |-------------------------------
        | Operating System used by Users
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'title_operating_system_used_by_users',
            'text' => [
                'en' => 'Operating System used by users',
                'id' => 'Operating System used by users',
            ]
        ]);

        /*
        |-------------------------------
        | Sessions by country
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'title_sessions_by_country',
            'text' => [
                'en' => 'Sessions by country',
                'id' => 'Sessions by country',
            ]
        ]);

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'pageviews',
            'text' => [
                'en' => 'PAGEVIEWS',
                'id' => 'PAGEVIEWS',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'visitors',
            'text' => [
                'en' => 'VISITORS',
                'id' => 'VISITORS',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'today',
            'text' => [
                'en' => 'In Today',
                'id' => 'Hari Ini',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'yesterday',
            'text' => [
                'en' => 'In Yesterday',
                'id' => 'Kemarin',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => '7_days',
            'text' => [
                'en' => 'In 7 days',
                'id' => 'Dalam 7 Hari',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => '28_days',
            'text' => [
                'en' => 'In 28 days',
                'id' => 'Dalam 28 Hari',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => '90_days',
            'text' => [
                'en' => 'In 90 days',
                'id' => 'Dalam 90 Hari',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'last_7_days',
            'text' => [
                'en' => 'Last 7 days',
                'id' => '7 hari terkhir',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'last_28_days',
            'text' => [
                'en' => 'Last 28 days',
                'id' => '28 hari terakhir',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'last_90_days',
            'text' => [
                'en' => 'Last 90 days',
                'id' => '90 hari terakhir',
            ]
        ]);

        /*
        |-------------------------------
        | Table
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'column_browser',
            'text' => [
                'en' => 'Browser',
                'id' => 'Browser',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'column_sessions',
            'text' => [
                'en' => 'Sessions',
                'id' => 'Sesi',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'column_country',
            'text' => [
                'en' => 'Country',
                'id' => 'Negara',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'column_operating_system',
            'text' => [
                'en' => 'Operating System',
                'id' => 'Sistem Operasi',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'column_version',
            'text' => [
                'en' => 'Version',
                'id' => 'Versi',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'column_page',
            'text' => [
                'en' => 'Page',
                'id' => 'Halaman',
            ]
        ]);
        LanguageLine::create([
            'group' => 'analytics',
            'key' => 'column_pageviews',
            'text' => [
                'en' => 'Pageviews',
                'id' => 'Tampilan Halaman',
            ]
        ]);
    }
}
