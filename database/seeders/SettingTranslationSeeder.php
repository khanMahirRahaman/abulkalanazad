<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class SettingTranslationSeeder extends Seeder
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
            'group' => 'setting',
            'key' => 'title_settings',
            'text' => [
                'en' => 'Settings',
                'id' => 'Pengaturan',
                'ar' => 'إعدادات'
            ]
        ]);

        /*
        |--------------------------------
        | TAB
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'web_information_tab',
            'text' => [
                'en' => 'Web Information',
                'id' => 'Informasi Web',
                'ar' => 'معلومات الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'web_contact_tab',
            'text' => [
                'en' => 'Web Contact',
                'id' => 'Kontak Web',
                'ar' => 'جهة اتصال الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'web_properties_tab',
            'text' => [
                'en' => 'Web Properties',
                'id' => 'Properti Web',
                'ar' => 'خصائص الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'web_config_tab',
            'text' => [
                'en' => 'Web Config',
                'id' => 'Konfigurasi Web',
                'ar' => 'تكوين الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'web_backup_tab',
            'text' => [
                'en' => 'Web Backup',
                'id' => 'Backup Web',
                'ar' => 'النسخ الاحتياطي على الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'web_permalinks_tab',
            'text' => [
                'en' => 'Web Permalinks',
                'id' => 'Permalink Web',
                'ar' => 'الروابط الثابتة على شبكة الإنترنت'
            ]
        ]);

        /* Tab Web Information */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_company_name',
            'text' => [
                'en' => 'Company Name',
                'id' => 'Nama Perusahaan',
                'ar' => 'اسم الشركة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_company_name',
            'text' => [
                'en' => 'Company Name',
                'id' => 'Nama Perusahaan',
                'ar' => 'اسم الشركة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_web_name',
            'text' => [
                'en' => 'Web Name',
                'id' => 'Nama Web',
                'ar' => 'اسم الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_web_name',
            'text' => [
                'en' => 'Web Name',
                'id' => 'Nama Web',
                'ar' => 'اسم الويب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_web_url',
            'text' => [
                'en' => 'Web URL',
                'id' => 'URL Web',
                'ar' => 'URL الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_web_url',
            'text' => [
                'en' => 'Web URL',
                'id' => 'URL Web',
                'ar' => 'URL الويب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_web_description',
            'text' => [
                'en' => 'Web Description',
                'id' => 'Deskripsi Web',
                'ar' => 'وصف الويب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_web_description',
            'text' => [
                'en' => 'Web Description',
                'id' => 'Deskripsi Web',
                'ar' => 'وصف الويب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_web_keyword',
            'text' => [
                'en' => 'Meta Keyword',
                'id' => 'Meta Keyword',
                'ar' => 'كلمة ميتا'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_web_keyword',
            'text' => [
                'en' => 'Meta Keyword',
                'id' => 'Meta Keyword',
                'ar' => 'كلمة ميتا'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_credit_footer',
            'text' => [
                'en' => 'Credit Footer',
                'id' => 'Kredit Footer',
                'ar' => 'تذييل الائتمان'
            ]
        ]);

        /* Tab Web Contact */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_address_street',
            'text' => [
                'en' => 'Street',
                'id' => 'Jalan',
                'ar' => 'شارع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_address_street',
            'text' => [
                'en' => 'Street',
                'id' => 'Jalan',
                'ar' => 'شارع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_address_city',
            'text' => [
                'en' => 'City',
                'id' => 'Kota',
                'ar' => 'مدينة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_address_city',
            'text' => [
                'en' => 'City',
                'id' => 'Kota',
                'ar' => 'مدينة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_postal_code',
            'text' => [
                'en' => 'Postal Code',
                'id' => 'Kode Pos',
                'ar' => 'رمز بريدي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_postal_code',
            'text' => [
                'en' => 'Postal Code',
                'id' => 'Kode Pos',
                'ar' => 'رمز بريدي'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_address_state',
            'text' => [
                'en' => 'State',
                'id' => 'Daerah',
                'ar' => 'حالة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_address_state',
            'text' => [
                'en' => 'State',
                'id' => 'Daerah',
                'ar' => 'حالة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_address_country',
            'text' => [
                'en' => 'Country',
                'id' => 'Negara',
                'ar' => ''
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_address_country',
            'text' => [
                'en' => 'Country',
                'id' => 'Negara',
                'ar' => 'دولة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_email',
            'text' => [
                'en' => 'E-Mail',
                'id' => 'E-Mail',
                'ar' => 'البريد الإلكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_email',
            'text' => [
                'en' => 'name@domain.com',
                'id' => 'nama@domain.com',
                'ar' => 'name@domain.com'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_phone',
            'text' => [
                'en' => 'Phone',
                'id' => 'Telepon',
                'ar' => 'هاتف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_phone',
            'text' => [
                'en' => 'Phone',
                'id' => 'Telepon',
                'ar' => 'هاتف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_full_address',
            'text' => [
                'en' => 'Full Address',
                'id' => 'Alamat Lengkap',
                'ar' => 'العنوان الكامل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_full_address',
            'text' => [
                'en' => 'Full Address',
                'id' => 'Alamat Lengkap',
                'ar' => 'العنوان الكامل'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_contact_description',
            'text' => [
                'en' => 'Contact Description',
                'id' => 'Deskripsi Kontak',
                'ar' => 'وصف جهة الاتصال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_contact_description',
            'text' => [
                'en' => 'Contact Description',
                'id' => 'Deskripsi Kontak',
                'ar' => 'وصف جهة الاتصال'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_socialmedia',
            'text' => [
                'en' => 'Social Media',
                'id' => 'Media Sosial',
                'ar' => 'وسائل التواصل الاجتماعي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_socialmedia',
            'text' => [
                'en' => 'Select Social Media..',
                'id' => 'Pilih Media Sosial..',
                'ar' => 'حدد وسائل التواصل الاجتماعي'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_socialmedia_url',
            'text' => [
                'en' => 'URL',
                'id' => 'URL',
                'ar' => 'URL'
            ]
        ]);

        /* Tab Web Properties */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_logo_web_light',
            'text' => [
                'en' => 'Web Logo (light version)',
                'id' => 'Logo Website (versi terang)',
                'ar' => 'شعار الويب (نسخة خفيفة)'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_logo_web_dark',
            'text' => [
                'en' => 'Web Logo (dark version)',
                'id' => 'Logo Web (versi gelap)',
                'ar' => 'شعار الويب (نسخة غامقة)'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_logo_web',
            'text' => [
                'en' => 'File format must be in the format jpg, jpeg, png, and the size 762x242',
                'id' => 'Format file harus dalam format jpg, jpeg, png, dan ukuran 762x242',
                'ar' => 'يجب أن يكون تنسيق الملف بالتنسيق jpg و jpeg و png والحجم 762x242'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_upload_file',
            'text' => [
                'en' => 'Choose File..',
                'id' => 'Pilih File..',
                'ar' => 'اختر ملف..'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_favicon',
            'text' => [
                'en' => 'Favicon',
                'id' => 'Favicon',
                'ar' => 'فافيكون'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_favicon',
            'text' => [
                'en' => 'File format must be in the format jpg, jpeg, ico ,png and the max size 256x256px.',
                'id' => 'Format file harus dalam format jpg, jpeg, ico, png, dan ukuran maksimal 256x256px.',
                'ar' => 'يجب أن يكون تنسيق الملف بالتنسيق jpg و jpeg و ico و png والحجم الأقصى 256x256 بكسل.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_open_graph_image',
            'text' => [
                'en' => 'Open Graph Image',
                'id' => 'Open Graph Image',
                'ar' => 'افتح صورة الرسم البياني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_open_graph_image',
            'text' => [
                'en' => 'File format must be in the format jpg, jpeg, png, and the max size 1484x1200px.',
                'id' => 'Format file harus dalam format jpg, jpeg, png, dan ukuran maksimal 1484x1200px.',
                'ar' => 'يجب أن يكون تنسيق الملف بالتنسيق jpg و jpeg و png والحجم الأقصى 1484x1200 بكسل.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_dashboard_logo',
            'text' => [
                'en' => 'Dashboard Logo',
                'id' => 'Logo Dashboard',
                'ar' => 'شعار لوحة القيادة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_dashboard_logo',
            'text' => [
                'en' => 'File format must be in the format jpg, jpeg, png, and recomended size 100px.',
                'id' => 'Format file harus dalam format jpg, jpeg, png, dan ukuran direkomendasikan 100px.',
                'ar' => 'يجب أن يكون تنسيق الملف بالتنسيق jpg و jpeg و png والحجم الموصى به 100 بكسل.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_auth_logo',
            'text' => [
                'en' => 'Auth Logo',
                'id' => 'Logo Auth',
                'ar' => 'شعار المصادقة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_auth_logo',
            'text' => [
                'en' => 'File format must be in the format jpg, jpeg, png, and recomended size 100px.',
                'id' => 'Format file harus dalam format jpg, jpeg, png, dan ukuran direkomendasikan 100px.',
                'ar' => 'يجب أن يكون تنسيق الملف بالتنسيق jpg و jpeg و png والحجم الموصى به 100 بكسل.'
            ]
        ]);

        /* Tab Web Config */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_google_analytics_id',
            'text' => [
                'en' => 'Google Analytics ID',
                'id' => 'Google Analytics ID',
                'ar' => 'معرف Google Analytics'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_google_analytics_id',
            'text' => [
                'en' => 'UA-45868728-1',
                'id' => 'UA-45868728-1',
                'ar' => 'UA-45868728-1'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_analytics_view_id',
            'text' => [
                'en' => 'Analytics View ID',
                'id' => 'ID View Analytics',
                'ar' => 'معرّف عرض Analytics'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_analytics_view_id',
            'text' => [
                'en' => '218102751',
                'id' => '218102751',
                'ar' => '218102751'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_publisher_id',
            'text' => [
                'en' => 'Publisher ID',
                'id' => 'ID Publisher',
                'ar' => 'معرف الناشر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_publisher_id',
            'text' => [
                'en' => 'ca-pub-969333888777222111',
                'id' => 'ca-pub-969333888777222111',
                'ar' => 'ca-pub-969333888777222111'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_credential_file',
            'text' => [
                'en' => 'Credentials File',
                'id' => 'File Kredensial',
                'ar' => 'ملف أوراق الاعتماد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_credential_file',
            'text' => [
                'en' => 'Choose File..',
                'id' => 'Pilih File..',
                'ar' => 'اختر ملف..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_credential_file',
            'text' => [
                'en' => 'Browse service account credentials json file',
                'id' => 'Jelajahi file json kredensial akun layanan',
                'ar' => 'تصفح ملف json لبيانات اعتماد حساب الخدمة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_disqus_shortname',
            'text' => [
                'en' => 'Disqus Short Name',
                'id' => 'Nama Disqus',
                'ar' => 'Disqus الاسم المختصر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_diqus_shortname',
            'text' => [
                'en' => 'Your website shortname',
                'id' => 'Nama website kamu',
                'ar' => 'الاسم المختصر لموقع الويب الخاص بك'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_google_map_code',
            'text' => [
                'en' => 'Google Map Code',
                'id' => 'Kode Peta Google',
                'ar' => 'كود خريطة جوجل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_googlemap_code',
            'text' => [
                'en' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.07212464098!2d105.2985505143532!3d-5.40598465551376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40db829b6498f7%3A0x2846d50abe54ac6e!2sSigerweb!5e0!3m2!1sid!2sid!4v1582281377731!5m2!1sid!2sid',
                'id' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.07212464098!2d105.2985505143532!3d-5.40598465551376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40db829b6498f7%3A0x2846d50abe54ac6e!2sSigerweb!5e0!3m2!1sid!2sid!4v1582281377731!5m2!1sid!2sid',
                'ar' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.07212464098!2d105.2985505143532!3d-5.40598465551376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40db829b6498f7%3A0x2846d50abe54ac6e!2sSigerweb!5e0!3m2!1sid!2sid!4v1582281377731!5m2!1sid!2sid'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_site_language',
            'text' => [
                'en' => 'Site Language',
                'id' => 'Bahasa Situs',
                'ar' => 'لغة الموقع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_sitemap',
            'text' => [
                'en' => 'Sitemap',
                'id' => 'Peta Situs',
                'ar' => 'خريطة الموقع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'button_generate_sitemap',
            'text' => [
                'en' => 'Generate Sitemap',
                'id' => 'Buat Peta Situs',
                'ar' => 'قم بإنشاء ملف Sitemap'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_sitemap',
            'text' => [
                'en' => 'See results',
                'id' => 'Lihat hasil',
                'ar' => 'رؤية النتائج'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'link_sitemap',
            'text' => [
                'en' => 'Sitemap',
                'id' => 'Peta Situs',
                'ar' => 'خريطة الموقع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_switch_display_language',
            'text' => [
                'en' => 'Display language options',
                'id' => 'Opsi Bahasa Pilihan ',
                'ar' => 'عرض خيارات اللغة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'control_label_switch_display_language',
            'text' => [
                'en' => 'Click to activate or deactivate display language',
                'id' => 'Klik untuk mengaktifkan atau menonaktifkan bahasa tampilan',
                'ar' => 'انقر لتنشيط أو إلغاء تنشيط لغة العرض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'display_language_enabled',
            'text' => [
                'en' => 'Display language enabled!',
                'id' => 'Opsi bahasa diaktifkan!',
                'ar' => ''
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'display_language_disabled',
            'text' => [
                'en' => 'Display language disabled!',
                'id' => 'Opsi bahasa dinonaktifkan!',
                'ar' => 'لغة العرض ممكنة!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_maintenance_mode',
            'text' => [
                'en' => 'Maintenance Mode',
                'id' => 'Mode Pemeliharaan',
                'ar' => 'نمط الصيانة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'control_label_maintenance_mode',
            'text' => [
                'en' => 'Click to activate or deactivate Maintenance Mode on the Website',
                'id' => 'Klik untuk mengaktifkan atau menonaktifkan Mode Pemeliharaan di Situs Web',
                'ar' => 'انقر لتنشيط أو إلغاء تنشيط وضع الصيانة على موقع الويب'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_register',
            'text' => [
                'en' => 'Register User',
                'id' => 'Pendaftaran Pengguna',
                'ar' => 'تسجيل المستخدم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'control_label_register',
            'text' => [
                'en' => 'Click to activate or deactivate Register Member',
                'id' => 'Klik untuk mengaktifkan atau menonaktifkan Daftar Anggota',
                'ar' => 'انقر لتنشيط أو إلغاء تنشيط تسجيل عضو'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_email_verification',
            'text' => [
                'en' => 'Email Verification',
                'id' => 'Verifikasi Surel',
                'ar' => 'تأكيد بواسطة البريد الالكتروني'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'control_label_email_verification',
            'text' => [
                'en' => 'Click to activate or deactivate Email Verification',
                'id' => 'Klik untuk mengaktifkan atau menonaktifkan Verifikasi Surel',
                'ar' => 'انقر لتنشيط أو إلغاء تنشيط التحقق من البريد الإلكتروني'
            ]
        ]);


        /* Tab Web Backup */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_export',
            'text' => [
                'en' => 'Export',
                'id' => 'Ekspor',
                'ar' => 'يصدّر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'button_download_data',
            'text' => [
                'en' => 'Download Export File Data',
                'id' => 'Unduh Ekspor File Data',
                'ar' => 'تنزيل تصدير بيانات الملف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'button_download_backup',
            'text' => [
                'en' => 'Download Backup Storage',
                'id' => 'Unduh Cadangan Simpanan',
                'ar' => 'تنزيل Backup Storage'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_import',
            'text' => [
                'en' => 'Import Data File',
                'id' => 'Impor File Data',
                'ar' => 'استيراد ملف البيانات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'placeholder_import',
            'text' => [
                'en' => 'Choose File..',
                'id' => 'Pilih File..',
                'ar' => 'اختر ملف..'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'help_import',
            'text' => [
                'en' => 'File format must be xlsx.',
                'id' => 'Format file harus berekstensi xlsx.',
                'ar' => 'يجب أن يكون تنسيق الملف xlsx.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'button_upload',
            'text' => [
                'en' => 'Upload',
                'id' => 'Unggah',
                'ar' => 'تحميل'
            ]
        ]);

        /* Tab Web Backup */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'title_post_permalinks',
            'text' => [
                'en' => 'Post Permalinks',
                'id' => 'Permalink Post',
                'ar' => 'آخر الروابط الثابتة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_postname',
            'text' => [
                'en' => 'Post Name',
                'id' => 'Nama Post',
                'ar' => 'اسم الوظيفة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_day&name',
            'text' => [
                'en' => 'Day and Name',
                'id' => 'Tanggal dan Nama',
                'ar' => 'اليوم والاسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_month&name',
            'text' => [
                'en' => 'Month and Name',
                'id' => 'Bulan dan Nama',
                'ar' => 'الشهر والاسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_post_custom',
            'text' => [
                'en' => 'Custom',
                'id' => 'Kustom',
                'ar' => 'العادة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'title_page_permalinks',
            'text' => [
                'en' => 'Page Permalinks',
                'id' => 'Permalink Halaman',
                'ar' => 'الروابط الثابتة الصفحة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_pagename',
            'text' => [
                'en' => 'Page Name',
                'id' => 'Nama Halaman',
                'ar' => 'اسم الصفحة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_page_with_prefix',
            'text' => [
                'en' => 'With Prefix',
                'id' => 'Dengan Prefiks',
                'ar' => 'مع البادئة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'title_category_permalinks',
            'text' => [
                'en' => 'Category Permalinks',
                'id' => 'Permalink Kategori',
                'ar' => 'فئة الروابط الثابتة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_category_name',
            'text' => [
                'en' => 'Category Name',
                'id' => 'Nama Kategori',
                'ar' => 'اسم التصنيف'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_category_with_prefix',
            'text' => [
                'en' => 'With Prefix',
                'id' => 'Dengan Prefiks',
                'ar' => 'مع البادئة'
            ]
        ]);

        //BUTTON
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Save',
                'id' => 'Simpan',
                'ar' => 'يحفظ'
            ]
        ]);

        /*
        |--------------------------------
        | Message
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'message_cannot_be_empty',
            'text' => [
                'en' => 'Field cannot be empty!',
                'id' => 'Isian tidak boleh kosong!',
                'ar' => 'لا يمكن أن يكون الحقل فارغًا!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'message_unauthorized_action',
            'text' => [
                'en' => 'Unauthorized action!',
                'id' => 'Tindakan tidak sah!',
                'ar' => 'عمل غير مصرح به!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'message_import_successfully',
            'text' => [
                'en' => 'Import successfully!',
                'id' => 'Import berhasil!',
                'ar' => 'تم الاستيراد بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'message_generate_sitemap_successfully',
            'text' => [
                'en' => 'Generate sitemap successfully!',
                'id' => 'Generate peta situs dengan sukses!',
                'ar' => 'إنشاء خريطة الموقع بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'register_enabled',
            'text' => [
                'en' => 'Register enabled!',
                'id' => 'Register diaktifkan!',
                'ar' => 'تم تمكين التسجيل!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'register_disabled',
            'text' => [
                'en' => 'Register disabled!',
                'id' => 'Register dinonaktifkan!',
                'ar' => 'تم تعطيل التسجيل!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'email_verification_enabled',
            'text' => [
                'en' => 'Email Verification enabled!',
                'id' => 'Verifikasi Surel diaktifkan!',
                'ar' => 'تم تفعيل التحقق من البريد الإلكتروني!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'email_verification_disabled',
            'text' => [
                'en' => 'Email Verification disabled!',
                'id' => 'Verifikasi Surel dinonaktifkan!',
                'ar' => 'تم تعطيل التحقق من البريد الإلكتروني!'
            ]
        ]);

        LanguageLine::create([
            'group' => 'setting',
            'key' => 'label_symlink',
            'text' => [
                'en' => 'Symlink',
                'id' => 'Symlink',
                'ar' => 'ارتباط رمزي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'btn_create',
            'text' => [
                'en' => 'Create',
                'id' => 'Buat',
                'ar' => 'خلق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'btn_symlink_again',
            'text' => [
                'en' => 'Symlink Again',
                'id' => 'Ulangi membuat Symlink',
                'ar' => 'الارتباط الرمزي مرة أخرى'
            ]
        ]);
        LanguageLine::create([
            'group' => 'setting',
            'key' => 'message_symlink_successfully',
            'text' => [
                'en' => 'Symlink created successfully',
                'id' => 'Membuat symlink berhasil!',
                'ar' => 'تم إنشاء الارتباط الرمزي بنجاح'
            ]
        ]);
    }
}
