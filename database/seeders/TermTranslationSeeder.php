<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class TermTranslationSeeder extends Seeder
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
            'group' => 'term',
            'key' => 'title_categories',
            'text' => [
                'en' => 'Categories',
                'id' => 'Kategori',
                'ar' => 'فئات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'title_tags',
            'text' => [
                'en' => 'Tags',
                'id' => 'Tag',
                'ar' => 'العلامات'
            ]
        ]);

        /*
        |--------------------------------
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'term',
            'key' => 'title_all_categories',
            'text' => [
                'en' => 'All Categories',
                'id' => 'Semua Kategori',
                'ar' => 'جميع الفئات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'term',
            'key' => 'title_all_tags',
            'text' => [
                'en' => 'All Tags',
                'id' => 'Semua Tag',
                'ar' => 'كل العلامات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'term',
            'key' => 'column_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'column_slug',
            'text' => [
                'en' => 'Slug',
                'id' => 'Slug',
                'ar' => 'سبيكة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'column_image',
            'text' => [
                'en' => 'Image',
                'id' => 'Gambar',
                'ar' => ''
            ]
        ]);

        /*
        |--------------------------------
        | Form - Add New
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'term',
            'key' => 'label_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'placeholder_name',
            'text' => [
                'en' => 'Enter Name..',
                'id' => 'Masukkan Nama..',
                'ar' => 'أدخل الاسم..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'label_parent',
            'text' => [
                'en' => 'Parent Category',
                'id' => 'Kategori Parent',
                'ar' => ''
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'placeholder_parent',
            'text' => [
                'en' => 'Select Parent..',
                'id' => 'Pilih Parent..',
                'ar' => 'القسم الرئيسي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'label_description',
            'text' => [
                'en' => 'Description',
                'id' => 'Deskripsi',
                'ar' => 'وصف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'placeholder_description',
            'text' => [
                'en' => 'Enter description..',
                'id' => 'Masukkan deskripsi..',
                'ar' => 'أدخل الوصف..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'label_image',
            'text' => [
                'en' => 'Image',
                'id' => 'Gambar',
                'ar' => 'صورة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'term',
            'key' => 'button_add_translation',
            'text' => [
                'en' => 'Add Translation',
                'id' => 'Tambah Translasi',
                'ar' => 'أضف ترجمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'button_hide_translation',
            'text' => [
                'en' => 'Hide Translation',
                'id' => 'Sembunyikan Translasi',
                'ar' => 'إخفاء الترجمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'button_category_submit',
            'text' => [
                'en' => 'Add New Category',
                'id' => 'Tambah Baru Kategori',
                'ar' => 'إضافة فئة جديدة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'term',
            'key' => 'button_tag_submit',
            'text' => [
                'en' => 'Add New Tag',
                'id' => 'Tambah Baru Tag',
                'ar' => 'أضف علامة جديدة'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Edit
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'term',
            'key' => 'button_category_update',
            'text' => [
                'en' => 'Update Category',
                'id' => 'Ubah Kategori',
                'ar' => 'تحديث الفئة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'button_tag_update',
            'text' => [
                'en' => 'Update Tag',
                'id' => 'Ubah Tag',
                'ar' => 'تحديث العلامة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'term',
            'key' => 'button_cancel',
            'text' => [
                'en' => 'Cancel',
                'id' => 'Batal',
                'ar' => 'يلغي'
            ]
        ]);

        /*
        |--------------------------------
        | Messages
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'term',
            'key' => 'message_name_exists',
            'text' => [
                'en' => 'The name has already been taken.',
                'id' => 'Nama sudah ada.',
                'ar' => 'الاسم مأخوذ بالفعل.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'term',
            'key' => 'message_name_required',
            'text' => [
                'en' => 'The name field is required.',
                'id' => 'Nama wajib diisi.',
                'ar' => 'حقل الاسم مطلوب.'
            ]
        ]);
    }
}
