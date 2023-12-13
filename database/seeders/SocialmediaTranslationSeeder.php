<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class SocialmediaTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |--------------------------------
        | Title
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'title_socialmedia',
            'text' => [
                'en' => 'Social Media',
                'id' => 'Media Sosial',
                'ar' => 'وسائل التواصل الاجتماعي'
            ]
        ]);

        /*
        |--------------------------------
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'column_icon',
            'text' => [
                'en' => 'Icon',
                'id' => 'Ikon',
                'ar' => 'أيقونة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'column_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'column_url',
            'text' => [
                'en' => 'URL',
                'id' => 'URL',
                'ar' => 'URL'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Add New
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'label_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'placeholder_name',
            'text' => [
                'en' => 'Facebook',
                'id' => 'Facebook',
                'ar' => 'Facebook'
            ]
        ]);

        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'label_url',
            'text' => [
                'en' => 'URL',
                'id' => 'URL',
                'ar' => 'URL'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'placeholder_url',
            'text' => [
                'en' => 'https://www.facebook.com',
                'id' => 'https://www.facebook.com',
                'ar' => 'https://www.facebook.com'
            ]
        ]);

        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'label_icon',
            'text' => [
                'en' => 'Icon',
                'id' => 'Ikon',
                'ar' => 'أيقونة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'placeholder_icon',
            'text' => [
                'en' => 'fas fa-globe',
                'id' => 'fas fa-globe',
                'ar' => 'fas fa-globe'
            ]
        ]);

        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'label_color',
            'text' => [
                'en' => 'Color',
                'id' => 'Warna',
                'ar' => 'اللون'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'placeholder_color',
            'text' => [
                'en' => '#666666',
                'id' => '#666666',
                'ar' => '#666666'
            ]
        ]);

        // Button

        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Add New Social Media',
                'id' => 'Tambah Socila Media',
                'ar' => 'أضف وسائط اجتماعية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'button_update',
            'text' => [
                'en' => 'Update',
                'id' => 'Ubah',
                'ar' => 'تحديث'
            ]
        ]);
        LanguageLine::create([
            'group' => 'socialmedia',
            'key' => 'button_cancel',
            'text' => [
                'en' => 'Cancel',
                'id' => 'Batal',
                'ar' => 'يلغي'
            ]
        ]);
    }
}
