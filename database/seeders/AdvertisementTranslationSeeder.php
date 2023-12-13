<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class AdvertisementTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // AD UNIT

        /*
        |-------------------------------
        | Title
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key'   => 'title_adunit',
            'text'  => [
                'en' => 'Ad Unit',
                'id' => 'Ad Unit',
                'ar' => 'الوحدة الإعلانية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key'   => 'title_addnew_adunit',
            'text' => [
                'en' => 'New Ad Unit',
                'id' => 'Unit Iklan Baru',
                'ar' => 'وحدة إعلانية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key'   => 'title_edit_advertisement',
            'text' => [
                'en' => 'Edit Advertisement',
                'id' => 'Edit Advertisement',
                'ar' => 'تحرير إعلان'
            ]
        ]);

        /*
        |-------------------------------
        | Tabel
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key'   => 'column_name',
            'text'  => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key'   => 'column_size',
            'text' => [
                'en' => 'Size',
                'id' => 'Ukuran',
                'ar' => 'بحجم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key'   => 'column_status',
            'text' => [
                'en' => 'Status',
                'id' => 'Status',
                'ar' => 'حالة'
            ]
        ]);

        /*
        |-------------------------------
        | Form - New Ad Unit
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_name',
            'text' => [
                'en' => 'Name your ad unit',
                'id' => 'Nama unit iklan Anda',
                'ar' => 'اختر اسمًا لوحدتك الإعلانية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_type',
            'text' => [
                'en' => 'Type',
                'id' => 'Jenis',
                'ar' => 'يكتب'
            ]
        ]);

        /* Option Type */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'option_image',
            'text' => [
                'en' => 'Image',
                'id' => 'Gambar',
                'ar' => 'صورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'option_googleadsense',
            'text' => [
                'en' => 'Google Adsense',
                'id' => 'Google Adsense',
                'ar' => 'جوجل ادسنس'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'option_script',
            'text' => [
                'en' => 'Script',
                'id' => 'Script',
                'ar' => 'النصي'
            ]
        ]);

        /* Option Image */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_upload_image',
            'text' => [
                'en' => 'Upload Image',
                'id' => 'Unggah Gambar',
                'ar' => 'تحميل الصور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_upload_image',
            'text' => [
                'en' => 'Choose a file',
                'id' => 'Pilih sebuah file',
                'ar' => 'اختيار ملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'alt_preview_image',
            'text' => [
                'en' => 'Preview Image',
                'id' => 'Gambar Pratinjau',
                'ar' => 'صورة المعاينة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'click_to_select_image',
            'text' => [
                'en' => 'Click to select image',
                'id' => 'Klik untuk memilih gambar',
                'ar' => 'انقر لتحديد الصورة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_adsize',
            'text' => [
                'en' => 'Ad Size',
                'id' => 'Ukuran Iklan',
                'ar' => 'حجم الإعلان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_width',
            'text' => [
                'en' => 'Width',
                'id' => 'Lebar',
                'ar' => 'عرض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_height',
            'text' => [
                'en' => 'Height',
                'id' => 'Tinggi',
                'ar' => 'ارتفاع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_url',
            'text' => [
                'en' => 'URL',
                'id' => 'URL',
                'ar' => 'URL'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_url',
            'text' => [
                'en' => 'https://www.example.com',
                'id' => 'https://www.example.com',
                'ar' => 'https://www.example.com'
            ]
        ]);

        /* Option Google Adsense */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_adclient',
            'text' => [
                'en' => 'Ad Client',
                'id' => 'Klien Iklan',
                 'ar' => 'عميل الإعلان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_adclient',
            'text' => [
                'en' => 'e.g: ca-pub-1234567891234567',
                'id' => 'e.g: ca-pub-1234567891234567',
                 'ar' => 'على سبيل المثال: ca-pub-1234567891234567'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_adslot',
            'text' => [
                'en' => 'Ad Slot',
                'id' => 'Slot Iklan',
                'ar' => 'شريحة إعلانية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_adslot',
            'text' => [
                'en' => 'e.g: 5678912340',
                'id' => 'e.g: 5678912340',
                'ar' => 'على سبيل المثال: 5678912340'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'option_ad_fixed',
            'text' => [
                'en' => 'Ad Fixed',
                'id' => 'Iklan Tetap',
                'ar' => 'الإعلان ثابت'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'option_ad_responsive',
            'text' => [
                'en' => 'Ad Responsive',
                'id' => 'Iklan Responsif',
                'ar' => 'مستجيب للإعلان'
            ]
        ]);

        /* Ad Fixed */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_fixed_width',
            'text' => [
                'en' => 'Width',
                'id' => 'Lebar',
                'ar' => 'عرض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_fixed_height',
            'text' => [
                'en' => 'Height',
                'id' => 'Tinggi',
                'ar' => 'ارتفاع'
            ]
        ]);

         /* Ad Responsive */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_adformat',
            'text' => [
                'en' => 'Ad Format',
                'id' => 'Format Iklan',
                'ar' => 'شكل الإعلان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_adformat',
            'text' => [
                'en' => 'e.g: auto, rectangle, vertical, horizontal or rectangle',
                'id' => 'e.g: auto, rectangle, vertical, horizontal or rectangle',
                'ar' => 'على سبيل المثال: تلقائي أو مستطيل أو عمودي أو أفقي أو مستطيل'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_full_width_responsive',
            'text' => [
                'en' => 'Full width responsive',
                'id' => 'Lebar penuh responsif',
                 'ar' => 'عرض كامل يستجيب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'option_width_responsive_true',
            'text' => [
                'en' => 'True',
                'id' => 'True',
                 'ar' => 'حقيقي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'option_width_responsive_false',
            'text' => [
                'en' => 'False',
                'id' => 'False',
                 'ar' => 'خطأ شنيع'
            ]
        ]);

        /** Script */


        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_ad_custom_code',
            'text' => [
                'en' => 'Ad Custom Code',
                'id' => 'Kode Iklan Kustom',
                 'ar' => 'كود الإعلان المخصص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_ad_custom_code',
            'text' => [
                'en' => '//Using Script Code Custom',
                'id' => '//Menggunakan kode skrip kustom',
                'ar' => '// باستخدام Script Code Custom'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'alt_preview_image',
            'text' => [
                'en' => 'Preview Image',
                'id' => 'Gambar Pratinjau',
                'ar' => 'صورة المعاينة'
            ]
        ]);


        /*
        |-------------------------------
        | Button
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'button_addnew_unit',
            'text' => [
                'en' => 'Create new ad unit',
                'id' => 'Buat unit iklan baru',
                'ar' => 'إنشاء وحدة إعلانية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Create new ad unit',
                'id' => 'Buat unit iklan baru',
                'ar' => 'إنشاء وحدة إعلانية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'button_update',
            'text' => [
                'en' => 'Update',
                'id' => 'Simpan',
                'ar' => 'تحديث'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'button_placement_update',
            'text' => [
                'en' => 'Update',
                'id' => 'Ubah',
                'ar' => 'تحديث'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'button_back',
            'text' => [
                'en' => 'Back',
                'id' => 'Kembali',
                'ar' => 'خلف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'button_change_image',
            'text' => [
                'en' => 'Change Image',
                'id' => 'Ubah Gambar',
                'ar' => 'تغيير الصورة'
            ]
        ]);


        // AD PLACEMENTS

        /*
        |-------------------------------
        | Title
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'title_adplacements',
            'text' => [
                'en' => 'Ad Placements',
                'id' => 'Letak Iklan',
                'ar' => 'مواضع الإعلانات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'title_edit_adplacement',
            'text' => [
                'en' => 'Edit Ad Placement',
                'id' => 'Ubah Ad Placement',
                'ar' => 'تحرير موضع الإعلان'
            ]
        ]);

        /*
        |-------------------------------
        | Table
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'column_ad',
            'text' => [
                'en' => 'Ad',
                'id' => 'Iklan',
                'ar' => 'ميلادي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'column_active',
            'text' => [
                'en' => 'Active',
                'id' => 'Aktif',
                'ar' => 'نشيط'
            ]
        ]);

        /*
        |-------------------------------
        | Form - Edit Ad Placement
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_placement',
            'text' => [
                'en' => 'Ad Placement',
                'id' => 'Penempatan Iklan',
                'ar' => 'موضع الإعلان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_placement',
            'text' => [
                'en' => 'Ad Placement name',
                'id' => 'Nama penempatan iklan',
                'ar' => 'اسم موضع الإعلان'
            ]
        ]);

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'label_adunit',
            'text' => [
                'en' => 'Ad Unit',
                'id' => 'Unit Iklan',
                'ar' => 'الوحدة الإعلانية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'placeholder_adunit',
            'text' => [
                'en' => 'Select Ad Unit',
                'id' => 'Pilih Unit Iklan',
                'ar' => 'حدد الوحدة الإعلانية'
            ]
        ]);

        /*
        |-------------------------------
        | Notifications
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'message_changed_successfully',
            'text' => [
                'en' => 'Status change successfully!',
                'id' => 'Status berhasil diubah!',
                'ar' => 'تم تغيير الحالة بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'message_slot_already_taken',
            'text' => [
                'en' => 'Ad Slot has already been taken!',
                'id' => 'Slot Iklan sudah ada!',
                'ar' => 'لقد تم بالفعل استخدام الشريحة الإعلانية!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'message_disabled_successfully',
            'text' => [
                'en' => 'Disabled successfully!',
                'id' => 'Berhasil dinonaktifkan!',
                'ar' => 'تم تعطيله بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'advertisement',
            'key' => 'message_activated_successfully',
            'text' => [
                'en' => 'Activated successfully!',
                'id' => 'Berhasil diaktifkan!',
                'ar' => 'تم التفعيل بنجاح!'
            ]
        ]);
    }
}
