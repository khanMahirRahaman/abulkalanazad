<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
         \App\Models\Contact::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            SettingSeeder::class,
            LanguageSeeder::class,
            SocialmediaSeeder::class,
            UserSeeder::class,
            TermSeeder::class,
            TranslationSeeder::class,
            PostSeeder::class,
            PostIdSeeder::class,
            PostArSeeder::class,
            MenuSeeder::class,
            MenuItemSeeder::class,
            AdvertisementSeeder::class,
            AdPlacementSeeder::class,
            AdminlteTranslationSeeder::class,
            GeneralTranslationSeeder::class,
            LocalizationTranslationSeeder::class,
            PostTranslationSeeder::class,
            PageTranslationSeeder::class,
            ThemesTranslationSeeder::class,
            AdvertisementTranslationSeeder::class,
            SettingTranslationSeeder::class,
            ProfileTranslationSeeder::class,
            DashboardTranslationSeeder::class,
            AnalyticsTranslationSeeder::class,
            UserTranslationSeeder::class,
            PermissionTranslationSeeder::class,
            RoleTranslationSeeder::class,
            MediaTranslationSeeder::class,
            NotificationTranslationSeeder::class,
            MenuTranslationSeeder::class,
            EnvTranslationSeeder::class,
            AppearanceTranslationSeeder::class,
            ContactTranslationSeeder::class,
            AuthTranslationSeeder::class,
            SocialmediaTranslationSeeder::class,
            SiteSocialmediaSeeder::class,
            TermTranslationSeeder::class
        ]);
    }
}
