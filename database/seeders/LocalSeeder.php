<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locals')->insert([
            [
                'name' => 'Afrikaans',
                'lang' => 'af',
                'country' => 'Namibia',
                'flag' => 'na',
                'code' => 'af_NA'
            ],
            [
                'name' => 'Afrikaans',
                'lang' => 'af',
                'country' => 'South Africa',
                'flag' => 'za',
                'code' => 'af_ZA'
            ],
            [
                'name' => 'Akan',
                'lang' => 'ak',
                'country' => 'Ghana',
                'flag' => 'gh',
                'code' => 'ak_GH'
            ],
            [
                'name' => 'Albanian',
                'lang' => 'sq',
                'country' => 'Albania',
                'flag' => 'al',
                'code' => 'sq_AL'
            ],
            [
                'name' => 'Amharic',
                'lang' => 'am',
                'country' => 'Ethiopia',
                'flag' => 'et',
                'code' => 'am_ET'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Algeria',
                'flag' => 'dz',
                'code' => 'ar_DZ'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Bahrain',
                'flag' => 'bh',
                'code' => 'ar_BH'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Egypt',
                'flag' => 'eg',
                'code' => 'ar_EG'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Iraq',
                'flag' => 'iq',
                'code' => 'ar_IQ'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Jordan',
                'flag' => 'jo',
                'code' => 'ar_JO'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Kuwait',
                'flag' => 'kw',
                'code' => 'ar_KW'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Lebanon',
                'flag' => 'lb',
                'code' => 'ar_LB'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Libya',
                'flag' => 'ly',
                'code' => 'ar_LY'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Morocco',
                'flag' => 'ma',
                'code' => 'ar_MA'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Oman',
                'flag' => 'om',
                'code' => 'ar_OM'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Qatar',
                'flag' => 'qa',
                'code' => 'ar_QA'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Saudi Arabia',
                'flag' => 'sa',
                'code' => 'ar_SA'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Sudan',
                'flag' => 'sd',
                'code' => 'ar_SD'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Syria',
                'flag' => 'sy',
                'code' => 'ar_SY'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Tunisia',
                'flag' => 'tn',
                'code' => 'ar_TN'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'United Arab Emirates',
                'flag' => 'ae',
                'code' => 'ar_AE'
            ],
            [
                'name' => 'Arabic',
                'lang' => 'ar',
                'country' => 'Yemen',
                'flag' => 'ye',
                'code' => 'ar_YE'
            ],
            [
                'name' => 'Armenian',
                'lang' => 'hy',
                'country' => 'Armenian',
                'flag' => 'am',
                'code' => 'hy_AM'
            ],
            [
                'name' => 'Assamese',
                'lang' => 'as',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'as_IN'
            ],
            [
                'name' => 'Azerbaijani',
                'lang' => 'az',
                'country' => 'Cyrillic',
                'flag' => 'cyrl',
                'code' => 'az_Cyrl'
            ],
            [
                'name' => 'Bambara',
                'lang' => 'bm',
                'country' => 'Mali',
                'flag' => 'ml',
                'code' => 'bm_ML'
            ],
            [
                'name' => 'Basque',
                'lang' => 'eu',
                'country' => 'Spain',
                'flag' => 'es',
                'code' => 'eu_ES'
            ],
            [
                'name' => 'Belarusian',
                'lang' => 'be',
                'country' => 'Belarus',
                'flag' => 'by',
                'code' => 'be_BY'
            ],
            [
                'name' => 'Bengali',
                'lang' => 'bn',
                'country' => 'Bangladesh',
                'flag' => 'bd',
                'code' => 'bn_BD'
            ],
            [
                'name' => 'Bosnian',
                'lang' => 'bs',
                'country' => 'Bosnia and Herzegovina',
                'flag' => 'ba',
                'code' => 'bs_BA'
            ],
            [
                'name' => 'Bulgarian',
                'lang' => 'bg',
                'country' => 'Bulgaria',
                'flag' => 'bg',
                'code' => 'bg_BG'
            ],
            [
                'name' => 'Burmese',
                'lang' => 'my',
                'country' => 'Myanmar',
                'flag' => 'mm',
                'code' => 'my_MM'
            ],
            [
                'name' => 'Catalan',
                'lang' => 'ca',
                'country' => 'Spain',
                'flag' => 'es',
                'code' => 'ca_ES'
            ],
            [
                'name' => 'Chinese',
                'lang' => 'zh',
                'country' => 'China',
                'flag' => 'cn',
                'code' => 'zh_CN'
            ],
            [
                'name' => 'Chinese',
                'lang' => 'zh',
                'country' => 'Hong Kong',
                'flag' => 'hk',
                'code' => 'zh_HK'
            ],
            [
                'name' => 'Chinese',
                'lang' => 'zh',
                'country' => 'Macau',
                'flag' => 'mo',
                'code' => 'zh_MO'
            ],
            [
                'name' => 'Chinese',
                'lang' => 'zh',
                'country' => 'Singapore',
                'flag' => 'sg',
                'code' => 'zh_SG'
            ],
            [
                'name' => 'Chinese',
                'lang' => 'zh',
                'country' => 'Taiwan',
                'flag' => 'tw',
                'code' => 'zh_TW'
            ],
            [
                'name' => 'Croatian',
                'lang' => 'hr',
                'country' => 'Croatia',
                'flag' => 'hr',
                'code' => 'hr_HR'
            ],
            [
                'name' => 'Czech',
                'lang' => 'cs',
                'country' => 'Czech Republic',
                'flag' => 'cz',
                'code' => 'cs_CZ'
            ],
            [
                'name' => 'Cornish',
                'lang' => 'kw',
                'country' => 'United Kingdom',
                'flag' => 'gb',
                'code' => 'kw_GB'
            ],
            [
                'name' => 'Danish',
                'lang' => 'da',
                'country' => 'Denmark',
                'flag' => 'dk',
                'code' => 'da_DK'
            ],
            [
                'name' => 'Dutch',
                'lang' => 'nl',
                'country' => 'Belgium',
                'flag' => 'be',
                'code' => 'nl_BE'
            ],
            [
                'name' => 'Dutch',
                'lang' => 'nl',
                'country' => 'Netherlands',
                'flag' => 'nl',
                'code' => 'nl_NL'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'American Samoa',
                'flag' => 'as',
                'code' => 'en_AS'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Australia',
                'flag' => 'au',
                'code' => 'en_AU'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Beligum',
                'flag' => 'be',
                'code' => 'en_BE'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Belize',
                'flag' => 'bz',
                'code' => 'en_BZ'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Botswana',
                'flag' => 'bw',
                'code' => 'en_BW'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Canada',
                'flag' => 'ca',
                'code' => 'en_CA'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Hong Kong',
                'flag' => 'hk',
                'code' => 'en_HK'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'en_IN'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Ireland',
                'flag' => 'ie',
                'code' => 'en_IE'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Jamaica',
                'flag' => 'jm',
                'code' => 'en_JM'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Malta',
                'flag' => 'mt',
                'code' => 'en_MT'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Marshall Islands',
                'flag' => 'mh',
                'code' => 'en_MH'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Mauritius',
                'flag' => 'mu',
                'code' => 'en_MU'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'New Zealand',
                'flag' => 'nz',
                'code' => 'en_NZ'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Northern Mariana Islands',
                'flag' => 'mp',
                'code' => 'en_MP'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Pakistan',
                'flag' => 'pk',
                'code' => 'en_PK'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Philippines',
                'flag' => 'ph',
                'code' => 'en_PH'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Singapore',
                'flag' => 'sg',
                'code' => 'en_SG'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'South Africa',
                'flag' => 'za',
                'code' => 'en_ZA'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Trinidad and Tobago',
                'flag' => 'tt',
                'code' => 'en_TT'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'United Kingdom',
                'flag' => 'gb',
                'code' => 'en_GB'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'United States',
                'flag' => 'us',
                'code' => 'en_US'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'U.S Virgin Islands',
                'flag' => 'vi',
                'code' => 'en_VI'
            ],
            [
                'name' => 'English',
                'lang' => 'en',
                'country' => 'Zimbabwe',
                'flag' => 'zw',
                'code' => 'en_ZW'
            ],
            [
                'name' => 'Estonian',
                'lang' => 'et',
                'country' => 'Estonia',
                'flag' => 'ee',
                'code' => 'et_EE'
            ],
            [
                'name' => 'Ewe',
                'lang' => 'ee',
                'country' => 'Ghana',
                'flag' => 'gh',
                'code' => 'ee_GH'
            ],
            [
                'name' => 'Faroese',
                'lang' => 'fo',
                'country' => 'Faroe Islands',
                'flag' => 'fo',
                'code' => 'en_FO'
            ],
            [
                'name' => 'Filipino',
                'lang' => 'fil',
                'country' => 'Philippines',
                'flag' => 'ph',
                'code' => 'fil_PH'
            ],
            [
                'name' => 'Finnish',
                'lang' => 'fi',
                'country' => 'Findland',
                'flag' => 'fi',
                'code' => 'fi_FI'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Belgium',
                'flag' => 'be',
                'code' => 'fr_BE'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Benin',
                'flag' => 'bj',
                'code' => 'fr_BJ'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Burkina Faso',
                'flag' => 'bf',
                'code' => 'fr_BF'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Burundi',
                'flag' => 'bi',
                'code' => 'fr_BI'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Cameroon',
                'flag' => 'cm',
                'code' => 'fr_CM'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Canada',
                'flag' => 'ca',
                'code' => 'fr_CA'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Central African Republic',
                'flag' => 'cf',
                'code' => 'fr_CF'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Chad',
                'flag' => 'td',
                'code' => 'fr_TD'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Comoros',
                'flag' => 'km',
                'code' => 'fr_KM'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Congo - Brazzaville',
                'flag' => 'cg',
                'code' => 'fr_CG'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Congo - Kinshasa',
                'flag' => 'cd',
                'code' => 'fr_CD'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Côte d’Ivoire',
                'flag' => 'ci',
                'code' => 'fr_CI'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Djibouti',
                'flag' => 'dj',
                'code' => 'fr_DJ'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Equatorial Guinea',
                'flag' => 'gq',
                'code' => 'fr_GQ'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'France',
                'flag' => 'fr',
                'code' => 'fr_FR'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Gabon',
                'flag' => 'ga',
                'code' => 'fr_GA'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Guinea',
                'flag' => 'gn',
                'code' => 'fr_GN'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Luxembourg',
                'flag' => 'lu',
                'code' => 'fr_LU'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Madagascar',
                'flag' => 'mg',
                'code' => 'fr_MG'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Mali',
                'flag' => 'ml',
                'code' => 'fr_ML'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Martinique',
                'flag' => 'mq',
                'code' => 'fr_MQ'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Monaco',
                'flag' => 'mc',
                'code' => 'fr_MC'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Niger',
                'flag' => 'ne',
                'code' => 'fr_NE'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Rwanda',
                'flag' => 'rw',
                'code' => 'fr_RW'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Saint Barthélemy',
                'flag' => 'bl',
                'code' => 'fr_BL'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Saint Martin',
                'flag' => 'mf',
                'code' => 'fr_MF'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Senegal',
                'flag' => 'sn',
                'code' => 'fr_SN'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Switzerland',
                'flag' => 'ch',
                'code' => 'fr_CH'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Togo',
                'flag' => 'tg',
                'code' => 'fr_TG'
            ],
            [
                'name' => 'French',
                'lang' => 'fr',
                'country' => 'Reunion',
                'flag' => 're',
                'code' => 'fr_RE'
            ],
            [
                'name' => 'Galician',
                'lang' => 'gl',
                'country' => 'Spain',
                'flag' => 'es',
                'code' => 'gl_ES'
            ],
            [
                'name' => 'Georgian',
                'lang' => 'ka',
                'country' => 'Georgia',
                'flag' => 'eg',
                'code' => 'ka_EG'
            ],
            [
                'name' => 'Ganda',
                'lang' => 'lg',
                'country' => 'Uganda',
                'flag' => 'ug',
                'code' => 'lg_UG'
            ],
            [
                'name' => 'German',
                'lang' => 'de',
                'country' => 'Austria',
                'flag' => 'at',
                'code' => 'de_AT'
            ],
            [
                'name' => 'German',
                'lang' => 'de',
                'country' => 'Belgium',
                'flag' => 'be',
                'code' => 'de_BE'
            ],
            [
                'name' => 'German',
                'lang' => 'de',
                'country' => 'Germany',
                'flag' => 'de',
                'code' => 'de_DE'
            ],
            [
                'name' => 'German',
                'lang' => 'de',
                'country' => 'Liechtenstein',
                'flag' => 'li',
                'code' => 'de_LI'
            ],
            [
                'name' => 'German',
                'lang' => 'de',
                'country' => 'Luxembourg',
                'flag' => 'lu',
                'code' => 'de_LU'
            ],
            [
                'name' => 'German',
                'lang' => 'de',
                'country' => 'Switzerland',
                'flag' => 'ch',
                'code' => 'de_CH'
            ],
            [
                'name' => 'Greek',
                'lang' => 'el',
                'country' => 'Cyprus',
                'flag' => 'cy',
                'code' => 'el_CY'
            ],
            [
                'name' => 'Greek',
                'lang' => 'el',
                'country' => 'Greece',
                'flag' => 'gr',
                'code' => 'el_GR'
            ],
            [
                'name' => 'Gujarati',
                'lang' => 'gu',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'gu_IN'
            ],
            [
                'name' => 'Hausa',
                'lang' => 'ha',
                'country' => 'Ghana',
                'flag' => 'gh',
                'code' => 'ha_GH'
            ],
            [
                'name' => 'Hausa',
                'lang' => 'ha',
                'country' => 'Nigeria',
                'flag' => 'ng',
                'code' => 'ha_NG'
            ],
            [
                'name' => 'Hebrew',
                'lang' => 'he',
                'country' => 'Israel',
                'flag' => 'il',
                'code' => 'he_IL'
            ],
            [
                'name' => 'Hindi',
                'lang' => 'hi',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'hi_IN'
            ],
            [
                'name' => 'Hungarian',
                'lang' => 'hu',
                'country' => 'Hungary',
                'flag' => 'hu',
                'code' => 'hu_HU'
            ],
            [
                'name' => 'Icelandic',
                'lang' => 'is',
                'country' => 'Iceland',
                'flag' => 'is',
                'code' => 'is_IS'
            ],
            [
                'name' => 'Igbo',
                'lang' => 'ig',
                'country' => 'Nigeria',
                'flag' => 'ng',
                'code' => 'ig_NG'
            ],
            [
                'name' => 'Bahasa Indonesia',
                'lang' => 'in',
                'country' => 'Indonesia',
                'flag' => 'id',
                'code' => 'in_ID'
            ],
            [
                'name' => 'Irish',
                'lang' => 'ga',
                'country' => 'Ireland',
                'flag' => 'ie',
                'code' => 'ga_IE'
            ],
            [
                'name' => 'Italian',
                'lang' => 'it',
                'country' => 'Italy',
                'flag' => 'it',
                'code' => 'it_IT'
            ],
            [
                'name' => 'Italian',
                'lang' => 'it',
                'country' => 'Switzerland',
                'flag' => 'ch',
                'code' => 'it_CH'
            ],
            [
                'name' => 'Japanese',
                'lang' => 'ja',
                'country' => 'Japan',
                'flag' => 'jp',
                'code' => 'ja_JP'
            ],
            [
                'name' => 'Kalaallisut',
                'lang' => 'kl',
                'country' => 'Greenland',
                'flag' => 'gl',
                'code' => 'kl_GL'
            ],
            [
                'name' => 'Kannada',
                'lang' => 'kn',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'kn_IN'
            ],
            [
                'name' => 'Kazakh',
                'lang' => 'kk',
                'country' => 'Cyrillic',
                'flag' => 'Cyrl',
                'code' => 'kk_Cyrl'
            ],
            [
                'name' => 'Kazakh',
                'lang' => 'kk',
                'country' => 'Kazakhstan',
                'flag' => 'kz',
                'code' => 'kk_KZ'
            ],
            [
                'name' => 'Khmer',
                'lang' => 'km',
                'country' => 'Cambodia',
                'flag' => 'kh',
                'code' => 'km_KH'
            ],
            [
                'name' => 'Kikuyu',
                'lang' => 'ki',
                'country' => 'Kenya',
                'flag' => 'ke',
                'code' => 'ki_KE'
            ],
            [
                'name' => 'Kinyarwanda',
                'lang' => 'rw',
                'country' => 'Rwanda',
                'flag' => 'rw',
                'code' => 'rw_RW'
            ],
            [
                'name' => 'Korean',
                'lang' => 'ko',
                'country' => 'South Korea',
                'flag' => 'kr',
                'code' => 'ko_KR'
            ],
            [
                'name' => 'Korean',
                'lang' => 'ko',
                'country' => 'North Korea',
                'flag' => 'kp',
                'code' => 'ko_KP'
            ],
            [
                'name' => 'Latvian',
                'lang' => 'lv',
                'country' => 'Latvia',
                'flag' => 'lv',
                'code' => 'lv_LV'
            ],
            [
                'name' => 'Lithuanian',
                'lang' => 'lt',
                'country' => 'Lithuania',
                'flag' => 'lt',
                'code' => 'it_LT'
            ],
            [
                'name' => 'Luyia',
                'lang' => 'luy',
                'country' => 'Kenya',
                'flag' => 'ke',
                'code' => 'luy_KE'
            ],
            [
                'name' => 'Macedonian',
                'lang' => 'mk',
                'country' => 'Macedonia',
                'flag' => 'mk',
                'code' => 'mk_MK'
            ],
            [
                'name' => 'Malagasy',
                'lang' => 'mg',
                'country' => 'Madagascar',
                'flag' => 'mg',
                'code' => 'mg_MG'
            ],
            [
                'name' => 'Malay',
                'lang' => 'ms',
                'country' => 'Brunei',
                'flag' => 'bn',
                'code' => 'ms_BN'
            ],
            [
                'name' => 'Malay',
                'lang' => 'ms',
                'country' => 'Malaysia',
                'flag' => 'my',
                'code' => 'ms_MY'
            ],
            [
                'name' => 'Malayalam',
                'lang' => 'ml',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'ml_IN'
            ],
            [
                'name' => 'Maltese',
                'lang' => 'mt',
                'country' => 'Malta',
                'flag' => 'mt',
                'code' => 'ms_MT'
            ],
            [
                'name' => 'Manx',
                'lang' => 'gv',
                'country' => 'United Kingdom',
                'flag' => 'gb',
                'code' => 'gv_GB'
            ],
            [
                'name' => 'Marathi',
                'lang' => 'mr',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'mr_IN'
            ],
            [
                'name' => 'Nepali',
                'lang' => 'ne',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'ne_IN'
            ],
            [
                'name' => 'Nepali',
                'lang' => 'ne',
                'country' => 'Nepal',
                'flag' => 'np',
                'code' => 'ne_NP'
            ],
            [
                'name' => 'North Ndebele',
                'lang' => 'nd',
                'country' => 'Zimbabwe',
                'flag' => 'zw',
                'code' => 'nd_ZW'
            ],
            [
                'name' => 'Norwegian',
                'lang' => 'no',
                'country' => 'Norway',
                'flag' => 'no',
                'code' => 'no_NO'
            ],
            [
                'name' => 'Norwegian Bokmal',
                'lang' => 'nb',
                'country' => 'Norway',
                'flag' => 'no',
                'code' => 'nb_NO'
            ],
            [
                'name' => 'Norwegian Nynorsk',
                'lang' => 'nn',
                'country' => 'Norway',
                'flag' => 'no',
                'code' => 'nn_NO'
            ],
            [
                'name' => 'Oriya',
                'lang' => 'or',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'or_IN'
            ],
            [
                'name' => 'Oromo',
                'lang' => 'om',
                'country' => 'Ethiopia',
                'flag' => 'et',
                'code' => 'om_ET'
            ],
            [
                'name' => 'Oromo',
                'lang' => 'om',
                'country' => 'Kenya',
                'flag' => 'ke',
                'code' => 'om_KE'
            ],
            [
                'name' => 'Pashto',
                'lang' => 'ps',
                'country' => 'Afghanistan',
                'flag' => 'af',
                'code' => 'ps_AF'
            ],
            [
                'name' => 'Persian',
                'lang' => 'fa',
                'country' => 'Afghanistan',
                'flag' => 'af',
                'code' => 'fa_AF'
            ],
            [
                'name' => 'Persian',
                'lang' => 'fa',
                'country' => 'Iran',
                'flag' => 'ir',
                'code' => 'fa_IR'
            ],
            [
                'name' => 'Polish',
                'lang' => 'pl',
                'country' => 'Poland',
                'flag' => 'pl',
                'code' => 'pl_PL'
            ],
            [
                'name' => 'Portuguese',
                'lang' => 'pt',
                'country' => 'Brazil',
                'flag' => 'br',
                'code' => 'pt_BR'
            ],
            [
                'name' => 'Portuguese',
                'lang' => 'pt',
                'country' => 'Guinea - Bissau',
                'flag' => 'gw',
                'code' => 'pt_GW'
            ],
            [
                'name' => 'Portuguese',
                'lang' => 'pt',
                'country' => 'Mozambique',
                'flag' => 'mz',
                'code' => 'pt_MZ'
            ],
            [
                'name' => 'Portuguese',
                'lang' => 'pt',
                'country' => 'Portugal',
                'flag' => 'pt',
                'code' => 'pt_PT'
            ],
            [
                'name' => 'Punjabi',
                'lang' => 'pa',
                'country' => 'India',
                'flag' => 'in',
                'code' => 'pa_IN'
            ],
            [
                'name' => 'Punjabi',
                'lang' => 'pa',
                'country' => 'Pakistan',
                'flag' => 'pk',
                'code' => 'pa_PK'
            ],
            [
                'name' => 'Romanian',
                'lang' => 'ro',
                'country' => 'Romania',
                'flag' => 'ro',
                'code' => 'ro_RO'
            ],
            [
                'name' => 'Romanian',
                'lang' => 'ro',
                'country' => 'Moldova',
                'flag' => 'md',
                'code' => 'ro_MD'
            ],
            [
                'name' => 'Romansh',
                'lang' => 'rm',
                'country' => 'Switzerland',
                'flag' => 'ch',
                'code' => 'rm_CH'
            ],
            [
                'name' => 'Russian',
                'lang' => 'ru',
                'country' => 'Russia',
                'flag' => 'ru',
                'code' => 'ru_RU'
            ],
            [
                'name' => 'Russian',
                'lang' => 'ru',
                'country' => 'Moldova',
                'flag' => 'md',
                'code' => 'ru_MD'
            ],
            [
                'name' => 'Russian',
                'lang' => 'ru',
                'country' => 'Ukraine',
                'flag' => 'ua',
                'code' => 'ru_UA'
            ],
            [
                'name' => 'Sango',
                'lang' => 'sg',
                'country' => 'Central African Republic',
                'flag' => 'cf',
                'code' => 'sg_CF'
            ],
            [
                'name' => 'Serbian',
                'lang' => 'sr',
                'country' => 'Bosnia and Herzegovina',
                'flag' => 'ba',
                'code' => 'sr_BA'
            ],
            [
                'name' => 'Serbian',
                'lang' => 'sr',
                'country' => 'Cyrillic',
                'flag' => 'Cyrl',
                'code' => 'sr_Cyrl'
            ],
            [
                'name' => 'Serbian',
                'lang' => 'sr',
                'country' => 'Latin',
                'flag' => 'Latn',
                'code' => 'sr_Latn'
            ],
            [
                'name' => 'Serbian',
                'lang' => 'sr',
                'country' => 'Montenegro',
                'flag' => 'me',
                'code' => 'sr_ME'
            ],
            [
                'name' => 'Serbian',
                'lang' => 'sr',
                'country' => 'Serbia',
                'flag' => 'rs',
                'code' => 'sr_CS'
            ],
        ]);
    }
}
