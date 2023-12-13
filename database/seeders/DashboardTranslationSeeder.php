<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class DashboardTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'title_dashboard',
            'text' => [
                'en' => 'Dashboard',
                'id' => 'Beranda',
                'ar' => 'لوحة القيادة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'dashboard',
            'text' => [
                'en' => 'Dashboard',
                'id' => 'Beranda',
                'ar' => 'لوحة القيادة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'posts',
            'text' => [
                'en' => 'Posts',
                'id' => 'Post',
                'ar' => 'المشاركات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'pages',
            'text' => [
                'en' => 'Pages',
                'id' => 'Halaman',
                'ar' => 'الصفحات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'categories',
            'text' => [
                'en' => 'Categories',
                'id' => 'Kategori',
                'ar' => 'فئات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'tags',
            'text' => [
                'en' => 'Tags',
                'id' => 'Tag',
                'ar' => 'العلامات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'users',
            'text' => [
                'en' => 'Users',
                'id' => 'Pengguna',
                'ar' => 'المستخدمون'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'roles',
            'text' => [
                'en' => 'Roles',
                'id' => 'Roles',
                'ar' => 'الأدوار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'contacts',
            'text' => [
                'en' => 'Contacts',
                'id' => 'Kontak',
                'ar' => 'جهات الاتصال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'galleries',
            'text' => [
                'en' => 'Galleries',
                'id' => 'Galeri',
                'ar' => 'صالات العرض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'google_analytics',
            'text' => [
                'en' => 'Google Analytics',
                'id' => 'Google Analytics',
                'ar' => 'تحليلات كوكل'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'sessions_by_device',
            'text' => [
                'en' => 'Sessions by device',
                'id' => 'Sessions by device',
                'ar' => 'الجلسات حسب الجهاز'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'visitor_&_pageview',
            'text' => [
                'en' => 'Visitor & Pageview',
                'id' => 'Visitor & Pageview',
                'ar' => 'الزوار ومرات مشاهدة الصفحة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'dashboard',
            'key' => 'title_google_analytics',
            'text' => [
                'en' => 'Google Analytics',
                'id' => 'Google Analytics',
                'ar' => 'تحليلات كوكل'
            ]
        ]);
    }
}
