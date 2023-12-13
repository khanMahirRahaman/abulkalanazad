<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class ContactTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |-------------------------------
        | Title
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'contact',
            'key' => 'title_contacts',
            'text' => [
                'en' => 'Contacts',
                'id' => 'Kontak',
                'ar' => 'جهات الاتصال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'title_detail_message',
            'text' => [
                'en' => 'Detail Message',
                'id' => 'Pesan Detail',
                'ar' => 'رسالة تفصيلية'
            ]
        ]);

        /*
        |-------------------------------
        | Table
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'contact',
            'key' => 'column_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'column_subject',
            'text' => [
                'en' => 'Subject',
                'id' => 'Subjek',
                'ar' => 'موضوعات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'column_status',
            'text' => [
                'en' => 'Status',
                'id' => 'Status',
                'ar' => 'حالة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'column_date',
            'text' => [
                'en' => 'Date',
                'id' => 'Tanggal',
                'ar' => 'تاريخ'
            ]
        ]);

        /*
        |-------------------------------
        | Detail Message
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'contact',
            'key' => 'name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'email',
            'text' => [
                'en' => 'E-Mail',
                'id' => 'E-Mail',
                'ar' => 'البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'subject',
            'text' => [
                'en' => 'Subject',
                'id' => 'Subyek',
                'ar' => 'موضوعات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'message',
            'text' => [
                'en' => 'Message',
                'id' => 'Pesan',
                'ar' => 'رسالة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'contact',
            'key' => 'date_&_time',
            'text' => [
                'en' => 'Date & Time',
                'id' => 'Tanggal & Jam',
                'ar' => 'التاريخ والوقت'
            ]
        ]);
    }
}
