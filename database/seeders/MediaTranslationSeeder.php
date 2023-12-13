<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class MediaTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'media',
            'key' => 'title_filemanager',
            'text' => [
                'en' => 'Filemanager',
                'id' => 'Manajer File',
                'ar' => 'مدير الملفات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'title_galleries',
            'text' => [
                'en' => 'Galleries',
                'id' => 'Galeri',
                'ar' => 'صالات العرض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'title_edit_gallery',
            'text' => [
                'en' => 'Edit Gallery',
                'id' => 'Edit Galeri',
                'ar' => 'تحرير المعرض'
            ]
        ]);

        /*
        |-------------------------------
        | Table
        |-------------------------------
        */
        LanguageLine::create([
            'group' => 'media',
            'key' => 'column_file',
            'text' => [
                'en' => 'File',
                'id' => 'File',
                'ar' => 'ملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'column_author',
            'text' => [
                'en' => 'Author',
                'id' => 'Penulis',
                'ar' => 'مؤلف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'column_author',
            'text' => [
                'en' => 'Author',
                'id' => 'Penulis',
                'ar' => 'مؤلف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'column_type',
            'text' => [
                'en' => 'Type',
                'id' => 'Jenis',
                'ar' => 'يكتب'
            ]
        ]);

        /*
        |-------------------------------
        | Form
        |-------------------------------
        */
        LanguageLine::create([
            'group' => 'media',
            'key' => 'label_file_input',
            'text' => [
                'en' => 'File Input',
                'id' => 'Input File',
                'ar' => 'إدخال الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'placeholder_file_input',
            'text' => [
                'en' => 'Choose File..',
                'id' => 'Pilih File..',
                'ar' => 'اختر ملف..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'media',
            'key' => 'button_browse_file',
            'text' => [
                'en' => 'Browse File',
                'id' => 'Cari File',
                'ar' => 'ملف الاستعراض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'button_upload_submit',
            'text' => [
                'en' => 'Upload',
                'id' => 'Unggah',
                'ar' => 'تحميل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'label_gallery_title',
            'text' => [
                'en' => 'Title',
                'id' => 'Judul',
                'ar' => 'عنوان'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'placeholder_title',
            'text' => [
                'en' => 'Enter Title..',
                'id' => 'Masukkan Judul..',
                'ar' => 'أدخل العنوان..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'label_alternative_text',
            'text' => [
                'en' => 'Alternative Text',
                'id' => 'Teks Alternatif',
                'ar' => 'نص بديل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'placeholder_alternative_text',
            'text' => [
                'en' => 'Enter Alternative Text..',
                'id' => 'Masukkan Teks Alternatif..',
                'ar' => 'أدخل نصا بديلا ..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'label_caption',
            'text' => [
                'en' => 'Caption',
                'id' => 'Keterangan',
                'ar' => 'شرح'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'placeholder_caption',
            'text' => [
                'en' => 'Enter Caption..',
                'id' => 'Masukkan Keterangan..',
                'ar' => 'أدخل التعليق..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'label_description',
            'text' => [
                'en' => 'Description',
                'id' => 'Deskripsi',
                'ar' => 'وصف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'placeholder_description',
            'text' => [
                'en' => 'Enter Description..',
                'id' => 'Masukkan Deskripsi..',
                'ar' => 'أدخل الوصف..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'chd_file_information',
            'text' => [
                'en' => 'File Information',
                'id' => 'Informasi File',
                'ar' => 'معلومات الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'uploaded_on',
            'text' => [
                'en' => 'Uploaded On',
                'id' => 'Diunggah Pada',
                'ar' => 'تم الرفع في'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'fileurl',
            'text' => [
                'en' => 'File URL',
                'id' => 'URL File',
                'ar' => 'URL الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'filename',
            'text' => [
                'en' => 'File Name',
                'id' => 'Nama File',
                'ar' => 'اسم الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'filetype',
            'text' => [
                'en' => 'File Type',
                'id' => 'Tipe File',
                'ar' => 'نوع الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'filetype',
            'text' => [
                'en' => 'File Type',
                'id' => 'Tipe File',
                'ar' => 'نوع الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'filesize',
            'text' => [
                'en' => 'File Size',
                'id' => 'Ukuran File',
                'ar' => 'حجم الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'dimension',
            'text' => [
                'en' => 'Dimension',
                'id' => 'Dimensi',
                'ar' => 'البعد'
            ]
        ]);


        LanguageLine::create([
            'group' => 'media',
            'key' => 'button_gallery_submit',
            'text' => [
                'en' => 'Upload',
                'id' => 'Unggah',
                'ar' => 'تحميل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'media',
            'key' => 'button_gallery_update',
            'text' => [
                'en' => 'Update',
                'id' => 'Ubah',
                'ar' => 'تحديث'
            ]
        ]);
    }
}
