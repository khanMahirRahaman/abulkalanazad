<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class ProfileTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'change_password',
            'text' => [
                'en' => 'Change Password',
                'id' => 'Ubah Password',
                'ar' => 'غير كلمة السر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'old_password',
            'text' => [
                'en' => 'Old Password',
                'id' => 'Password Lama',
                'ar' => 'كلمة المرور القديمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'new_password',
            'text' => [
                'en' => 'New Password',
                'id' => 'Password Baru',
                'ar' => 'كلمة السر الجديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'new_password_again',
            'text' => [
                'en' => 'New Password (Again)',
                'id' => 'Password Baru (lagi)',
                'ar' => 'كلمة مرور جديدة (مرة أخرى)'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'social_media',
            'text' => [
                'en' => 'Social Media',
                'id' => 'Media Sosial',
                'ar' => 'وسائل التواصل الاجتماعي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'about',
            'text' => [
                'en' => 'About',
                'id' => 'Tentang',
                'ar' => 'حول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'occupation',
            'text' => [
                'en' => 'Occupation',
                'id' => 'Pekerjaan',
                'ar' => 'إشغال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'email',
            'text' => [
                'en' => 'E-Mail',
                'id' => 'E-Mail',
                'ar' => 'البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'username',
            'text' => [
                'en' => 'Username',
                'id' => 'Username',
                'ar' => 'اسم المستخدم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'profile',
            'text' => [
                'en' => 'Profile',
                'id' => 'Profil',
                'ar' => 'الملف الشخصي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'about_me',
            'text' => [
                'en' => 'About Me',
                'id' => 'Tentang Saya',
                'ar' => 'عني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'settings',
            'text' => [
                'en' => 'Settings',
                'id' => 'Pengaturan',
                'ar' => 'إعدادات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'photo',
            'text' => [
                'en' => 'Photo',
                'id' => 'Foto',
                'ar' => 'صورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'select_role',
            'text' => [
                'en' => 'Select Role',
                'id' => 'Pilih Role',
                'ar' => 'حدد الدور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'choose_a_file',
            'text' => [
                'en' => 'Choose a file',
                'id' => 'Pilih file',
                'ar' => 'اختيار ملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'upload_message',
            'text' => [
                'en' => 'Click to upload your photo',
                'id' => 'Klik untuk upload foto',
                'ar' => 'انقر لتحميل صورتك'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'use_this_image',
            'text' => [
                'en' => 'Use this image',
                'id' => 'Gunakan gambar ini',
                'ar' => 'استخدم هذه الصورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'reset',
            'text' => [
                'en' => 'Reset',
                'id' => 'Atur ulang',
                'ar' => 'إعادة ضبط'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'remove_image',
            'text' => [
                'en' => 'Remove Image',
                'id' => 'Hapus Gambar',
                'ar' => 'إزالة الصورة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'update_profile',
            'text' => [
                'en' => 'Update Profile',
                'id' => 'Ubah Profil',
                'ar' => 'تحديث الملف'
            ]
        ]);

        /*
        |--------------------------------
        | Message
        |--------------------------------
        */
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'message_password_wrong',
            'text' => [
                'en' => 'Password wrong!',
                'id' => 'Password salah!',
                'ar' => 'كلمة المرور خاطئة!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'message_change_password_successfully',
            'text' => [
                'en' => 'Change Password successfully!',
                'id' => 'Mengubah Password berhasil!',
                'ar' => 'تغيير كلمة المرور بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'message_your_profile_has_been_successfully_changed',
            'text' => [
                'en' => 'Your profile has been successfully changed.',
                'id' => 'Profile berhasil diubah.',
                'ar' => 'تم تغيير ملف التعريف الخاص بك بنجاح.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'profile',
            'key' => 'message_there_are_no_changes_to_your_profile',
            'text' => [
                'en' => 'There are no changes to your profile.',
                'id' => 'Tidak ada perubahan di profilmu.',
                'ar' => 'لا توجد تغييرات على ملف التعريف الخاص بك.'
            ]
        ]);
    }
}
