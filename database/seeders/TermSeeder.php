<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create category
        Term::create([
            'name' => 'News',
            'slug' => 'news',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => 'YXIl4Ks1TQgTuzF3uFmTX5w18JlQBb0dEMTz2DFw.jpg',
            'translation' => json_encode([
                'id' => 'berita',
                'ar' => 'akhb-r'
            ])
        ]);
        Term::create([
            'name' => 'Berita',
            'slug' => 'berita',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => 'YXIl4Ks1TQgTuzF3uFmTX5w18JlQBb0dEMTz2DFw.jpg',
            'translation' => json_encode([
                'en' => 'news',
                'ar' => 'akhb-r'
            ])
        ]);
        Term::create([
            'name' => 'أخبار',
            'slug' => 'akhb-r',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => 'YXIl4Ks1TQgTuzF3uFmTX5w18JlQBb0dEMTz2DFw.jpg',
            'translation' => json_encode([
                'en' => 'news',
                'id' => 'berita'
            ])
        ]);

        Term::create([
            'name' => 'Technology',
            'slug' => 'technology',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => 'ZFlZkAgweg3V0VCFMlzv7IGN2UH80XzmDNuVn26r.jpg',
            'translation' => json_encode([
                'id' => 'teknologi',
                'ar' => 'tkny'
            ])
        ]);
        Term::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => 'ZFlZkAgweg3V0VCFMlzv7IGN2UH80XzmDNuVn26r.jpg',
            'translation' => json_encode([
                'en' => 'technology',
                'ar' => 'tkny'
            ])
        ]);
        Term::create([
            'name' => 'تقنية',
            'slug' => 'tkny',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => 'ZFlZkAgweg3V0VCFMlzv7IGN2UH80XzmDNuVn26r.jpg',
            'translation' => json_encode([
                'en' => 'technology',
                'id' => 'teknologi'
            ])
        ]);
        Term::create([
            'name' => 'Business',
            'slug' => 'business',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => 'Ro9qFYIZYvWMZnAhjFjylaYfaknpD4TJvhEfhEnL.jpg',
            'translation' => json_encode([
                'id' => 'bisnis',
                'ar' => 'aam-l'
            ])
        ]);
        Term::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => 'Ro9qFYIZYvWMZnAhjFjylaYfaknpD4TJvhEfhEnL.jpg',
            'translation' => json_encode([
                'en' => 'business',
                'ar' => 'aam-l'
            ])
        ]);
        Term::create([
            'name' => 'اعمال',
            'slug' => 'aam-l',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => 'Ro9qFYIZYvWMZnAhjFjylaYfaknpD4TJvhEfhEnL.jpg',
            'translation' => json_encode([
                'en' => 'business',
                'id' => 'bisnis'
            ])
        ]);

        Term::create([
            'name' => 'Marketplace',
            'slug' => 'marketplace',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => 'y3d4lTteGiB4Bwna2DRr1UwxVK7CQOSGhp8s77Uf.jpg',
            'translation' => json_encode([
                'id' => 'pasar',
                'ar' => 'lmtgr'
            ])
        ]);
        Term::create([
            'name' => 'Pasar',
            'slug' => 'pasar',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => 'y3d4lTteGiB4Bwna2DRr1UwxVK7CQOSGhp8s77Uf.jpg',
            'translation' => json_encode([
                'en' => 'marketplace',
                'ar' => 'lmtgr'
            ])
        ]);
        Term::create([
            'name' => 'المتجر',
            'slug' => 'lmtgr',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => 'y3d4lTteGiB4Bwna2DRr1UwxVK7CQOSGhp8s77Uf.jpg',
            'translation' => json_encode([
                'en' => 'marketplace',
                'id' => 'pasar'
            ])
        ]);

        Term::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => 'VYFgw7KXl9UKVxriKuhWVuV9k12HWeFDUiNgATrH.jpg',
            'translation' => json_encode([
                'id' => 'gaya-hidup',
                'ar' => 'aslob-lhy'
            ])
        ]);
        Term::create([
            'name' => 'Gaya Hidup',
            'slug' => 'gaya-hidup',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => 'VYFgw7KXl9UKVxriKuhWVuV9k12HWeFDUiNgATrH.jpg',
            'translation' => json_encode([
                'en' => 'lifestyle',
                'ar' => 'aslob-lhy'
            ])
        ]);
        Term::create([
            'name' => 'أسلوب الحياة',
            'slug' => 'aslob-lhy',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => 'VYFgw7KXl9UKVxriKuhWVuV9k12HWeFDUiNgATrH.jpg',
            'translation' => json_encode([
                'en' => 'lifestyle',
                'id' => 'gaya-hidup'
            ])
        ]);

        Term::create([
            'name' => 'Sport',
            'slug' => 'sport',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => 'dkPNYuU3NlRjn4glKjW9yUi9wbTaqAhea7NZiQaD.jpg',
            'translation' => json_encode([
                'id' => 'olahraga',
                'ar' => 'ry-d'
            ])
        ]);
        Term::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => 'dkPNYuU3NlRjn4glKjW9yUi9wbTaqAhea7NZiQaD.jpg',
            'translation' => json_encode([
                'en' => 'sport',
                'ar' => 'ry-d'
            ])
        ]);
        Term::create([
            'name' => 'رياضة',
            'slug' => 'ry-d',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => 'dkPNYuU3NlRjn4glKjW9yUi9wbTaqAhea7NZiQaD.jpg',
            'translation' => json_encode([
                'en' => 'sport',
                'id' => 'olahraga'
            ])
        ]);

        Term::create([
            'name' => 'Science',
            'slug' => 'science',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => '6Rpat1LIM0RExgD4evNprp1WLfz982KNlRRaUL79.jpg',
            'translation' => json_encode([
                'id' => 'Sains',
                'ar' => 'aalom'
            ])
        ]);
        Term::create([
            'name' => 'Sains',
            'slug' => 'sains',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => '6Rpat1LIM0RExgD4evNprp1WLfz982KNlRRaUL79.jpg',
            'translation' => json_encode([
                'en' => 'science',
                'ar' => 'aalom'
            ])
        ]);
        Term::create([
            'name' => 'علوم',
            'slug' => 'aalom',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => '6Rpat1LIM0RExgD4evNprp1WLfz982KNlRRaUL79.jpg',
            'translation' => json_encode([
                'en' => 'science',
                'id' => 'sains'
            ])
        ]);

        Term::create([
            'name' => 'Medical',
            'slug' => 'medical',
            'language_id' => 1,
            'taxonomy' => 'category',
            'image' => '43A20CLGJYJMs2lPZiHHhdp6Cndso6vstDkWZ759.jpg',
            'translation' => json_encode([
                'id' => 'medis',
                'ar' => 'tby'
            ])
        ]);
        Term::create([
            'name' => 'Medis',
            'slug' => 'medis',
            'language_id' => 2,
            'taxonomy' => 'category',
            'image' => '43A20CLGJYJMs2lPZiHHhdp6Cndso6vstDkWZ759.jpg',
            'translation' => json_encode([
                'en' => 'medical',
                'ar' => 'tby'
            ])
        ]);
        Term::create([
            'name' => 'طبي',
            'slug' => 'tby',
            'language_id' => 3,
            'taxonomy' => 'category',
            'image' => '43A20CLGJYJMs2lPZiHHhdp6Cndso6vstDkWZ759.jpg',
            'translation' => json_encode([
                'en' => 'medical',
                'id' => 'medis'
            ])
        ]);

        // create tag
        Term::create([
            'name' => 'Social Media',
            'slug' => 'social-media',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'media-sosial',
                'ar' => 'os-l-lto-sl-l-gtm-aay'
            ])
        ]);

        Term::create([
            'name' => 'Media Sosial',
            'slug' => 'media-sosial',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'social-media',
                'ar' => 'os-l-lto-sl-l-gtm-aay'
            ])
        ]);

        Term::create([
            'name' => 'وسائل التواصل الاجتماعي',
            'slug' => 'os-l-lto-sl-l-gtm-aay',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'social-media',
                'id' => 'media-sosial'
            ])
        ]);

        Term::create([
            'name' => 'Facebook',
            'slug' => 'facebook',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'facebook',
                'ar' => 'fysbok'
            ])
        ]);

        Term::create([
            'name' => 'Facebook',
            'slug' => 'facebook',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'facebook',
                'ar' => 'fysbok'
            ])
        ]);

        Term::create([
            'name' => 'فيسبوك',
            'slug' => 'fysbok',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'facebook',
                'id' => 'facebook'
            ])
        ]);

        Term::create([
            'name' => 'Donald Trump',
            'slug' => 'donald-trump',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'donald-trump',
                'ar' => 'don-ld-trmb'
            ])
        ]);
        Term::create([
            'name' => 'Donald Trump',
            'slug' => 'donald-trump',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'donald-trump',
                'ar' => 'don-ld-trmb'
            ])
        ]);
        Term::create([
            'name' => 'دونالد ترمب',
            'slug' => 'don-ld-trmb',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'donald-trump',
                'id' => 'donald-trump'
            ])
        ]);

        Term::create([
            'name' => 'United States',
            'slug' => 'united-states',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'united-states',
                'ar' => 'lol-y-t-lmthd-lamryky'
            ])
        ]);
        Term::create([
            'name' => 'United States',
            'slug' => 'united-states',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'united-states',
                'ar' => 'lol-y-t-lmthd-lamryky'
            ])
        ]);
        Term::create([
            'name' => 'الولايات المتحدة الأمريكية',
            'slug' => 'lol-y-t-lmthd-lamryky',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'united-states',
                'id' => 'united-states'
            ])
        ]);

        Term::create([
            'name' => 'China',
            'slug' => 'china',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'china',
                'ar' => 'lsyn'
            ])
        ]);
        Term::create([
            'name' => 'China',
            'slug' => 'china',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'china',
                'ar' => 'lsyn'
            ])
        ]);
        Term::create([
            'name' => 'الصين',
            'slug' => 'lsyn',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'china',
                'id' => 'china'
            ])
        ]);

        Term::create([
            'name' => 'Beauty',
            'slug' => 'beauty',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'kecantikan',
                'ar' => 'gm-l'
            ])
        ]);
        Term::create([
            'name' => 'Kecantikan',
            'slug' => 'kecantikan',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'beauty',
                'ar' => 'gm-l'
            ])
        ]);
        Term::create([
            'name' => 'جمال',
            'slug' => 'gm-l',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'beauty',
                'id' => 'kecantikan'
            ])
        ]);

        Term::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'mode',
                'ar' => 'mod'
            ])
        ]);
        Term::create([
            'name' => 'Mode',
            'slug' => 'mode',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'fashion',
                'ar' => 'mod'
            ])
        ]);
        Term::create([
            'name' => 'موضة',
            'slug' => 'mod',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'fashion',
                'id' => 'mode'
            ])
        ]);

        Term::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'gaya-hidup',
                'ar' => 'aslob-lhy'
            ])
        ]);
        Term::create([
            'name' => 'Gaya Hidup',
            'slug' => 'gaya-hidup',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'lifestyle',
                'ar' => 'aslob-lhy'
            ])
        ]);
        Term::create([
            'name' => 'أسلوب الحياة',
            'slug' => 'aslob-lhy',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'lifestyle',
                'id' => 'gaya-hidup'
            ])
        ]);

        Term::create([
            'name' => 'Couple',
            'slug' => 'couple',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'pasangan',
                'ar' => 'zog'
            ])
        ]);
        Term::create([
            'name' => 'Pasangan',
            'slug' => 'pasangan',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'couple',
                'ar' => 'zog'
            ])
        ]);
        Term::create([
            'name' => 'زوج',
            'slug' => 'zog',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'couple',
                'id' => 'pasangan'
            ])
        ]);

        Term::create([
            'name' => 'Romantic',
            'slug' => 'romantic',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'romantis',
                'ar' => 'rom-nsy'
            ])
        ]);
        Term::create([
            'name' => 'Romantis',
            'slug' => 'romantis',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'romantic',
                'ar' => 'rom-nsy'
            ])
        ]);
        Term::create([
            'name' => 'رومانسي',
            'slug' => 'rom-nsy',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'romantic',
                'id' => 'romantis'
            ])
        ]);

        Term::create([
            'name' => 'Stay Home',
            'slug' => 'stay-home',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'tetap-di-rumah',
                'ar' => 'bk-fy-lmnzl'
            ])
        ]);
        Term::create([
            'name' => 'Tetap di rumah',
            'slug' => 'tetap-di-rumah',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'stay-home',
                'ar' => 'bk-fy-lmnzl'
            ])
        ]);
        Term::create([
            'name' => 'ابق في المنزل',
            'slug' => 'bk-fy-lmnzl',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'stay-home',
                'id' => 'tetap-di-rumah'
            ])
        ]);


        Term::create([
            'name' => 'Explore Bali',
            'slug' => 'explore-bali',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'jelajahi-bali',
                'ar' => 'ktshf-b-ly'
            ])
        ]);
        Term::create([
            'name' => 'Jelajahi Bali',
            'slug' => 'jelajahi-bali',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'explore-bali',
                'ar' => 'ktshf-b-ly'
            ])
        ]);
        Term::create([
            'name' => 'اكتشف بالي',
            'slug' => 'ktshf-b-ly',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'explore-bali',
                'id' => 'jelajahi-bali'
            ])
        ]);

        Term::create([
            'name' => 'Startups',
            'slug' => 'startups',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'startups',
                'ar' => 'lshrk-t-ln-sh'
            ])
        ]);
        Term::create([
            'name' => 'Startups',
            'slug' => 'startups',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'startups',
                'ar' => 'lshrk-t-ln-sh'
            ])
        ]);
        Term::create([
            'name' => 'الشركات الناشئة',
            'slug' => 'lshrk-t-ln-sh',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'startups',
                'id' => 'startups'
            ])
        ]);

        Term::create([
            'name' => 'Investments',
            'slug' => 'investments',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'investasi',
                'ar' => 'l-stthm-r-t'
            ])
        ]);
        Term::create([
            'name' => 'Investasi',
            'slug' => 'investasi',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'investments',
                'ar' => 'l-stthm-r-t'
            ])
        ]);
        Term::create([
            'name' => 'الاستثمارات',
            'slug' => 'l-stthm-r-t',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'investments',
                'id' => 'investasi'
            ])
        ]);

        Term::create([
            'name' => 'Envato',
            'slug' => 'envato',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'envato',
                'ar' => 'nf-to'
            ])
        ]);
        Term::create([
            'name' => 'Envato',
            'slug' => 'envato',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'envato',
                'ar' => 'nf-to'
            ])
        ]);
        Term::create([
            'name' => 'إنفاتو',
            'slug' => 'nf-to',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'envato',
                'id' => 'envato'
            ])
        ]);

        Term::create([
            'name' => 'Creative Market',
            'slug' => 'creative-market',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'pasar-kreatif',
                'ar' => 'sok-bd-aay'
            ])
        ]);
        Term::create([
            'name' => 'Pasar Kreatif',
            'slug' => 'pasar-kreatif',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'creative-market',
                'ar' => 'sok-bd-aay'
            ])
        ]);
        Term::create([
            'name' => 'سوق إبداعي',
            'slug' => 'sok-bd-aay',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'creative-market',
                'id' => 'pasar-kreatif'
            ])
        ]);

        Term::create([
            'name' => 'Digital Creative',
            'slug' => 'digital-creative',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'kreatif-digital',
                'ar' => 'l-bd-aa-lrkmy'
            ])
        ]);
        Term::create([
            'name' => 'Kreatif Digital',
            'slug' => 'kreatif-digital',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'digital-creative',
                'ar' => 'l-bd-aa-lrkmy'
            ])
        ]);
        Term::create([
            'name' => 'الإبداع الرقمي',
            'slug' => 'l-bd-aa-lrkmy',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'digital-creative',
                'id' => 'kreatif-digital'
            ])
        ]);

        Term::create([
            'name' => 'Framework',
            'slug' => 'framework',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'framework',
                'ar' => 't-r-laaml'
            ])
        ]);
        Term::create([
            'name' => 'Framework',
            'slug' => 'framework',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'framework',
                'ar' => 't-r-laaml'
            ])
        ]);
        Term::create([
            'name' => 'إطار العمل',
            'slug' => 't-r-laaml',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'framework',
                'id' => 'framework'
            ])
        ]);

        Term::create([
            'name' => 'Bootstrap',
            'slug' => 'bootstrap',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'bootstrap',
                'ar' => 'ltmhyd'
            ])
        ]);
        Term::create([
            'name' => 'Bootstrap',
            'slug' => 'bootstrap',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'bootstrap',
                'ar' => 'ltmhyd'
            ])
        ]);
        Term::create([
            'name' => 'التمهيد',
            'slug' => 'ltmhyd',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'bootstrap',
                'id' => 'bootstrap'
            ])
        ]);

        Term::create([
            'name' => 'HTML',
            'slug' => 'html',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'html',
                'ar' => 'lgh-lbrmg'
            ])
        ]);
        Term::create([
            'name' => 'HTML',
            'slug' => 'html',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'html',
                'ar' => 'lgh-lbrmg'
            ])
        ]);
        Term::create([
            'name' => 'لغة البرمجة',
            'slug' => 'lgh-lbrmg',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'html',
                'id' => 'html'
            ])
        ]);

        Term::create([
            'name' => 'CSS',
            'slug' => 'css',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'css',
                'ar' => 'lmghlk'
            ])
        ]);
        Term::create([
            'name' => 'CSS',
            'slug' => 'css',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'css',
                'ar' => 'lmghlk'
            ])
        ]);
        Term::create([
            'name' => 'المغلق',
            'slug' => 'lmghlk',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'css',
                'id' => 'css'
            ])
        ]);

        Term::create([
            'name' => 'Holiday',
            'slug' => 'holiday',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'liburan',
                'ar' => 'yom-l-g-z'
            ])
        ]);
        Term::create([
            'name' => 'Liburan',
            'slug' => 'liburan',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'holiday',
                'ar' => 'yom-l-g-z'
            ])
        ]);
        Term::create([
            'name' => 'يوم الاجازة',
            'slug' => 'yom-l-g-z',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'holiday',
                'id' => 'liburan'
            ])
        ]);

        Term::create([
            'name' => 'Indonesia',
            'slug' => 'indonesia',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'indonesia',
                'ar' => 'ndonysy'
            ])
        ]);
        Term::create([
            'name' => 'Indonesia',
            'slug' => 'indonesia',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'indonesia',
                'ar' => 'ndonysy'
            ])
        ]);
        Term::create([
            'name' => 'إندونيسيا',
            'slug' => 'ndonysy',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'indonesia',
                'id' => 'indonesia'
            ])
        ]);

        Term::create([
            'name' => 'Japan',
            'slug' => 'japan',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'jepang',
                'ar' => 'ly-b-n'
            ])
        ]);
        Term::create([
            'name' => 'Jepang',
            'slug' => 'jepang',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'japan',
                'ar' => 'ly-b-n'
            ])
        ]);
        Term::create([
            'name' => 'اليابان',
            'slug' => 'ly-b-n',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'japan',
                'id' => 'jepang'
            ])
        ]);

        Term::create([
            'name' => 'Sport',
            'slug' => 'sport',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'olahraga',
                'ar' => 'ry-d'
            ])
        ]);
        Term::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'sport',
                'ar' => 'ry-d'
            ])
        ]);
        Term::create([
            'name' => 'رياضة',
            'slug' => 'ry-d',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'sport',
                'id' => 'olahraga'
            ])
        ]);

        Term::create([
            'name' => 'MotoGP',
            'slug' => 'motogp',
            'language_id' => 1,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'motogp',
                'ar' => 'moto-gy-by'
            ])
        ]);
        Term::create([
            'name' => 'MotoGP',
            'slug' => 'motogp',
            'language_id' => 2,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'id' => 'motogp',
                'ar' => 'moto-gy-by'
            ])
        ]);
        Term::create([
            'name' => 'موتو جي بي',
            'slug' => 'moto-gy-by',
            'language_id' => 3,
            'taxonomy' => 'tag',
            'translation' => json_encode([
                'en' => 'motogp',
                'id' => 'motogp'
            ])
        ]);
    }
}
