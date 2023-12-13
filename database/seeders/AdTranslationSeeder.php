<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class AdTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'ad',
            'key' => 'advertisement',
            'text' => [
                'en' => 'Advertisement',
                'id' => 'Iklan',
                'ar' => 'الإعلانات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'create_new_ad_unit',
            'text' => [
                'en' => 'Create new ad unit',
                'id' => 'Membuat unit iklan baru',
                'ar' => 'إنشاء وحدة إعلانية جديدة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'add_new_ad',
            'text' => [
                'en' => 'Add New Ad',
                'id' => 'Menambahkan Iklan Baru',
                'ar' => 'أضف إعلان جديد'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'name_your_ad_unit',
            'text' => [
                'en' => 'Name your ad unit',
                'id' => 'Nama unit iklan',
                'ar' => 'اختر اسمًا لوحدتك الإعلانية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'type',
            'text' => [
                'en' => 'Type',
                'id' => 'Tipe',
                'ar' => 'يكتب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'image',
            'text' => [
                'en' => 'Image',
                'id' => 'Gambar',
                'ar' => 'صورة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'google_adsense',
            'text' => [
                'en' => 'Google Adsense',
                'id' => 'Google Adsense',
                'ar' => 'جوجل ادسنس'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'script_code',
            'text' => [
                'en' => 'Script Code',
                'id' => 'Kode Skrip',
                'ar' => 'كود البرنامج النصي'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'size',
            'text' => [
                'en' => 'Size',
                'id' => 'Ukuran',
                'ar' => 'بحجم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'width',
            'text' => [
                'en' => 'Width',
                'id' => 'Lebar',
                'ar' => 'عرض'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'height',
            'text' => [
                'en' => 'Height',
                'id' => 'Tinggi',
                'ar' => 'ارتفاع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'url',
            'text' => [
                'en' => 'URL',
                'id' => 'URL',
                'ar' => 'URL'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'ad_client',
            'text' => [
                'en' => 'Ad Client',
                'id' => 'Ad Client',
                'ar' => 'عميل الإعلان'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'ad_slot',
            'text' => [
                'en' => 'Ad Slot',
                'id' => 'Ad Slot',
                'ar' => 'شريحة إعلانية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'ad_size',
            'text' => [
                'en' => 'Ad Size',
                'id' => 'Ad Size',
                'ar' => 'حجم الإعلان'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'fixed',
            'text' => [
                'en' => 'Fixed',
                'id' => 'Fixed',
                'ar' => 'مُثَبَّت'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'responsive',
            'text' => [
                'en' => 'Responsive',
                'id' => 'Responsive',
                'ar' => 'متجاوب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'ad_format',
            'text' => [
                'en' => 'Format',
                'id' => 'Format',
                'ar' => 'شكل'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'full_width_responsive',
            'text' => [
                'en' => 'Full width responsive',
                'id' => 'Full width responsive',
                'ar' => 'عرض كامل يستجيب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'ad_custom_code',
            'text' => [
                'en' => 'Ad Custom Code',
                'id' => 'Kode Kustom Iklan',
                'ar' => 'كود الإعلان المخصص'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'using_script_code_custom',
            'text' => [
                'en' => 'Using Script Code Custom',
                'id' => 'Menggunakan kustom kode skrip',
                'ar' => 'استخدام كود البرنامج النصي المخصص'
            ]
        ]);

        LanguageLine::create([
            'group' => 'ad',
            'key' => 'edit_advertisement',
            'text' => [
                'en' => 'Edit Advertisement',
                'id' => 'Ubah Advertisement',
                'ar' => 'تحرير إعلان'
            ]
        ]);
    }
}
