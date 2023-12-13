<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class PageTranslationSeeder extends Seeder
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
            'group' => 'page',
            'key' => 'title_pages',
            'text' => [
                'en' => 'Pages',
                'id' => 'Halaman',
                'ar' => 'الصفحات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'title_addnew_page',
            'text' => [
                'en' => 'Add New Page',
                'id' => 'Tambah Page Baru',
                'ar' => 'أضف صفحة جديدة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'title_add_page_translation',
            'text' => [
                'en' => 'Add Page Translation',
                'id' => 'Tambah Translasi Halaman',
                'ar' => 'أضف ترجمة الصفحة'
            ]
        ]);

        /*
        |--------------------------------
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'page',
            'key' => 'title_all_pages',
            'text' => [
                'en' => 'All Pages',
                'id' => 'Semua Halaman',
                'ar' => 'كل الصفحات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'column_title',
            'text' => [
                'en' => 'Title',
                'id' => 'Judul',
                'ar' => 'عنوان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'column_slug',
            'text' => [
                'en' => 'Slug',
                'id' => 'Slug',
                'ar' => 'سبيكة'
            ]
        ]);
        // BUTTON
        LanguageLine::create([
            'group' => 'page',
            'key' => 'button_create',
            'text' => [
                'en' => 'Create',
                'id' => 'Buat Baru',
                'ar' => 'خلق'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Add New
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_title',
            'text' => [
                'en' => 'Title',
                'id' => 'Judul',
                'ar' => 'عنوان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_title',
            'text' => [
                'en' => 'Enter title',
                'id' => 'Masukkan judul',
                'ar' => 'أدخل العنوان'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'button_custom_permalink',
            'text' => [
                'en' => 'Custom Permalink',
                'id' => 'Kustom Permalink',
                'ar' => 'رابط ثابت مخصص'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_summary',
            'text' => [
                'en' => 'Summary',
                'id' => 'Ringkasan',
                'ar' => 'ملخص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_summary',
            'text' => [
                'en' => 'Summary',
                'id' => 'Ringkasan',
                'ar' => 'ملخص'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_custom_permalink',
            'text' => [
                'en' => 'Enter permalink',
                'id' => 'Masukkan permalink',
                'ar' => 'أدخل الرابط الثابت'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_content',
            'text' => [
                'en' => 'Content',
                'id' => 'Konten',
                'ar' => 'محتوى'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_content',
            'text' => [
                'en' => 'Write here..',
                'id' => 'Tulis di sini..',
                'ar' => 'اكتب هنا..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_featured_image',
            'text' => [
                'en' => 'Featured Image',
                'id' => 'Gambar Utama',
                'ar' => 'صورة مميزة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_featured_image',
            'text' => [
                'en' => 'Click to upload image',
                'id' => 'Klik unggah gambar',
                'ar' => 'انقر لتحميل الصورة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_meta_description',
            'text' => [
                'en' => 'Meta Description',
                'id' => 'Deskripsi Meta',
                'ar' => 'ميتا الوصف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_meta_description',
            'text' => [
                'en' => 'Enter description post',
                'id' => 'Masukkan deskripsi post',
                'ar' => 'أدخل وصف آخر'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_meta_keyword',
            'text' => [
                'en' => 'Meta Keyword',
                'id' => 'Keyword Meta',
                'ar' => 'كلمة ميتا'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_meta_keyword',
            'text' => [
                'en' => 'Enter keyword post',
                'id' => 'Masukkan keyword post',
                'ar' => 'أدخل آخر الكلمة الرئيسية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'card_title_publish',
            'text' => [
                'en' => 'Publish',
                'id' => 'Terbitkan',
                'ar' => 'ينشر'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_language',
            'text' => [
                'en' => 'Language',
                'id' => 'Bahasa',
                'ar' => 'لغة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'placeholder_language',
            'text' => [
                'en' => 'Select language',
                'id' => 'Pilih bahasa',
                'ar' => 'اختار اللغة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_translation',
            'text' => [
                'en' => 'Translation',
                'id' => 'Translasi',
                'ar' => 'ترجمة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'label_visibility',
            'text' => [
                'en' => 'Visibility',
                'id' => 'Visibilitas',
                'ar' => 'الرؤية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'option_public',
            'text' => [
                'en' => 'Public',
                'id' => 'Publik',
                'ar' => 'عام'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'option_private',
            'text' => [
                'en' => 'Private',
                'id' => 'Pribadi',
                'ar' => 'خاص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'help_public_visibility',
            'text' => [
                'en' => 'Visibile to everyone',
                'id' => 'Terlihat oleh semua orang',
                'ar' => 'مرئي للجميع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'help_private_visibility',
            'text' => [
                'en' => 'Visible only to the role superadmin, admin, and post owner',
                'id' => 'Terlihat hanya untuk role superadmin, admin, dan publisher',
                'ar' => 'مرئي فقط لدور المشرف المتميز والمسؤول وصاحب المشاركة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'page',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Publish',
                'id' => 'Terbitkan',
                'ar' => 'ينشر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'page',
            'key' => 'button_save_draft',
            'text' => [
                'en' => 'Save as draft',
                'id' => 'Simpan sebagai draft',
                'ar' => 'حفظ كمسودة'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Edit
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'page',
            'key' => 'title_edit_page',
            'text' => [
                'en' => 'Edit Page',
                'id' => 'Edit Halaman',
                'ar' => 'تعديل الصفحة'
            ]
        ]);
    }
}
