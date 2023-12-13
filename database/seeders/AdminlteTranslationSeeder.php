<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class AdminlteTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'visit_site',
            'text' => [
                'en' => 'Visit Site',
                'id' => 'Lihat Situs',
                'ar' => 'تفضل بزيارة الموقع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'login',
            'text' => [
                'en' => 'Login',
                'id' => 'Masuk',
                'ar' => 'تسجيل الدخول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'full_name',
            'text' => [
                'en' => 'Full name',
                'id' => 'Nama Lengkap',
                'ar' => 'الاسم الكامل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'username_or_email',
            'text' => [
                'en' => 'Username or Email',
                'id' => 'Username atau Surel',
                'ar' => 'اسم المستخدم أو البريد الالكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'username',
            'text' => [
                'en' => 'Username',
                'id' => 'Username',
                'ar' => 'اسم المستخدم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'email',
            'text' => [
                'en' => 'Email',
                'id' => 'Surel',
                'ar' => 'البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'password',
            'text' => [
                'en' => 'Password',
                'id' => 'Kata Sandi',
                'ar' => 'كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'retype_password',
            'text' => [
                'en' => 'Retype password',
                'id' => 'Ketik ulang kata sandi',
                'ar' => 'اعد ادخال كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'remember_me',
            'text' => [
                'en' => 'Remember Me',
                'id' => 'Ingat Saya',
                'ar' => 'تذكرنى'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'register',
            'text' => [
                'en' => 'Register',
                'id' => 'Daftar',
                'ar' => 'تسجيل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'register_a_new_membership',
            'text' => [
                'en' => 'Register a new membership',
                'id' => 'Daftarkan keanggotaan baru',
                'ar' => 'تسجيل عضوية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'i_forgot_my_password',
            'text' => [
                'en' => 'I forgot my password',
                'id' => 'Saya lupa password',
                'ar' => 'لقد نسيت كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'i_already_have_a_membership',
            'text' => [
                'en' => 'I already have a membership',
                'id' => 'Saya sudah memiliki keanggotaan',
                'ar' => 'لدي عضوية بالفعل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'sign_in',
            'text' => [
                'en' => 'Sign In',
                'id' => 'Masuk',
                'ar' => 'تسجيل الدخول'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'log_out',
            'text' => [
                'en' => 'Log Out',
                'id' => 'Keluar',
                'ar' => 'تسجيل خروج'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'toggle_navigation',
            'text' => [
                'en' => 'Toggle Navigation',
                'id' => 'Alihkan Navigasi',
                'ar' => 'تبديل التنقل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'login_message',
            'text' => [
                'en' => 'Sign in to start your session',
                'id' => 'Masuk untuk memulai sesi Anda',
                'ar' => 'تسجيل الدخول لبدء الجلسة الخاصة بك'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'register_message',
            'text' => [
                'en' => 'Register a new membership',
                'id' => 'Daftarkan keanggotaan baru',
                'ar' => 'تسجيل عضوية جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'password_reset_message',
            'text' => [
                'en' => 'Reset Password',
                'id' => 'Setel Ulang Kata Sandi',
                'ar' => 'إعادة تعيين كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'reset_password',
            'text' => [
                'en' => 'Reset Password',
                'id' => 'Setel Ulang Kata Sandi',
                'ar' => 'إعادة تعيين كلمة المرور'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'button_submit_forget_password',
            'text' => [
                'en' => 'Request new password',
                'id' => 'Minta kata sandi baru',
                'ar' => 'طلب كلمة مرور جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'verify_message',
            'text' => [
                'en' => 'Your account needs a verification',
                'id' => 'Akun Anda memerlukan verifikasi',
                'ar' => 'حسابك يحتاج إلى التحقق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'verify_email_sent',
            'text' => [
                'en' => 'A fresh verification link has been sent to your email address.',
                'id' => 'Tautan verifikasi baru telah dikirim ke alamat email Anda.',
                'ar' => 'تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'verify_check_your_email',
            'text' => [
                'en' => 'Before proceeding, please check your email for a verification link.',
                'id' => 'Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.',
                'ar' => 'قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'verify_if_not_recieved',
            'text' => [
                'en' => 'If you did not receive the email',
                'id' => 'Jika Anda tidak menerima email',
                'ar' => 'إذا لم تستلم البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'verify_request_another',
            'text' => [
                'en' => 'click here to request another',
                'id' => 'klik di sini untuk meminta yang lain',
                'ar' => 'انقر هنا لطلب آخر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'confirm_password_message',
            'text' => [
                'en' => 'Please, confirm your password to continue.',
                'id' => 'Harap konfirmasi kata sandi Anda untuk melanjutkan.',
                'ar' => 'من فضلك ، أكد كلمة المرور الخاصة بك للمتابعة.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'remember_me_hint',
            'text' => [
                'en' => 'Keep me authenticated indefinitely or until I manually logout',
                'id' => 'Biarkan saya diautentikasi tanpa batas waktu atau sampai saya keluar secara manual',
                'ar' => 'احتفظ بمصادقي إلى أجل غير مسمى أو حتى أخرج يدويًا'
            ]
        ]);
        LanguageLine::create([
            'group' => 'adminlte',
            'key' => 'reset',
            'text' => [
                'en' => 'Reset',
                'id' => 'Mengatur Ulang',
                'ar' => 'إعادة ضبط'
            ]
        ]);

        //Error 401
        LanguageLine::create([
            'group' => 'error',
            'key' => 'title_401',
            'text' => [
                'en' => '401 Error Page',
                'id' => 'Halaman Error 401',
                'ar' => '401 صفحة خطأ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => '401',
            'text' => [
                'en' => 'Oops! Unauthorized: Access is denied due to invalid credentials.',
                'id' => 'Ups! Tidak Diotorisasi: Akses ditolak karena kredensial tidak valid.',
                'ar' => 'أأُووبس! غير مصرح به: تم رفض الوصول بسبب بيانات اعتماد غير صالحة.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => 'message_401',
            'text' => [
                'en' => 'You do not have permission to view this page using the credentials that you supplied.',
                'id' => 'Anda tidak memiliki izin untuk melihat halaman ini menggunakan kredensial yang Anda berikan.',
                'ar' => 'ليس لديك إذن لعرض هذه الصفحة باستخدام بيانات الاعتماد التي قدمتها.'
            ]
        ]);

        //Error 403
        LanguageLine::create([
            'group' => 'error',
            'key' => 'title_403',
            'text' => [
                'en' => '403 Error Page',
                'id' => 'Halaman Error 40',
                'ar' =>  '403 صفحة خطأ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => '403',
            'text' => [
                'en' => 'Oops! Forbidden.',
                'id' => 'Ups! Terlarang.',
                'ar' => 'أُووبس! ممنوع.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => 'message_403',
            'text' => [
                'en' => 'Sorry, you do not have permission to access.',
                'id' => 'Maaf, Anda tidak memiliki izin untuk mengakses.',
                'ar' => 'عذرا ، ليس لديك إذن للوصول.'
            ]
        ]);

        //Error 404
        LanguageLine::create([
            'group' => 'error',
            'key' => 'title_404',
            'text' => [
                'en' => '404 Error Page',
                'id' => 'Halaman Error 404',
                'ar' => '404 صفحة خطأ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => '404',
            'text' => [
                'en' => 'Oops! Page not found.',
                'id' => 'Ups! Halaman tidak ditemukan.',
                'ar' => 'أُووبس! الصفحة غير موجودة.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => 'message_404',
            'text' => [
                'en' => 'We could not find the page you were looking for. Meanwhile, you may return to dashboard.',
                'id' => 'Kami tidak dapat menemukan halaman yang Anda cari. Sementara itu, Anda dapat kembali ke dasbor.',
                'ar' => 'لم نتمكن من العثور على الصفحة التي تبحث عنها. في غضون ذلك ، يمكنك العودة إلى لوحة القيادة.'
            ]
        ]);

        //Error 419
        LanguageLine::create([
            'group' => 'error',
            'key' => 'title_419',
            'text' => [
                'en' => '419 Error Page',
                'id' => 'Halaman Error 419',
                'ar' => '4019 صفحة خطأ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => '419',
            'text' => [
                'en' => 'Oops! Page Expired',
                'id' => 'Ups! Halaman kedaluwarsa',
                'ar' => 'أُووبس! الصفحة منتهية الصلاحية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => 'message_419',
            'text' => [
                'en' => 'Oops! Page Expired',
                'id' => 'Ups! Halaman kedaluwarsa',
                'ar' => 'أُووبس! الصفحة منتهية الصلاحية'
            ]
        ]);

        //Error 429
        LanguageLine::create([
            'group' => 'error',
            'key' => 'title_429',
            'text' => [
                'en' => '429 Error Page',
                'id' => 'Halaman Error 429',
                'ar' => '429 صفحة خطأ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => '419',
            'text' => [
                'en' => 'Oops! Too Many Requests',
                'id' => 'Ups! Terlalu Banyak Permintaan',
                'ar' => 'أُووبس! طلبات كثيرة جدا'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => 'message_419',
            'text' => [
                'en' => 'Oops! Too Many Requests',
                'id' => 'Ups! Terlalu Banyak Permintaan',
                'ar' => 'أُووبس! طلبات كثيرة جدا'
            ]
        ]);

        //Error 500
        LanguageLine::create([
            'group' => 'error',
            'key' => 'title_500',
            'text' => [
                'en' => '500 Error Page',
                'id' => 'Halaman Error 500',
                'ar' => '500 صفحة خطأ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => '500',
            'text' => [
                'en' => 'Oops! Something went wrong.',
                'id' => 'Ups! Ada yang salah.',
                'ar' => 'أُووبس! هناك خطأ ما.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => 'message_500',
            'text' => [
                'en' => 'We will work on fixing that right away. Meanwhile, you may return to dashboard.',
                'id' => 'Kami akan segera memperbaikinya. Sementara itu, Anda dapat kembali ke dasbor.',
                'ar' => 'سنعمل على إصلاح ذلك على الفور. في غضون ذلك ، يمكنك العودة إلى لوحة القيادة.'
            ]
        ]);

        //Error 503
        LanguageLine::create([
            'group' => 'error',
            'key' => 'title_503',
            'text' => [
                'en' => '503 Error Page',
                'id' => 'Halaman Error 503',
                'ar' => '503 صفحة خطأ'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => '503',
            'text' => [
                'en' => 'Oops! Service Unavailable.',
                'id' => 'Ups! Layanan tidak tersedia.',
                'ar' => 'أُووبس! الخدمة غير متوفرة.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'error',
            'key' => 'message_500',
            'text' => [
                'en' => 'Oops! Service Unavailable.',
                'id' => 'Ups! Layanan tidak tersedia.',
                'ar' => 'أُووبس! الخدمة غير متوفرة.'
            ]
        ]);

    }
}
