<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cache::forget('settings');

        Setting::insert([
            ['group' => 'site_information', 'key' => 'company_name', 'value' => 'Laramagz'],
            ['group' => 'site_information', 'key' => 'site_name', 'value' => 'Laramagz'],
            ['group' => 'site_information', 'key' => 'site_url', 'value' => 'http://localhost:8000'],
            ['group' => 'site_information', 'key' => 'site_email', 'value' => 'admin@example.com'],
            ['group' => 'site_information', 'key' => 'site_phone', 'value' => ''],
            ['group' => 'site_information', 'key' => 'street', 'value' => ''],
            ['group' => 'site_information', 'key' => 'city', 'value' => ''],
            ['group' => 'site_information', 'key' => 'postal_code', 'value' => ''],
            ['group' => 'site_information', 'key' => 'state', 'value' => ''],
            ['group' => 'site_information', 'key' => 'country', 'value' => ''],
            ['group' => 'site_information', 'key' => 'full_address', 'value' => ''],
            ['group' => 'site_information', 'key' => 'site_description', 'value' => 'Content management system based on Laravel'],
            ['group' => 'site_information', 'key' => 'contact_description', 'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, nesciunt?'],
            ['group' => 'site_information', 'key' => 'meta_keyword', 'value' => ''],
            ['group' => 'site_config', 'key' => 'maintenance', 'value' => 'n'],
            ['group' => 'site_config', 'key' => 'current_theme', 'value' => 'Laramagz B5'],
            ['group' => 'site_config', 'key' => 'current_theme_dir', 'value' => 'magz'],
            ['group' => 'site_config', 'key' => 'register', 'value' => 'n'],
            ['group' => 'site_config', 'key' => 'email_verification', 'value' => 'n'],
            ['group' => 'site_config', 'key' => 'display_language', 'value' => 'y'],
            ['group' => 'site_config', 'key' => 'analytics_view_id', 'value' => ''],
            ['group' => 'site_config', 'key' => 'dashboard_language', 'value' => 'en'],
            ['group' => 'site_config', 'key' => 'theme_language', 'value' => 'en'],
            ['group' => 'site_config', 'key' => 'credentials_file', 'value' => ''],
            ['group' => 'site_config', 'key' => 'symlink', 'value' => 'false'],
            ['group' => 'logo_image', 'key' => 'favicon', 'value' => ''],
            ['group' => 'logo_image', 'key' => 'logo_web_light', 'value' => ''],
            ['group' => 'logo_image', 'key' => 'logo_web_dark', 'value' => ''],
            ['group' => 'logo_image', 'key' => 'og_image', 'value' => ''],
            ['group' => 'logo_image', 'key' => 'logo_dashboard', 'value' => ''],
            ['group' => 'logo_image', 'key' => 'logo_auth', 'value' => ''],
            ['group' => 'google', 'key' => 'google_analytics_id', 'value' => 'UA-166274905-1'],
            ['group' => 'google', 'key' => 'google_map_code', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.65295081513!2d106.68942955272045!3d-6.229386699204512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1647484748219!5m2!1sen!2sid'],
            ['group' => 'google', 'key' => 'publisher_id', 'value' => ''],
            ['group' => 'google', 'key' => 'google_site_verification', 'value' => 'DM6yrSbyEPMHikBIGXjUlRDyzjs49GLjXy_wQ3T3SP0'],
            ['group' => 'google', 'key' => 'disqus_shortname', 'value' => 'retenvi'],
            ['group' => 'google', 'key' => 'mailchimp', 'value' => ''],
            ['group' => 'permalinks', 'key' => 'permalink_type', 'value' => 'custom'],
            ['group' => 'permalinks', 'key' => 'permalink', 'value' => 'news'],
            ['group' => 'permalinks', 'key' => 'permalink_old_custom', 'value' => 'news'],
            ['group' => 'page_permalinks', 'key' => 'page_permalink_type', 'value' => 'with_prefix'],
            ['group' => 'category_permalinks', 'key' => 'category_permalink_type', 'value' => 'with_prefix_category'],
        ]);
    }
}
