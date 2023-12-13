<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class NotificationTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'notification',
            'key' => 'saved_successfully',
            'text' => [
                'en' => 'Saved successfully!',
                'id' => 'Berhasil disimpan!',
                'ar' => 'حفظ بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'saved_not_successfully',
            'text' => [
                'en' => 'Saved not successfully!',
                'id' => 'Tidak berhasil disimpan!',
                'ar' => 'لم يتم الحفظ بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'deleted_successfully',
            'text' => [
                'en' => 'Deleted successfully!',
                'id' => 'Berhasil dihapus!',
                'ar' => 'حذف بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'deleted_not_successfully',
            'text' => [
                'en' => 'Deleted not successfully!',
                'id' => 'Tidak berhasil dihapus!',
                'ar' => 'لم يتم الحذف بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'updated_successfully',
            'text' => [
                'en' => 'Updated successfully!',
                'id' => 'Berhasil diperbaharui',
                'ar' => 'تم التحديث بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'updated_not_successfully',
            'text' => [
                'en' => 'Updated not successfully!',
                'id' => 'Tidak berhasil diperbaharui!',
                'ar' => 'لم يتم التحديث بنجاح!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'dont_have_permission',
            'text' => [
                'en' => 'Sorry, you don\'t have permission.',
                'id' => 'Maaf, Anda tidak memiliki izin.',
                'ar' => 'عذرا ، ليس لديك إذن.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'username_or_email_and_password_are_wrong',
            'text' => [
                'en' => 'Username or Email And Password Are Wrong',
                'id' => 'Nama Pengguna atau Email dan Kata Sandi Salah',
                'ar' => 'اسم المستخدم أو البريد الإلكتروني وكلمة المرور غير صحيحين'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'you_have_successfully_registered',
            'text' => [
                'en' => 'You have successfully registered',
                'id' => 'Anda telah berhasil mendaftar',
                'ar' => 'لقد قمت بالتسجيل بنجاح'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'message_has_been_sent',
            'text' => [
                'en' => 'Message has been sent',
                'id' => 'Message has been sent',
                'ar' => 'تم ارسال الرسالة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'message_could_not_be_sent',
            'text' => [
                'en' => 'Message could not be sent',
                'id' => 'Pesan tidak dapat dikirim',
                'ar' => 'تعذر إرسال الرسالة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'notification',
            'key' => 'theme_successfully_activated',
            'text' => [
                'en' => 'Theme successfully activated',
                'id' => 'Theme berhasil diaktifkan',
                'ar' => 'تم تفعيل الموضوع بنجاح'
            ]
        ]);

    }
}
