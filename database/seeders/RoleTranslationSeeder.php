<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class RoleTranslationSeeder extends Seeder
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
            'group' => 'role',
            'key' => 'title_roles',
            'text' => [
                'en' => 'Roles',
                'id' => 'Roles',
                'ar' => 'الأدوار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'title_addnew_role',
            'text' => [
                'en' => 'Add New Role',
                'id' => 'Tambah Baru Role',
                'ar' => 'إضافة دور جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'title_edit_role',
            'text' => [
                'en' => 'Edit Role',
                'id' => 'Edit Role',
                'ar' => 'تحرير الدور'
            ]
        ]);

        /*
        |--------------------------------
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'role',
            'key' => 'button_create',
            'text' => [
                'en' => 'Create',
                'id' => 'Tambah',
                'ar' => 'خلق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'column_role',
            'text' => [
                'en' => 'Role',
                'id' => 'Role',
                'ar' => 'دور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'column_guard',
            'text' => [
                'en' => 'Guard',
                'id' => 'Guard',
                'ar' => 'يحمي'
            ]
        ]);

        LanguageLine::create([
            'group' => 'role',
            'key' => 'column_modules',
            'text' => [
                'en' => 'Modules',
                'id' => 'Modul',
                'ar' => 'الوحدات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'column_actions',
            'text' => [
                'en' => 'Actions',
                'id' => 'Aksi',
                'ar' => 'أجراءات'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Add New
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'role',
            'key' => 'label_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'placeholder_name',
            'text' => [
                'en' => 'Enter name..',
                'id' => 'Masukkan nama..',
                'ar' => 'أدخل الاسم..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Add New Role',
                'id' => 'Tambah Baru Role',
                'ar' => 'إضافة دور جديد'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Edit
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'role',
            'key' => 'card_title_role',
            'text' => [
                'en' => 'Change Role Name',
                'id' => 'Ubah Nama peran',
                'ar' => 'تغيير اسم الدور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'card_title_role_permission',
            'text' => [
                'en' => 'Role Permission',
                'id' => 'Izin Peran',
                'ar' => 'إذن الدور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'card_title_change_role_permission',
            'text' => [
                'en' => 'Change Role Permission',
                'id' => 'Ubah Izin Peran',
                'ar' => 'تغيير إذن الدور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'label_check_all',
            'text' => [
                'en' => 'Check All',
                'id' => 'Pilih Semua',
                'ar' => 'تحقق من الكل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'button_update',
            'text' => [
                'en' => 'Update Role',
                'id' => 'Ubah Role',
                'ar' => 'تحديث الدور'
            ]
        ]);

        /*
        |--------------------------------
        | Message
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'role',
            'key' => 'give_all_permission',
            'text' => [
                'en' => 'Give all permissions',
                'id' => 'Memberikan semua permission',
                'ar' => 'امنح كل الأذونات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'revoke_all_permission',
            'text' => [
                'en' => 'Revoke all permissions',
                'id' => 'Menghapus semua permission',
                'ar' => 'إبطال كافة الأذونات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'role_saved_successfully',
            'text' => [
                'en' => 'Role saved successfully!',
                'id' => 'Role disimpan berhasil!',
                'ar' => 'تم حفظ الدور بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'role_updating_successfully',
            'text' => [
                'en' => 'Role Updating successfully!',
                'id' => 'Mengupdate Role berhasil!',
                'ar' => 'تحديث الدور بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'role_deleted_successfully',
            'text' => [
                'en' => 'Role deleted successfully.',
                'id' => 'Role dihapus berhasil.',
                'ar' => 'تم حذف الدور بنجاح.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'role',
            'key' => 'role_deleted_no_successfully',
            'text' => [
                'en' => 'Role deleted not successfully.',
                'id' => 'Role tidak berhasil dihapus.',
                'ar' => 'لم يتم حذف الدور بنجاح.'
            ]
        ]);

    }
}
