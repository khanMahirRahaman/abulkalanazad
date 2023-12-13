<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class ThemesTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'author',
            'text' => [
                'en' => 'Author',
                'id' => 'Penulis',
                'ar' => 'مؤلف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'sharing_is_caring',
            'text' => [
                'en' => 'Sharing is caring',
                'id' => 'Bagikan konten ini',
                'ar' => 'المشاركة تعنى الاهتمام'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'posted_on',
            'text' => [
                'en' => 'Posted on',
                'id' => 'Diposting pada',
                'ar' => 'نشر على'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'by',
            'text' => [
                'en' => 'By',
                'id' => 'Oleh',
                'ar' => 'بواسطة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'advertisement',
            'text' => [
                'en' => 'Advertisement',
                'id' => 'Iklan',
                'ar' => 'الإعلانات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'all_popular_posts',
            'text' => [
                'en' => 'All Popular Posts',
                'id' => 'Semua Posting Populer',
                'ar' => 'جميع المشاركات الشعبية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'all_news',
            'text' => [
                'en' => 'All News',
                'id' => 'Semua Berita',
                'ar' => 'جميع الأخبار'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'best_of_the_week',
            'text' => [
                'en' => 'Best Of The Week',
                'id' => 'Terbaik Minggu Ini',
                'ar' => 'أفضل ما في الأسبوع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'category',
            'text' => [
                'en' => 'Category',
                'id' => 'Kategori',
                'ar' => 'فئة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'category_description',
            'text' => [
                'en' => 'Showing all posts with category',
                'id' => 'Tampilkan semua postingan dengan kategori',
                'ar' => 'إظهار جميع المشاركات مع الفئة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact',
            'text' => [
                'en' => 'Contact',
                'id' => 'Kontak',
                'ar' => 'اتصل'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_us_subtitle',
            'text' => [
                'en' => 'We tell you',
                'id' => 'Kami memberi tahu Anda',
                'ar' => 'نقول لك'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_message',
            'text' => [
                'en' => 'Your message',
                'id' => 'Pesanmu',
                'ar' => 'رسالتك'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'company_info',
            'text' => [
                'en' => 'Company Info',
                'id' => 'Info Perusahaan',
                'ar' => 'معلومات الشركة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'follow_us',
            'text' => [
                'en' => 'Follow Us',
                'id' => 'Ikuti Kami',
                'ar' => 'تابعنا'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'follow_us_description',
            'text' => [
                'en' => 'Follow us and stay in touch to get the latest news',
                'id' => 'Ikuti kami untuk mendapatkan berita terbaru',
                'ar' => 'تابعنا وابق على اتصال للحصول على آخر الأخبار'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'home',
            'text' => [
                'en' => 'Home',
                'id' => 'Beranda',
                'ar' => 'الصفحة الرئيسية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'hot_news',
            'text' => [
                'en' => 'Hot News',
                'id' => 'Berita Hangat',
                'ar' => 'أخبار عاجلة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'just_another_news',
            'text' => [
                'en' => 'Just Another News',
                'id' => 'Berita Lain',
                'ar' => 'مجرد خبر آخر'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'latest_news',
            'text' => [
                'en' => 'Latest News',
                'id' => 'Berita Terbaru',
                'ar' => 'أحدث الأخبار'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'more',
            'text' => [
                'en' => 'More',
                'id' => 'lebih',
                'ar' => 'أكثر'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'newsletter',
            'text' => [
                'en' => 'Newsletter',
                'id' => 'Berlangganan',
                'ar' => 'النشرة الإخبارية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'newsletter_description',
            'text' => [
                'en' => 'By subscribing you will receive new articles in your email.',
                'id' => 'Dengan berlangganan Anda akan menerima artikel baru di email Anda.',
                'ar' => 'بالاشتراك سوف تتلقى مقالات جديدة في بريدك الإلكتروني.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'next',
            'text' => [
                'en' => 'Next',
                'id' => 'Selanjutnya',
                'ar' => 'التالي'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'no_tag',
            'text' => [
                'en' => 'No Tag',
                'id' => 'Tidak Ada Tag',
                'ar' => 'لا علامه'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'popular',
            'text' => [
                'en' => 'Popular',
                'id' => 'Populer',
                'ar' => 'جمع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'popular_tags',
            'text' => [
                'en' => 'Popular Tags',
                'id' => 'Tag Populer',
                'ar' => 'الكلمات الشعبية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'powered_by_disqus',
            'text' => [
                'en' => 'comments powered by Disqus.',
                'id' => 'didukung Disqus',
                'ar' => 'التعليقات مدعوم من Disqus.'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'previous',
            'text' => [
                'en' => 'Previous',
                'id' => 'Sebelumnya',
                'ar' => 'سابق'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'recent_post',
            'text' => [
                'en' => 'Recent Post',
                'id' => 'Postingan Terbaru',
                'ar' => 'المنشور الاخير'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'recommended',
            'text' => [
                'en' => 'Recommended',
                'id' => 'Direkomendasikan',
                'ar' => 'موصى به'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'search_found_in',
            'text' => [
                'en' => 'found in',
                'id' => 'ditemukan di',
                'ar' => 'عثر عليه في'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'search_keyword',
            'text' => [
                'en' => 'Search results for keyword',
                'id' => 'Hasil pencarian untuk kata kunci',
                'ar' => 'نتائج البحث عن الكلمات الرئيسية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'posts',
            'text' => [
                'en' => 'posts',
                'id' => 'post',
                'ar' => 'المشاركات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'see_all',
            'text' => [
                'en' => 'See All',
                'id' => 'Lihat Semua',
                'ar' => 'اظهار الكل'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'sidebar',
            'text' => [
                'en' => 'Sidebar',
                'id' => 'Sidebar',
                'ar' => 'الشريط الجانبي'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'subscribe',
            'text' => [
                'en' => 'Subscribe',
                'id' => 'Langganan',
                'ar' => 'الإشتراك'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'tag',
            'text' => [
                'en' => 'Tag',
                'id' => 'Tag',
                'ar' => 'بطاقة شعار'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'trending_tags',
            'text' => [
                'en' => 'Trending Tags',
                'id' => 'Tag Trending',
                'ar' => 'تتجه العلامات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'type_something_here',
            'text' => [
                'en' => 'Type something here',
                'id' => 'Ketik sesuatu di sini',
                'ar' => 'اكتب شيئًا هنا'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'views',
            'text' => [
                'en' => 'Views',
                'id' => 'Dilihat',
                'ar' => 'الآراء'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'your_mail',
            'text' => [
                'en' => 'Your mail',
                'id' => 'Suratmu',
                'ar' => 'بريدك'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'you_may_also_like',
            'text' => [
                'en' => 'You May Also Like',
                'id' => 'Anda Mungkin Juga Menyukai',
                'ar' => 'ربما يعجبك أيضا'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_us',
            'text' => [
                'en' => 'Contact US',
                'id' => 'Kontak Kami',
                'ar' => 'اتصل بنا'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_email',
            'text' => [
                'en' => 'E-Mail',
                'id' => 'E-Mail',
                'ar' => 'البريد الإلكتروني'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_subject',
            'text' => [
                'en' => 'Subject',
                'id' => 'subyek',
                'ar' => 'موضوعات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_button',
            'text' => [
                'en' => 'Send Message',
                'id' => 'Kirim Pesan',
                'ar' => 'أرسل رسالة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contact_phone',
            'text' => [
                'en' => 'Phone',
                'id' => 'Telepon',
                'ar' => 'هاتف'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'sponsored',
            'text' => [
                'en' => 'Sponsored',
                'id' => 'Sponsor',
                'ar' => 'برعاية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'your_captcha_is_not_yet_configured',
            'text' => [
                'en' => 'Your captcha is not yet configured*',
                'id' => 'Captcha Anda belum dikonfigurasi*',
                'ar' => 'لم يتم تكوين رمز التحقق (captcha) الخاص بك بعد *'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'showing_all_posts_with_tag',
            'text' => [
                'en' => 'Showing all posts with tag',
                'id' => 'Tampilkan semua postingan dengan tag',
                'ar' => 'إظهار جميع المشاركات مع البطاقات'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'no_image',
            'text' => [
                'en' => 'No Image',
                'id' => 'Tidak Ada Gambar',
                'ar' => 'لا توجد صورة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'no_display',
            'text' => [
                'en' => 'No display',
                'id' => 'Tidak ada tampilan',
                'ar' => 'لا يوجد عرض'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'search',
            'text' => [
                'en' => 'Search',
                'id' => 'Cari',
                'ar' => 'بحث'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'page',
            'text' => [
                'en' => 'Page',
                'id' => 'Halaman',
                'ar' => 'صفحة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'all_popular_news',
            'text' => [
                'en' => 'All Popular News',
                'id' => 'Semua Berita Populer',
                'ar' => 'كل الأخبار الشعبية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'contacts_page',
            'text' => [
                'en' => "Contact's Page",
                'id' => 'Halaman Kontak',
                'ar' => 'صفحة جهة الاتصال'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'about_us',
            'text' => [
                'en' => 'About us',
                'id' => 'Tentang Kami',
                'ar' => 'معلومات عنا'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'Unauthorized',
            'text' => [
                'en' => 'Unauthorized',
                'id' => 'Tidak Sah',
                'ar' => 'غير مصرح'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'Forbidden',
            'text' => [
                'en' => 'Forbidden',
                'id' => 'Terlarang',
                'ar' => 'ممنوع'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'Page could not be found',
            'text' => [
                'en' => 'Page could not be found',
                'id' => 'Halaman tidak dapat ditemukan',
                'ar' => 'لا يمكن العثور على الصفحة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'Page Expired',
            'text' => [
                'en' => 'Page Expired',
                'id' => 'Halaman Kedaluwarsa',
                'ar' => 'الصفحة منتهية الصلاحية'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'Too Many Requests',
            'text' => [
                'en' => 'Too Many Requests',
                'id' => 'Terlalu Banyak Permintaan',
                'ar' => 'طلبات كثيرة جدا'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'Server Error',
            'text' => [
                'en' => 'Server Error',
                'id' => 'Server Error',
                'ar' => 'خطأ في الخادم'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'The page you are looking for is not available please check the url you are going to.',
            'text' => [
                'en' => 'The page you are looking for is not available please check the url you are going to.',
                'id' => 'Halaman yang Anda cari tidak tersedia, silakan periksa url yang Anda tuju',
                'ar' => 'الصفحة التي تبحث عنها غير متوفرة ، يرجى التحقق من عنوان url الذي ستنتقل إليه'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'Service Unavailable',
            'text' => [
                'en' => 'Service Unavailable',
                'id' => 'Layanan tidak tersedia',
                'ar' => 'الخدمة غير متوفرة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'theme_magz',
            'key' => 'we\'re doing maintenance, come back later',
            'text' => [
                'en' => 'we\'re doing maintenance, come back later',
                'id' => 'kami sedang melakukan pemeliharaan, kembali lagi nanti',
                'ar' => 'نحن نقوم بالصيانة ، عد لاحقًا'
            ]
        ]);
    }
}
