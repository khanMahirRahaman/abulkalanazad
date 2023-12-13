<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class MenuTranslationSeeder extends Seeder
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
        | Table
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'column_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);

        /*
        |--------------------------------
        | Form Menu
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'label_name',
            'text' => [
                'en' => 'Name',
                'id' => 'Nama',
                'ar' => 'اسم'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'placeholder_name',
            'text' => [
                'en' => 'Enter menu name',
                'id' => 'Masukkan nama menu',
                'ar' => 'أدخل اسم القائمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'label_language',
            'text' => [
                'en' => 'Language',
                'id' => 'Bahasa',
                'ar' => 'لغة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'button_submit',
            'text' => [
                'en' => 'Add New Menu',
                'id' => 'Tambah Menu Baru',
                'ar' => 'أضف قائمة جديدة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'button_update',
            'text' => [
                'en' => 'Update Menu',
                'id' => 'Ubah Menu',
                'ar' => 'قائمة التحديث'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'button_cancel',
            'text' => [
                'en' => 'Cancel',
                'id' => 'Batal',
                'ar' => 'يلغي'
            ]
        ]);

        /*
        |--------------------------------
        | Form Menu Item
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'title_menu_structure',
            'text' => [
                'en' => 'Menu Structure',
                'id' => 'Struktur Menu',
                'ar' => 'هيكل القائمة'
            ]
        ]);

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'title_menu',
            'text' => [
                'en' => 'Menu Items',
                'id' => 'Item Menu',
                'ar' => 'عناصر القائمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'title_add_menu_item',
            'text' => [
                'en' => 'Add Menu Item',
                'id' => 'Tambah Item Menu',
                'ar' => 'إضافة عنصر قائمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'label_url',
            'text' => [
                'en' => 'URL',
                'id' => 'URL',
                'ar' => 'URL'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'label_label',
            'text' => [
                'en' => 'Label',
                'id' => 'Label',
                'ar' => 'مُلصَق'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'label_class',
            'text' => [
                'en' => 'Class CSS (optional)',
                'id' => 'Class CSS (opsional)',
                'ar' => 'فئة CSS (اختياري)'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'button_cancel',
            'text' => [
                'en' => 'Cancel',
                'id' => 'Batal',
                'ar' => 'يلغي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'button_menu_item_submit',
            'text' => [
                'en' => 'Add Menu Item',
                'id' => 'Tambah Item Menu',
                'ar' => 'إضافة عنصر قائمة'
            ]
        ]);

        /*
        |--------------------------------
        | Menu
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'title_menu_items',
            'text' => [
                'en' => 'Menu Items',
                'id' => 'Menu Item',
                'ar' => 'عناصر القائمة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'button_menu_item_edit',
            'text' => [
                'en' => 'Edit',
                'id' => 'Edit',
                'ar' => 'يحرر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'button_save',
            'text' => [
                'en' => 'Save',
                'id' => 'Simpan',
                'ar' => 'يحفظ'
            ]
        ]);

        /*
        |--------------------------------
        | Messages
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'deleted_menu_item_successfully',
            'text' => [
                'en' => 'Deleted menu item successfully!',
                'id' => 'Item menu berhasil dihapus!',
                'ar' => 'تم حذف عنصر القائمة بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'delete_this_item',
            'text' => [
                'en' => 'You delete this item.',
                'id' => 'Anda menghapus item ini.',
                'ar' => 'قمت بحذف هذا العنصر.'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'have_delete_all_item_first',
            'text' => [
                'en' => 'You have to delete all items first!',
                'id' => 'Anda harus menghapus semua item terlebih dahulu!',
                'ar' => 'يجب عليك حذف جميع العناصر أولا!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'update_item_successfully',
            'text' => [
                'en' => 'Update Item Successfully!',
                'id' => 'Perbarui Item Berhasil!',
                'ar' => 'تم تحديث العنصر بنجاح!'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'add_menu_successfully',
            'text' => [
                'en' => 'Add Menu successfully!',
                'id' => 'Tambah Menu berhasil!',
                'ar' => 'أضف قائمة بنجاح!'
            ]
        ]);

        /*
        |--------------------------------
        | Menu
        |--------------------------------
        */

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'dashboard',
            'text' => [
                'en' => 'Dashboard',
                'id' => 'Dasbor',
                'ar' => 'لوحة القيادة'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'manage_content',
            'text' => [
                'en' => 'Manage Content',
                'id' => 'Kelola Konten',
                'ar' => 'إدارة المحتوى'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'posts',
            'text' => [
                'en' => 'Posts',
                'id' => 'Post',
                'ar' => 'المشاركات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'all_posts',
            'text' => [
                'en' => 'All Posts',
                'id' => 'Semua Post',
                'ar' => 'جميع المشاركات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'addnew_post',
            'text' => [
                'en' => 'Add New Post',
                'id' => 'Tambah Baru Post',
                'ar' => 'أضف منشور جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'categories',
            'text' => [
                'en' => 'Categories',
                'id' => 'Kategori',
                'ar' => 'فئات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'tags',
            'text' => [
                'en' => 'Tags',
                'id' => 'Tag',
                'ar' => 'العلامات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'pages',
            'text' => [
                'en' => 'Pages',
                'id' => 'Halaman',
                'ar' => 'الصفحات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'all_pages',
            'text' => [
                'en' => 'All Pages',
                'id' => 'Semua Halaman',
                'ar' => 'كل الصفحات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'addnew',
            'text' => [
                'en' => 'Add New',
                'id' => 'Tambah Baru',
                'ar' => 'اضف جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'contacts',
            'text' => [
                'en' => 'Contacts',
                'id' => 'Kontak',
                'ar' => 'جهات الاتصال'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'manage_appearance',
            'text' => [
                'en' => 'Manage Appearance',
                'id' => 'Kelola Tampilan',
                'ar' => 'إدارة المظهر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'appearance',
            'text' => [
                'en' => 'Appearance',
                'id' => 'Tampilan',
                'ar' => 'مظهر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'menu',
            'text' => [
                'en' => 'Menu',
                'id' => 'Menu',
                'ar' => 'قائمة الطعام'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'themes',
            'text' => [
                'en' => 'Themes',
                'id' => 'Tema',
                'ar' => 'ثيمات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'localization',
            'text' => [
                'en' => 'Localization',
                'id' => 'Lokalisasi',
                'ar' => 'الموقع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'languages',
            'text' => [
                'en' => 'Languages',
                'id' => 'Bahasa',
                'ar' => 'اللغات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'translations',
            'text' => [
                'en' => 'Translations',
                'id' => 'Translasi',
                'ar' => 'الترجمات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'advertisement',
            'text' => [
                'en' => 'Advertisement',
                'id' => 'Iklan',
                'ar' => 'الإعلانات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'placements',
            'text' => [
                'en' => 'Placements',
                'id' => 'Placement',
                'ar' => 'المواضع'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'adunit',
            'text' => [
                'en' => 'Ad Unit',
                'id' => 'Unit Iklan',
                'ar' => 'الوحدة الإعلانية'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'manage_files',
            'text' => [
                'en' => 'Manage Files',
                'id' => 'Kelola File',
                'ar' => 'إدارة الملفات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'media',
            'text' => [
                'en' => 'Media',
                'id' => 'Media',
                'ar' => 'وسائل الإعلام'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'gallery',
            'text' => [
                'en' => 'Gallery',
                'id' => 'Galeri',
                'ar' => 'صالة عرض'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'filemanager',
            'text' => [
                'en' => 'Filemanager',
                'id' => 'Manajer File',
                'ar' => 'مدير الملفات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'account_settings',
            'text' => [
                'en' => 'Account Settings',
                'id' => 'Pengaturan Akun',
                'ar' => 'إعدادت الحساب'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'profile',
            'text' => [
                'en' => 'Profile',
                'id' => 'Profil',
                'ar' => 'الملف الشخصي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'change_password',
            'text' => [
                'en' => 'Change Password',
                'id' => 'Ganti Kata Sandi',
                'ar' => 'غير كلمة السر'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'manage_users',
            'text' => [
                'en' => 'Manage Users',
                'id' => 'Kelola Pengguna',
                'ar' => 'ادارة المستخدمين'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'users',
            'text' => [
                'en' => 'Users',
                'id' => 'Pengguna',
                'ar' => 'المستخدمون'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'all_users',
            'text' => [
                'en' => 'All Users',
                'id' => 'Semua Pengguna',
                'ar' => 'جميع المستخدمين'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'addnew_user',
            'text' => [
                'en' => 'Add New User',
                'id' => 'Tambah Pengguna Baru',
                'ar' => 'إضافة مستخدم جديد'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'roles',
            'text' => [
                'en' => 'Roles',
                'id' => 'Role',
                'ar' => 'الأدوار'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'permissions',
            'text' => [
                'en' => 'Permissions',
                'id' => 'Izin',
                'ar' => 'أذونات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'socialmedia',
            'text' => [
                'en' => 'Social Media',
                'id' => 'Media Sosial',
                'ar' => 'وسائل التواصل الاجتماعي'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'manage_settings',
            'text' => [
                'en' => 'Manage Settings',
                'id' => 'Kelola Pengaturan',
                'ar' => 'إدارة الإعدادات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'settings',
            'text' => [
                'en' => 'Settings',
                'id' => 'Pengaturan',
                'ar' => 'إعدادات'
            ]
        ]);
        LanguageLine::create([
            'group' => 'menu',
            'key' => 'env_editor',
            'text' => [
                'en' => 'Env Editor',
                'id' => 'Editor Env',
                'ar' => 'محرر Env'
            ]
        ]);

        LanguageLine::create([
            'group' => 'menu',
            'key' => 'visit_site',
            'text' => [
                'en' => 'Visit Site',
                'id' => 'Lihat Situs',
                'ar' => 'تفضل بزيارة الموقع'
            ]
        ]);

    }


}
