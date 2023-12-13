<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class EnvTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | Navigation
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview',
            'text' => [
                'en' => 'Overview',
                'id' => 'Ikhtisar',
                'ar' => 'ملخص'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'addnew',
            'text' => [
                'en' => 'Add New',
                'id' => 'Tambah Baru',
                'ar' => 'اضف جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backups',
            'text' => [
                'en' => 'Backups',
                'id' => 'Cadangan',
                'ar' => 'النسخ الاحتياطية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'upload',
            'text' => [
                'en' => 'Upload',
                'id' => 'Unggah',
                'ar' => 'تحميل'
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | Title
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'title',
            'text' => [
                'en' => '.env-Editor',
                'id' => '.env-Editor',
                'ar' => '.env-Editor'
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | View overview
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_title',
            'text' => [
                'en' => 'Your current .env-file',
                'id' => 'File .env anda saat ini',
                'ar' => 'ملفك الحالي .env'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_text',
            'text' => [
                'en' => 'Here you can see the content of your current active .env.<br>Click <strong>load</strong> to show the content.',
                'id' => 'Di sini Anda dapat melihat konten .env.<br>aktif Anda saat ini<br>Klik <strong>muat</strong> untuk menampilkan konten.',
                'ar' => 'هنا يمكنك مشاهدة محتوى .env النشط الحالي الخاص بك ، انقر فوق تحميل لإظهار المحتوى.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_button',
            'text' => [
                'en' => 'Load',
                'id' => 'Memuat',
                'ar' => 'حمل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_table_key',
            'text' => [
                'en' => 'Key',
                'id' => 'Key',
                'ar' => 'مفتاح'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_table_value',
            'text' => [
                'en' => 'Value',
                'id' => 'Value',
                'ar' => 'قيمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_table_options',
            'text' => [
                'en' => 'Options',
                'id' => 'Pilihan',
                'ar' => 'خيارات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_table_popover_edit',
            'text' => [
                'en' => 'Edit entry',
                'id' => 'Edit entri',
                'ar' => 'تحرير دخول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_table_popover_delete',
            'text' => [
                'en' => 'Delete entry',
                'id' => 'Hapus entri',
                'ar' => 'حذف المدخلات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_delete_modal_text',
            'text' => [
                'en' => 'Do you really want to delete this entry?',
                'id' => 'Apakah Anda benar-benar ingin menghapus entri ini?',
                'ar' => 'هل تريد حقًا حذف هذا الإدخال؟'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_delete_modal_yes',
            'text' => [
                'en' => 'Yes, delete entry',
                'id' => 'Ya, hapus entri',
                'ar' => 'نعم ، احذف الإدخال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_delete_modal_no',
            'text' => [
                'en' => 'No, quit',
                'id' => 'Tidak, keluar',
                'ar' => 'لا ، استقال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_edit_modal_title',
            'text' => [
                'en' => 'Edit entry',
                'id' => 'Edit entri',
                'ar' => 'تحرير دخول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_edit_modal_save',
            'text' => [
                'en' => 'Save',
                'id' => 'Simpan',
                'ar' => 'حفظ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_edit_modal_quit',
            'text' => [
                'en' => 'Abort',
                'id' => 'Gagal',
                'ar' => 'إجهاض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_edit_modal_value',
            'text' => [
                'en' => 'New value',
                'id' => 'Value Baru',
                'ar' => 'قيمة جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'overview_edit_modal_key',
            'text' => [
                'en' => 'Key',
                'id' => 'Key',
                'ar' => 'مفتاح'
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | View add new
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'addnew_title',
            'text' => [
                'en' => 'Add new key-value-pair',
                'id' => 'Tambahkan pasangan nilai kunci baru',
                'ar' => 'إضافة زوج جديد وقيمة مفتاح'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'addnew_text',
            'text' => [
                'en' => 'Here you can add a new key-value-pair to your <strong>current</strong> .env-file.<br>To be sure, create a backup before under the backup-tab.',
                'id' => 'Di sini Anda dapat menambahkan pasangan nilai kunci baru ke file .env Anda <strong>saat ini</strong>.<br>Untuk memastikannya, buat cadangan sebelum di bawah tab cadangan.',
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'addnew_label_key',
            'text' => [
                'en' => 'Key',
                'id' => 'Key',
                'ar' => 'مفتاح'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'addnew_label_value',
            'text' => [
                'en' => 'Value',
                'id' => 'Value',
                'ar' => 'قيمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'addnew_button_add',
            'text' => [
                'en' => 'Add',
                'id' => 'Menambahkan',
                'ar' => 'يضيف'
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | View backup
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_title_one',
            'text' => [
                'en' => 'Save your current .env-file',
                'id' => 'Simpan file .env Anda saat ini',
                'ar' => 'احفظ ملف .env الحالي الخاص بك'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_create',
            'text' => [
                'en' => 'Create Backup',
                'id' => 'Membuat backup',
                'ar' => 'انشئ نسخة احتياطية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_download',
            'text' => [
                'en' => 'Download Current .env',
                'id' => 'Unduh .env saat ini',
                'ar' => 'تنزيل Current .env'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_title_two',
            'text' => [
                'en' => 'Your available backups',
                'id' => 'Cadangan Anda yang tersedia',
                'ar' => 'النسخ الاحتياطية المتوفرة لديك'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_restore_text',
            'text' => [
                'en' => 'Here you can restore one of your available backups.',
                'id' => 'Di sini Anda dapat memulihkan salah satu cadangan yang tersedia.',
                'ar' => 'هنا يمكنك استعادة إحدى النسخ الاحتياطية المتوفرة لديك.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_restore_warning',
            'text' => [
                'en' => 'This overwrites your active .env! Be sure to backup your currently active .env-file!',
                'id' => 'Ini menimpa .env! aktif Anda! Pastikan untuk mencadangkan file .env Anda yang sedang aktif!',
                'ar' => 'يؤدي هذا إلى الكتابة فوق .env النشط الخاص بك! تأكد من عمل نسخة احتياطية من ملف .env النشط حاليًا!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_no_backups',
            'text' => [
                'en' => 'You have no backups available.',
                'id' => 'Anda tidak memiliki cadangan yang tersedia.',
                'ar' => 'ليس لديك نسخ احتياطية متاحة.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_table_date',
            'text' => [
                'en' => 'Date',
                'id' => 'Tanggal',
                'ar' => 'تاريخ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_table_options',
            'text' => [
                'en' => 'Options',
                'id' => 'Pilihan',
                'ar' => 'خيارات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_table_options_show',
            'text' => [
                'en' => 'Show content of backup',
                'id' => 'Tampilkan konten cadangan',
                'ar' => 'إظهار محتوى النسخة الاحتياطية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_table_options_restore',
            'text' => [
                'en' => 'Restore this version',
                'id' => 'Pulihkan versi ini',
                'ar' => 'قم باستعادة هذا الإصدار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_table_options_download',
            'text' => [
                'en' => 'Download this version',
                'id' => 'Unduh versi ini',
                'ar' => 'قم بتنزيل هذا الإصدار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_table_options_delete',
            'text' => [
                'en' => 'Delete this version',
                'id' => 'Hapus versi ini',
                'ar' => 'احذف هذه النسخة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_modal_title',
            'text' => [
                'en' => 'Content of backup',
                'id' => 'Isi cadangan',
                'ar' => 'محتوى النسخ الاحتياطي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_modal_key',
            'text' => [
                'en' => 'Key',
                'id' => 'Key',
                'ar' => 'مفتاح'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_modal_value',
            'text' => [
                'en' => 'Value',
                'id' => 'Value',
                'ar' => 'قيمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_modal_close',
            'text' => [
                'en' => 'Close',
                'id' => 'Menutup',
                'ar' => 'قريب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_modal_restore',
            'text' => [
                'en' => 'Restore',
                'id' => 'Memulihkan',
                'ar' => 'يعيد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_modal_delete',
            'text' => [
                'en' => 'Delete',
                'id' => 'Hapus',
                'ar' => ''
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | View upload
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'upload_title',
            'text' => [
                'en' => 'Upload a backup',
                'id' => 'Unggah cadangan',
                'ar' => 'تحميل نسخة احتياطية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'upload_text',
            'text' => [
                'en' => 'Here you can upload a backup from your computer.',
                'id' => 'Di sini Anda dapat mengunggah cadangan dari komputer Anda.',
                'ar' => 'هنا يمكنك تحميل نسخة احتياطية من جهاز الكمبيوتر الخاص بك.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'upload_warning',
            'text' => [
                'en' => '<strong>Warning:</strong> This will override your currently active .env-file. Be sure, to create a backup before uploading.',
                'id' => '<strong>Peringatan:</strong> Ini akan menimpa file .env Anda yang sedang aktif. Pastikan, untuk membuat cadangan sebelum mengunggah.',
                'ar' => 'تحذير: سيؤدي هذا إلى تجاوز ملف .env النشط حاليًا. تأكد من إنشاء نسخة احتياطية قبل التحميل.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'upload_label',
            'text' => [
                'en' => 'Pick a file',
                'id' => 'Pilih file',
                'ar' => 'اختر ملفًا'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'upload_button',
            'text' => [
                'en' => 'Upload',
                'id' => 'Unggah',
                'ar' => 'تحميل'
            ]
        ]);


        /*
        |--------------------------------------------------------------------------
        | Messages from View
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'new_entry_added',
            'text' => [
                'en' => 'New key-value-pair was successfully added to your .env!',
                'id' => 'Pasangan nilai kunci baru berhasil ditambahkan ke .env!',
                'ar' => 'تمت إضافة زوج مفتاح القيمة الجديد بنجاح إلى .env!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'entry_edited',
            'text' => [
                'en' => 'Key-value-pair was edited successfully!',
                'id' => 'Pasangan nilai kunci berhasil diedit!',
                'ar' => 'تم تحرير زوج المفتاح والقيمة بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'entry_deleted',
            'text' => [
                'en' => 'Key-value-pair was deleted successfully!',
                'id' => 'Pasangan nilai kunci berhasil dihapus!',
                'ar' => 'تم حذف زوج المفتاح والقيمة بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'delete_entry',
            'text' => [
                'en' => 'Delete an entry',
                'id' => 'Hapus entri',
                'ar' => 'احذف إدخالاً'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_created',
            'text' => [
                'en' => 'New backup was created successfully!',
                'id' => 'Cadangan baru berhasil dibuat!',
                'ar' => 'تم إنشاء نسخة احتياطية جديدة بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'backup_restored',
            'text' => [
                'en' => 'Backup was restored successfully!',
                'id' => 'Cadangan berhasil dipulihkan!',
                'ar' => 'تمت استعادة النسخة الاحتياطية بنجاح!'
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | Messages from Controller
        |--------------------------------------------------------------------------
        */
        LanguageLine::create([
            'group' => 'env',
            'key' => 'controller_backup_deleted',
            'text' => [
                'en' => 'Backup was deleted successfully!',
                'id' => 'Cadangan berhasil dihapus!',
                'ar' => 'تم حذف النسخة الاحتياطية بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'env',
            'key' => 'controller_backup_created',
            'text' => [
                'en' => 'Backup was created successfully!',
                'id' => 'Cadangan berhasil dibuat!',
                'ar' => 'تم إنشاء النسخ الاحتياطي بنجاح!'
            ]
        ]);

    }
}
