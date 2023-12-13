<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class PostTranslationSeeder extends Seeder
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
            'group' => 'post',
            'key' => 'title_posts',
            'text' => [
                'en' => 'Posts',
                'id' => 'Post',
                'ar' => 'المشاركات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'title_addnew_post',
            'text' => [
                'en' => 'Add New Post',
                'id' => 'Tambah Baru Post',
                'ar' => 'أضف منشور جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'title_edit_post',
            'text' => [
                'en' => 'Edit Post',
                'id' => 'Edit Post',
                'ar' => 'تعديل المنشور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'title_add_post_translation',
            'text' => [
                'en' => 'Add Post Translation',
                'id' => 'Tambah Translasi Post',
                'ar' => 'أضف ترجمة ما بعد'
            ]
        ]);

        /*
        |--------------------------------
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'post',
            'key' => 'title_all_posts',
            'text' => [
                'en' => 'All Posts',
                'id' => 'Semua Post',
                'ar' => 'جميع المشاركات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'column_title',
            'text' => [
                'en' => 'Title',
                'id' => 'Judul',
                'ar' => 'عنوان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'column_author',
            'text' => [
                'en' => 'Author',
                'id' => 'Penulis',
                'ar' => 'مؤلف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'column_category',
            'text' => [
                'en' => 'Category',
                'id' => 'Kategory',
                'ar' => 'فئة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'column_tag',
            'text' => [
                'en' => 'Tag',
                'id' => 'Tag',
                'ar' => 'بطاقة شعار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'column_date',
            'text' => [
                'en' => 'Date',
                'id' => 'Tanggal',
                'ar' => 'تاريخ'
            ]
        ]);

        // BUTTON
        LanguageLine::create([
            'group' => 'post',
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
            'group' => 'post',
            'key' => 'label_title',
            'text' => [
                'en' => 'Title',
                'id' => 'Judul',
                'ar' => 'عنوان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_title',
            'text' => [
                'en' => 'Enter title',
                'id' => 'Masukkan judul',
                'ar' => 'أدخل العنوان'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'button_custom_permalink',
            'text' => [
                'en' => 'Custom Permalink',
                'id' => 'Kustom Permalink',
                'ar' => 'رابط ثابت مخصص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_custom_permalink',
            'text' => [
                'en' => 'Enter slug (if left blank it will be generated automatically)',
                'id' => 'Masukkan slug (jika kosong akan digenerate otomatis)',
                'ar' => 'أدخل سبيكة (إذا تركت فارغة فسيتم إنشاؤها تلقائيًا)'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_summary',
            'text' => [
                'en' => 'Summary',
                'id' => 'Ringkasan',
                'ar' => 'ملخص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_summary',
            'text' => [
                'en' => 'Summary',
                'id' => 'Ringkasan',
                'ar' => 'ملخص'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_content',
            'text' => [
                'en' => 'Content',
                'id' => 'Konten',
                'ar' => 'محتوى'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_content',
            'text' => [
                'en' => 'Write here..',
                'id' => 'Tulis di sini..',
                'ar' => 'اكتب هنا..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_language',
            'text' => [
                'en' => 'Language',
                'id' => 'Bahasa',
                'ar' => 'لغة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_language',
            'text' => [
                'en' => 'Select language',
                'id' => 'Pilih bahasa',
                'ar' => 'اختار اللغة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_translations',
            'text' => [
                'en' => 'Translations',
                'id' => 'Translasi',
                'ar' => 'الترجمات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_categories',
            'text' => [
                'en' => 'Categories',
                'id' => 'Kategori',
                'ar' => 'فئات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_categories',
            'text' => [
                'en' => 'Choose',
                'id' => 'Pilih',
                'ar' => 'يختار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'help_categories',
            'text' => [
                'en' => 'Click or press enter to select',
                'id' => 'Klik atau tekan enter untuk memilih',
                'ar' => 'انقر أو اضغط على إدخال للتحديد'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_add_categories',
            'text' => [
                'en' => 'Add New Category',
                'id' => 'Tambah Baru Kategori',
                'ar' => 'إضافة فئة جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'help_add_new_category',
            'text' => [
                'en' => 'Separate with commas or the Enter key',
                'id' => 'Pisahkan dengan koma atau tekan enter',
                'ar' => 'افصل بفاصلات أو مفتاح الإدخال'
            ]
        ]);


        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_tags',
            'text' => [
                'en' => 'Tags',
                'id' => 'Tags',
                'ar' => 'العلامات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_tags',
            'text' => [
                'en' => 'Add new tag',
                'id' => 'tambah tag',
                'ar' => 'أضف علامة جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'help_tags',
            'text' => [
                'en' => 'Separate with commas or the Enter key',
                'id' => 'Pisahkan dengan koma atau tekan enter',
                'ar' => 'فصل بفاصلات أو مفتاح الإدخال'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_featured_image',
            'text' => [
                'en' => 'Featured Image',
                'id' => 'Gambar Utama',
                'ar' => 'صورة مميزة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_featured_image',
            'text' => [
                'en' => 'Click to upload image',
                'id' => 'Klik unggah gambar',
                'ar' => 'انقر لتحميل الصورة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_meta_description',
            'text' => [
                'en' => 'Meta Description',
                'id' => 'Deskripsi Meta',
                'ar' => 'ميتا الوصف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_meta_description',
            'text' => [
                'en' => 'Enter description post',
                'id' => 'Masukkan deskripsi post',
                'ar' => 'أدخل وصف آخر'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_meta_keyword',
            'text' => [
                'en' => 'Meta Keyword',
                'id' => 'Keyword Meta',
                'ar' => 'كلمة ميتا'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'placeholder_meta_keyword',
            'text' => [
                'en' => 'Enter keyword post',
                'id' => 'Masukkan keyword post',
                'ar' => 'أدخل آخر الكلمة الرئيسية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'card_title_publish',
            'text' => [
                'en' => 'Publish',
                'id' => 'Terbitkan',
                'ar' => 'ينشر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'label_visibility',
            'text' => [
                'en' => 'Visibility',
                'id' => 'Visibilitas',
                'ar' => 'الرؤية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'option_public',
            'text' => [
                'en' => 'Public',
                'id' => 'Publik',
                'ar' => 'عام'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'option_private',
            'text' => [
                'en' => 'Private',
                'id' => 'Pribadi',
                'ar' => 'خاص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'help_public_visibility',
            'text' => [
                'en' => 'Visibile to everyone',
                'id' => 'Terlihat oleh semua orang',
                'ar' => 'مرئي للجميع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
            'key' => 'help_private_visibility',
            'text' => [
                'en' => 'Visible only to the role superadmin, admin, and post owner',
                'id' => 'Terlihat hanya untuk role superadmin, admin, dan publisher',
                'ar' => 'مرئي فقط لدور المشرف المتميز والمسؤول وصاحب المشاركة'
            ]
        ]);

        // BUTTON
        LanguageLine::create([
            'group' => 'post',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Publish',
                'id' => 'Terbitkan',
                'ar' => 'ينشر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'post',
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
            'group' => 'post',
            'key' => 'label_translation',
            'text' => [
                'en' => 'Translation',
                'id' => 'Translasi',
                'ar' => 'ترجمة'
            ]
        ]);

        /*
        |--------------------------------
        | Message
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'post',
            'key' => 'image_upload_successful',
            'text' => [
                'en' => 'Image Upload successful!',
                'id' => 'Unggah gambar berhasil!',
                'ar' => 'تم تحميل الصور بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'file_delete_successfully',
            'text' => [
                'en' => 'File Delete Successfully!',
                'id' => 'File Dihapus Berhasil!',
                'ar' => 'تم حذف الملف بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'post',
            'key' => 'failed_to_delete_file',
            'text' => [
                'en' => 'Failed to delete file!',
                'id' => 'Hapus File Gagal!',
                'ar' => 'فشل حذف الملف!'
            ]
        ]);

    }
}
