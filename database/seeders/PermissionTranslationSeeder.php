<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class PermissionTranslationSeeder extends Seeder
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
            'group' => 'permission',
            'key' => 'title_permissions',
            'text' => [
                'en' => 'Permissions',
                'id' => 'Permissions',
                'ar' => 'أذونات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'permission',
            'key' => 'title_addnew_permission',
            'text' => [
                'en' => 'Add New Permission',
                'id' => 'Tambah Baru Izin',
                'ar' => 'أضف إذنًا جديدًا'
            ]
        ]);
        LanguageLine::create([
            'group' => 'permission',
            'key' => 'title_edit_permission',
            'text' => [
                'en' => 'Edit Permission',
                'id' => 'Edit Permission',
                'ar' => 'تحرير إذن'
            ]
        ]);


        /*
        |--------------------------------
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'permission',
            'key' => 'column_permission',
            'text' => [
                'en' => 'Permission',
                'id' => 'Permission',
                'ar' => 'الإذن'
            ]
        ]);
        LanguageLine::create([
            'group' => 'permission',
            'key' => 'column_guard',
            'text' => [
                'en' => 'Guard',
                'id' => 'Guard',
                'ar' => 'يحمي'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Add New
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'permission',
            'key' => 'label_permission',
            'text' => [
                'en' => 'Permission',
                'id' => 'Permission',
                'ar' => 'الإذن'
            ]
        ]);
        LanguageLine::create([
            'group' => 'permission',
            'key' => 'placeholder_permission',
            'text' => [
                'en' => 'Enter Permission..',
                'id' => 'Masukkan Permission',
                'ar' => 'أدخل الإذن ..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'permission',
            'key' => 'help_permission',
            'text' => [
                'en' => 'Generate the permission prefix:',
                'id' => 'Buat prefix permission:',
                'ar' => 'قم بإنشاء بادئة الإذن:'
            ]
        ]);
        LanguageLine::create([
            'group' => 'permission',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Add New Permission',
                'id' => 'Tambah Baru Permission',
                'ar' => 'أضف إذنًا جديدًا'
            ]
        ]);

        /*
        |--------------------------------
        | Form - Edit
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'permission',
            'key' => 'button_update',
            'text' => [
                'en' => 'Update Permission',
                'id' => 'Ubah Permission',
                'ar' => 'إذن التحديث'
            ]
        ]);
        LanguageLine::create([
            'group' => 'permission',
            'key' => 'button_create',
            'text' => [
                'en' => 'Create',
                'id' => 'Tambah',
                'ar' => 'خلق'
            ]
        ]);

    }
}
