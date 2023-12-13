<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class AppearanceTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        ----------------------
            == THEMES ==
        ----------------------
        */

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'title_themes',
            'text' => [
                'en' => 'Themes',
                'id' => 'Tema',
                'ar' => 'ثيمات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'title_theme_information',
            'text' => [
                'en' => 'Theme Information',
                'id' => 'Informasi Tema',
                'ar' => 'معلومات الموضوع'
            ]
        ]);


        /*
        |-------------------------------
        | Modal
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'theme_information',
            'text' => [
                'en' => 'Theme Information',
                'id' => 'Informasi Tema',
                'ar' => 'معلومات الموضوع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'theme_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'theme_version',
            'text' => [
                'en' => 'Version',
                'id' => 'Versi',
                'ar' => 'إصدار'
            ]
        ]);

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'theme_author',
            'text' => [
                'en' => 'Author',
                'id' => 'Pembuat',
                'ar' => 'مؤلف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'theme_author_uri',
            'text' => [
                'en' => 'Author URI',
                'id' => 'URI Pembuat',
                'ar' => 'المؤلف uri'
            ]
        ]);

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'theme_uri',
            'text' => [
                'en' => 'Theme URI',
                'id' => 'URI Tema',
                'ar' => 'عنوان URI للموضوع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'theme_license',
            'text' => [
                'en' => 'License',
                'id' => 'Lisensi',
                'ar' => 'رخصة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'button_close',
            'text' => [
                'en' => 'Close',
                'id' => 'Tutup',
                'ar' => 'قريب'
            ]
        ]);

        /*
        |-------------------------------
        | Tooltip
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'tooltip_activate',
            'text' => [
                'en' => 'Activate',
                'id' => 'Mengaktifkan',
                'ar' => 'تفعيل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'tooltip_info',
            'text' => [
                'en' => 'Info',
                'id' => 'Info',
                'ar' => 'معلومات'
            ]
        ]);


        /*
        ----------------------
            == MENU ==
        ----------------------
        */
        LanguageLine::create([
            'group' => 'appearance',
            'key' => 'title_menu',
            'text' => [
                'en' => 'Menu',
                'id' => 'Menu',
                'ar' => 'قائمة الطعام'
            ]
        ]);
    }
}
