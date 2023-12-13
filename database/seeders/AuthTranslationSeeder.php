<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class AuthTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'full_name',
            'text' => [
                'en' => 'Full Name',
                'id' => 'Nama Lengkap',
                'ar' => 'الاسم الكامل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'username_or_email',
            'text' => [
                'en' => 'Username or Email',
                'id' => 'Username atau Surel',
                'ar' => 'اسم المستخدم أو البريد الالكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'email',
            'text' => [
                'en' => 'Email',
                'id' => 'Surel',
                'ar' => 'البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'password',
            'text' => [
                'en' => 'Password',
                'id' => 'Kata Sandi',
                'ar' => 'كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'retype_password',
            'text' => [
                'en' => 'Retype password',
                'id' => 'Ulangi Kata Sandi',
                'ar' => 'اعد ادخال كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'remember_me',
            'text' => [
                'en' => 'Remember Me',
                'id' => 'Ingat Saya',
                'ar' => 'تذكرنى'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'register',
            'text' => [
                'en' => 'Register',
                'id' => 'Daftar',
                'ar' => 'يسجل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'register_a_new_membership',
            'text' => [
                'en' => 'Register a new membership',
                'id' => 'Daftarkan keanggotaan baru',
                'ar' => 'تسجيل عضوية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'i_forgot_my_password',
            'text' => [
                'en' => 'I forgot my password',
                'id' => 'Saya lupa kata sandi saya',
                'ar' => 'لقد نسيت كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'i_already_have_a_membership',
            'text' => [
                'en' => 'I already have a membership',
                'id' => 'Saya sudah memiliki keanggotaan',
                'ar' => 'لدي عضوية بالفعل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'sign_in',
            'text' => [
                'en' => 'Sign In',
                'id' => 'Masuk',
                'ar' => 'تسجيل الدخول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'log_out',
            'text' => [
                'en' => 'Log Out',
                'id' => 'Keluar',
                'ar' => 'تسجيل خروج'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'toggle_navigation',
            'text' => [
                'en' => 'Toggle navigation',
                'id' => 'Alihkan navigasi',
                'ar' => 'تبديل التنقل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'login_message',
            'text' => [
                'en' => 'Sign in to start your session',
                'id' => 'Masuk untuk memulai sesi Anda',
                'ar' => 'تسجيل الدخول لبدء الجلسة الخاصة بك'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'register_message',
            'text' => [
                'en' => 'Register a new membership',
                'id' => 'Daftarkan keanggotaan baru',
                'ar' => 'تسجيل عضوية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'password_reset_message',
            'text' => [
                'en' => 'Reset Password',
                'id' => 'Setel ulang kata sandi',
                'ar' => 'إعادة تعيين كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'reset_password',
            'text' => [
                'en' => 'Reset Password',
                'id' => 'Setel ulang kata sandi',
                'ar' => 'إعادة تعيين كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'send_password_reset_link',
            'text' => [
                'en' => 'Send Password Reset Link',
                'id' => 'Kirim Tautan Atur Ulang Kata Sandi',
                'ar' => 'إرسال رابط إعادة تعيين كلمة السر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'verify_message',
            'text' => [
                'en' => 'Your account needs a verification',
                'id' => 'Akun Anda memerlukan verifikasi',
                'ar' => 'حسابك يحتاج إلى التحقق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'verify_email_sent',
            'text' => [
                'en' => 'A fresh verification link has been sent to your email address.',
                'id' => 'Tautan verifikasi baru telah dikirim ke alamat email Anda.',
                'ar' => 'تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'verify_check_your_email',
            'text' => [
                'en' => 'Before proceeding, please check your email for a verification link.',
                'id' => 'Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.',
                'ar' => 'قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'verify_if_not_recieved',
            'text' => [
                'en' => 'If you did not receive the email',
                'id' => 'Jika Anda tidak menerima email',
                'ar' => 'إذا لم تستلم البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'auth',
            'key' => 'verify_request_another',
            'text' => [
                'en' => 'click here to request another',
                'id' => 'klik di sini untuk meminta yang lain',
                'ar' => 'انقر هنا لطلب آخر'
            ]
        ]);
    }
}
