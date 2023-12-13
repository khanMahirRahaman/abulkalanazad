<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class LocalizationTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |-----------------------
        | === TRANSLATIONS ===
        |-----------------------
        */
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'title_translations',
            'text' => [
                'en' => 'Translations',
                'id' => 'Translasi',
                'ar' => 'الترجمات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'title_addnew_translation',
            'text' => [
                'en' => 'Add New Translation',
                'id' => 'Tambah Translasi Baru',
                'ar' => 'أضف ترجمة جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'title_edit_translation',
            'text' => [
                'en' => 'Edit Translation',
                'id' => 'Ubah Translasi',
                'ar' => 'تحرير الترجمة'
            ]
        ]);

        /*
        |-------------------------------
        | Table
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_create',
            'text' => [
                'en' => 'Create',
                'id' => 'Tambah',
                'ar' => 'خلق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'column_group',
            'text' => [
                'en' => 'Group',
                'id' => 'Grup',
                'ar' => 'مجموعة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'column_key',
            'text' => [
                'en' => 'Key',
                'id' => 'Key',
                'ar' => 'مفتاح'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'column_text',
            'text' => [
                'en' => 'Text',
                'id' => 'Teks',
                'ar' => 'نص'
            ]
        ]);

        /*
        |-------------------------------
        | Form
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'label_group',
            'text' => [
                'en' => 'Group',
                'id' => 'Group',
                'ar' => 'مجموعة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'placeholder_group',
            'text' => [
                'en' => 'Select a group..',
                'id' => 'Pilih Group..',
                'ar' => 'حدد مجموعة ..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'label_key',
            'text' => [
                'en' => 'Key',
                'id' => 'Key',
                'ar' => 'مفتاح'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'placeholder_key',
            'text' => [
                'en' => 'Enter key..',
                'id' => 'Masukkan key..',
                'ar' => 'مفتاح الادخال..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'label_text',
            'text' => [
                'en' => 'Text',
                'id' => 'Teks',
                'ar' => 'نص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'placeholder_text',
            'text' => [
                'en' => 'Enter translation..',
                'id' => 'Masukkan terjemahan..',
                'ar' => 'أدخل الترجمة ..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Save',
                'id' => 'Simpan',
                'ar' => 'يحفظ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_back',
            'text' => [
                'en' => 'Back',
                'id' => 'Kembali',
                'ar' => 'خلف'
            ]
        ]);

        /*
        |-----------------------
        | === LANGUAGES ===
        |-----------------------
        */
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'title_languages',
            'text' => [
                'en' => 'Language',
                'id' => 'Bahasa',
                'ar' => 'لغة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'title_edit_language',
            'text' => [
                'en' => 'Edit Language',
                'id' => 'Edit Bahasa',
                'ar' => 'تحرير اللغة'
            ]
        ]);


        /*
        |-------------------------------
        | Table
        |-------------------------------
        */
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'column_language',
            'text' => [
                'en' => 'Language',
                'id' => 'Bahasa',
                'ar' => 'لغة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'column_country',
            'text' => [
                'en' => 'Country',
                'id' => 'Negara',
                'ar' => 'دولة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'column_active',
            'text' => [
                'en' => 'Active',
                'id' => 'Aktif',
                'ar' => 'نشيط'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_option_yes',
            'text' => [
                'en' => 'Yes',
                'id' => 'Ya',
                'ar' => 'نعم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_option_no',
            'text' => [
                'en' => 'No',
                'id' => 'Tidak',
                'ar' => 'رقم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'column_default',
            'text' => [
                'en' => 'Default',
                'id' => 'Default',
                'ar' => 'تقصير'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_make_default',
            'text' => [
                'en' => 'Make default',
                'id' => 'Buat default',
                'ar' => 'جعل الافتراضي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'badge_default',
            'text' => [
                'en' => 'Default',
                'id' => 'Default',
                'ar' => 'تقصير'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'translations',
            'text' => [
                'en' => 'Translations',
                'id' => 'Terjemahan',
                'ar' => 'الترجمات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_language_submmit',
            'text' => [
                'en' => 'Add new language',
                'id' => 'Tambah bahasa baru',
                'ar' => 'أضف لغة جديدة'
            ]
        ]);

        /*
        |-------------------------------
        | Form
        |-------------------------------
        */
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'label_language',
            'text' => [
                'en' => 'Language',
                'id' => 'Bahasa',
                'ar' => 'لغة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'placeholder_language',
            'text' => [
                'en' => 'Choose a language..',
                'id' => 'Pilih bahasa..',
                'ar' => 'اختر لغة..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'label_country',
            'text' => [
                'en' => 'Country',
                'id' => 'Negara',
                'ar' => 'دولة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'placeholder_country',
            'text' => [
                'en' => 'Choose a country..',
                'id' => 'Pilih negara..',
                'ar' => 'اختر دولة ..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'label_direction',
            'text' => [
                'en' => 'Direction',
                'id' => 'Direksi',
                'ar' => 'اتجاه'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'option_rtl',
            'text' => [
                'en' => 'RTL',
                'id' => 'RTL',
                'ar' => 'RTL'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'option_ltr',
            'text' => [
                'en' => 'LTR',
                'id' => 'LTR',
                'ar' => 'LTR'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'label_active',
            'text' => [
                'en' => 'Active',
                'id' => 'Aktif',
                'ar' => 'نشيط'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'option_active_yes',
            'text' => [
                'en' => 'Yes',
                'id' => 'Ya',
                'ar' => 'نعم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'option_active_no',
            'text' => [
                'en' => 'No',
                'id' => 'Tidak',
                'ar' => 'رقم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_back',
            'text' => [
                'en' => 'Back',
                'id' => 'Kembali',
                'ar' => 'خلف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_language_submit',
            'text' => [
                'en' => 'Add New Language',
                'id' => 'Tambah Baru Bahasa',
                'ar' => 'أضف لغة جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_language_update',
            'text' => [
                'en' => 'Update',
                'id' => 'Ubah',
                'ar' => 'تحديث'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'button_language_cancel',
            'text' => [
                'en' => 'Cancel',
                'id' => 'Batal',
                'ar' => 'يلغي'
            ]
        ]);


        /*
        |-------------------------------
        | Messages
        |-------------------------------
        */
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'msg_default_succeed',
            'text' => [
                'en' => 'Make default successful!',
                'id' => 'Membuat default berhasil!',
                'ar' => 'اجعل التقصير ناجحًا!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'msg_default_language_cannot_be_changed',
            'text' => [
                'en' => 'Default language cannot be changed',
                'id' => 'Bahasa default tidak bisa diubah',
                'ar' => 'لا يمكن تغيير اللغة الافتراضية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'msg_turnoff_default_succeed',
            'text' => [
                'en' => 'Managed to turn off the defaults!',
                'id' => 'Berhasil mematikan default!',
                'ar' => 'تمكنت من إيقاف التخلف عن السداد!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'msg_activated_successfully',
            'text' => [
                'en' => 'Activated successfully!',
                'id' => 'Berhasil diaktifkan!',
                'ar' => 'تم التفعيل بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'localization',
            'key' => 'msg_deactivated_successfully',
            'text' => [
                'en' => 'Deactivated successfully!',
                'id' => 'Berhasil dinonaktifkan!',
                'ar' => 'تم الإلغاء بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'localization',
            'key' => 'msg_name_exists',
            'text' => [
                'en' => 'The language has already been taken.',
                'id' => 'Bahasa sudah ada.',
                'ar' => 'اللغة مأخوذة بالفعل.'
            ]
        ]);
    }
}
