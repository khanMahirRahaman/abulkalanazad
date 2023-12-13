<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class UserTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USER

        /*
        |--------------------------------
        | Title - Users
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'user',
            'key' => 'title_users',
            'text' => [
                'en' => 'Users',
                'id' => 'Pengguna',
                'ar' => 'المستخدمون'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'title_addnew_user',
            'text' => [
                'en' => 'Add New User',
                'id' => 'Tambah Baru Pengguna',
                'ar' => 'إضافة مستخدم جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'title_edit_user',
            'text' => [
                'en' => 'Edit User',
                'id' => 'Ubah Pengguna',
                'ar' => 'تحرير العضو'
            ]
        ]);

        /*
        |--------------------------------
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_create',
            'text' => [
                'en' => 'Create',
                'id' => 'Tambah',
                'ar' => 'خلق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'column_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'column_roles',
            'text' => [
                'en' => 'Roles',
                'id' => 'Peran',
                'ar' => 'الأدوار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'column_status',
            'text' => [
                'en' => 'Status',
                'id' => 'Status',
                'ar' => 'حالة'
            ]
        ]);

        // PROFILE

        /*
        |-------------------------------
        | Title
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'user',
            'key' => 'title_profile',
            'text' => [
                'en' => 'Profile',
                'id' => 'Profil',
                'ar' => 'الملف الشخصي'
            ]
        ]);


        // CHANGE PASSWORD

        /*
        |-------------------------------
        | Title
        |-------------------------------
        */

        LanguageLine::create([
            'group' => 'user',
            'key' => 'title_change_password',
            'text' => [
                'en' => 'Change Password',
                'id' => 'Ubah Password',
                'ar' => 'غير كلمة السر'
            ]
        ]);


        //label
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_username',
            'text' => [
                'en' => 'Username',
                'id' => 'Nama pengguna',
                'ar' => 'اسم المستخدم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_email',
            'text' => [
                'en' => 'E-Mail',
                'id' => 'E-Mail',
                'ar' => 'البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_password',
            'text' => [
                'en' => 'Password',
                'id' => 'Password',
                'ar' => 'كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_confirm_password',
            'text' => [
                'en' => 'Confirm Password',
                'id' => 'Konfirmasi Password',
                'ar' => 'تأكيد كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_change_password',
            'text' => [
                'en' => 'Change Password',
                'id' => 'Ubah Password',
                'ar' => 'غير كلمة السر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_occupation',
            'text' => [
                'en' => 'Occupation',
                'id' => 'Pekerjaan',
                'ar' => 'إشغال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_about',
            'text' => [
                'en' => 'About',
                'id' => 'Tentang',
                'ar' => 'حول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_socialmedia',
            'text' => [
                'en' => 'Social Media',
                'id' => 'Media Sosial',
                'ar' => 'وسائل التواصل الاجتماعي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_photo',
            'text' => [
                'en' => 'Photo',
                'id' => 'Foto',
                'ar' => 'صورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_role',
            'text' => [
                'en' => 'Role',
                'id' => 'Role',
                'ar' => 'دور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_status',
            'text' => [
                'en' => 'Status',
                'id' => 'status',
                'ar' => 'حالة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_old_password',
            'text' => [
                'en' => 'Old Password',
                'id' => 'Password Lama',
                'ar' => 'كلمة المرور القديمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'label_new_password',
            'text' => [
                'en' => 'New Password',
                'id' => 'Password Baru',
                'ar' => 'كلمة السر الجديدة'
            ]
        ]);

        //placeholder
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_name',
            'text' => [
                'en' => 'Enter name..',
                'id' => 'Masukkan nama..',
                'ar' => 'أدخل الاسم..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_username',
            'text' => [
                'en' => 'Enter username..',
                'id' => 'Masukkan nama pengguna..',
                'ar' => 'ادخل اسم المستخدم..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_email',
            'text' => [
                'en' => 'Enter E-Mail..',
                'id' => 'Masukkan E-Mail..',
                'ar' => 'أدخل البريد الإلكتروني ..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_password',
            'text' => [
                'en' => 'Enter password..',
                'id' => 'Masukkan password..',
                'ar' => 'أدخل كلمة المرور ..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_change_password',
            'text' => [
                'en' => 'Change your password..',
                'id' => 'Masukkan password..',
                'ar' => 'غير كلمة المرور الخاصة بك..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_confirm_password',
            'text' => [
                'en' => 'Enter confirm password..',
                'id' => 'Masukkan konfimrasi password',
                'ar' => 'أدخل تأكيد كلمة المرور ..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_occupation',
            'text' => [
                'en' => 'Enter occupation..',
                'id' => 'Masukkan pekerjaan',
                'ar' => 'أدخل المهنة ..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_about',
            'text' => [
                'en' => 'Write about you..',
                'id' => 'Tulis tentangmu..',
                'ar' => 'اكتب عن نفسك..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_socialmedia',
            'text' => [
                'en' => 'Select Social Media..',
                'id' => 'Pilih Media Sosial..',
                'ar' => 'حدد وسائل التواصل الاجتماعي ..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_photo',
            'text' => [
                'en' => 'Click to upload your photo',
                'id' => 'Klik untuk unggah fotomu',
                'ar' => 'انقر لتحميل صورتك'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'placeholder_role',
            'text' => [
                'en' => 'Select Role..',
                'id' => 'Pilih Role..',
                'ar' => 'حدد الدور ..'
            ]
        ]);

        // help
        LanguageLine::create([
            'group' => 'user',
            'key' => 'help_password',
            'text' => [
                'en' => 'Min. 6 characters',
                'id' => 'Min. 6 karakter',
                'ar' => 'دقيقة. 6 أحرف'
            ]
        ]);

        // Option
        LanguageLine::create([
            'group' => 'user',
            'key' => 'opt_activated',
            'text' => [
                'en' => 'Activated',
                'id' => 'Aktifkan',
                'ar' => 'مفعل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'opt_deactivated',
            'text' => [
                'en' => 'Deactivated',
                'id' => 'Nonaktifkan',
                'ar' => 'معطل'
            ]
        ]);

        // Button
        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Create',
                'id' => 'Buat',
                'ar' => 'خلق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_update',
            'text' => [
                'en' => 'Update',
                'id' => 'Ubah',
                'ar' => 'تحديث'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_password_submit',
            'text' => [
                'en' => 'Change your password',
                'id' => 'Ubah Password',
                'ar' => 'غير كلمة المرور الخاصة بك'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_reset',
            'text' => [
                'en' => 'Reset',
                'id' => 'Reset',
                'ar' => 'إعادة ضبط'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_use_this_image',
            'text' => [
                'en' => 'Use this image',
                'id' => 'Gunakan gambar ini',
                'ar' => 'استخدم هذه الصورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_remove_image',
            'text' => [
                'en' => 'Remove image',
                'id' => 'Hapus gambar',
                'ar' => 'إزالة الصورة'
            ]
        ]);

        // PROFILE

        LanguageLine::create([
            'group' => 'user',
            'key' => 'profile_aboutme',
            'text' => [
                'en' => 'About Me',
                'id' => 'Tentang Saya',
                'ar' => 'عني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'profile_occupation',
            'text' => [
                'en' => 'Occupation',
                'id' => 'Pekerjaan',
                'ar' => 'إشغال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'profile_about',
            'text' => [
                'en' => 'About',
                'id' => 'Tentang',
                'ar' => 'حول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'button_profile_update',
            'text' => [
                'en' => 'Update Profile',
                'id' => 'Ubah Profil',
                'ar' => 'تحديث الملف'
            ]
        ]);

        // TAB PROFILE
        LanguageLine::create([
            'group' => 'user',
            'key' => 'tab_profile_settings',
            'text' => [
                'en' => 'Settings',
                'id' => 'Pengaturan',
                'ar' => 'إعدادات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'user',
            'key' => 'tab_profile_photo',
            'text' => [
                'en' => 'Photo',
                'id' => 'Foto',
                'ar' => 'صورة'
            ]
        ]);

        // ROLES

        LanguageLine::create([
            'group' => 'user',
            'key' => 'addnew_role',
            'text' => [
                'en' => 'Add New Role',
                'id' => 'Tambah Role Baru',
                'ar' => 'إضافة دور جديد'
            ]
        ]);
    }
}
