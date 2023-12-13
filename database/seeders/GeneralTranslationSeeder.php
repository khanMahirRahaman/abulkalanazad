<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class GeneralTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'general',
            'key' => 'are_you_sure',
            'text' => [
                'en' => 'Are you sure?',
                'id' => 'Apakah kamu yakin?',
                'ar' => 'هل أنت واثق؟'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'you_wont_be_able_to_revert_this',
            'text' => [
                'en' => 'You won\'t be able to revert this!',
                'id' => 'Anda tidak akan dapat mengembalikan ini!',
                'ar' => 'لن تتمكن من التراجع عن هذا!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'yes_delete_it',
            'text' => [
                'en' => 'Yes, delete it!',
                'id' => 'Yes, delete it!',
                'ar' => 'نعم ، احذفها!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'action',
            'text' => [
                'en' => 'Action',
                'id' => 'Aksi',
                'ar' => 'عمل'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'active',
            'text' => [
                'en' => 'Active',
                'id' => 'Aktif',
                'ar' => 'نشيط'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'add_new',
            'text' => [
                'en' => 'Add New',
                'id' => 'Tambah baru',
                'ar' => 'اضف جديد'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'back',
            'text' => [
                'en' => 'Back',
                'id' => 'Kembali',
                'ar' => 'خلف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'close',
            'text' => [
                'en' => 'Close',
                'id' => 'Tutup',
                'ar' => 'قريب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'default',
            'text' => [
                'en' => 'Default',
                'id' => 'Default',
                'ar' => 'تقصير'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'delete',
            'text' => [
                'en' => 'Delete',
                'id' => 'Hapus',
                'ar' => 'حذف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'edit',
            'text' => [
                'en' => 'Edit',
                'id' => 'Ubah',
                'ar' => 'يحرر'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'save',
            'text' => [
                'en' => 'Save',
                'id' => 'simpan',
                'ar' => 'يحفظ'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'languages',
            'text' => [
                'en' => 'Languages',
                'id' => 'Bahasa',
                'ar' => 'اللغات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'no',
            'text' => [
                'en' => 'No',
                'id' => 'Tidak',
                'ar' => 'رقم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'save',
            'text' => [
                'en' => 'Save',
                'id' => 'Simpan',
                'ar' => 'يحفظ'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'save_changes',
            'text' => [
                'en' => 'Save Changes',
                'id' => 'Simpan perubahan',
                'ar' => 'حفظ التغييرات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'update',
            'text' => [
                'en' => 'Update',
                'id' => 'Ubah',
                'ar' => 'تحديث'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'yes',
            'text' => [
                'en' => 'Yes',
                'id' => 'Ya',
                'ar' => 'نعم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'placeholder_image_upload',
            'text' => [
                'en' => 'Click to upload image',
                'id' => 'Pilih untuk uggah gambar',
                'ar' => 'انقر لتحميل الصورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'preview_image',
            'text' => [
                'en' => 'Preview Image',
                'id' => 'Gambar pratinjau',
                'ar' => 'صورة المعاينة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'remove_image',
            'text' => [
                'en' => 'Remove Image',
                'id' => 'Hapus Gambar',
                'ar' => 'إزالة الصورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'choose_a_file',
            'text' => [
                'en' => 'Choose a file',
                'id' => 'Pilih file',
                'ar' => 'اختيار ملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'breadcrumb_add_new',
            'text' => [
                'en' => 'Add New',
                'id' => 'Tambah Baru',
                'ar' => 'اضف جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'breadcrumb_edit',
            'text' => [
                'en' => 'Edit',
                'id' => 'Ubah',
                'ar' => 'يحرر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'breadcrumb_translation',
            'text' => [
                'en' => 'Translation',
                'id' => 'Translasi',
                'ar' => 'ترجمة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'resending',
            'text' => [
                'en' => 'Resending',
                'id' => 'Kirim Kembali',
                'ar' => 'إعادة الإرسال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'loading',
            'text' => [
                'en' => 'Loading',
                'id' => 'Memuat',
                'ar' => 'جار التحميل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'sending',
            'text' => [
                'en' => 'Sending',
                'id' => 'Mengirim',
                'ar' => 'إرسال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'general',
            'key' => 'cancel',
            'text' => [
                'en' => 'Cancel',
                'id' => 'Batal',
                'ar' => 'يلغي'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'done',
            'text' => [
                'en' => 'Done',
                'id' => 'Selesai',
                'ar' => 'فعله'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'success',
            'text' => [
                'en' => 'Success',
                'id' => 'Berhasil',
                'ar' => 'النجاح'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'deleting',
            'text' => [
                'en' => 'Deleting',
                'id' => 'Menghapus',
                'ar' => 'حذف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'please_select_at_least_one_checkbox',
            'text' => [
                'en' => 'Please select at least one checkbox',
                'id' => 'Harap pilih setidaknya satu kotak centang',
                'ar' => 'الرجاء تحديد خانة اختيار واحدة على الأقل'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'authorize',
            'text' => [
                'en' => 'Authorize!',
                'id' => 'Mengizinkan!',
                'ar' => 'تفويض!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'deleted',
            'text' => [
                'en' => 'Deleted!',
                'id' => 'Dihapus!!',
                'ar' => 'تم الحذف!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'general',
            'key' => 'title_all_translations',
            'text' => [
                'en' => 'All Translations',
                'id' => 'Semua Translasi',
                'ar' => 'كل الترجمات'
            ]
        ]);
    }
}
