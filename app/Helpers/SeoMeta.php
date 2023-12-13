<?php

namespace App\Helpers;

use App\Models\{Language, Post, Setting, Term, TermTaxonomy, User};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Auth, File, Schema, Storage};
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Artesaos\SEOTools\Facades\SEOTools;

class SeoMeta
{

    public function get_meta($name)
    {
        return Setting::whereName($name)->first()->value;
    }

    public function dataMeta()
    {
        return [
            'site_description' => $this->get_meta('site_description'),
        ];
    }

    public static function meta() {
        $meta = (object) self::dataMeta();

        SEOTools::setDescription($meta->site_description);
        SEOTools::metatags()->setKeywords(Settings::get('meta_keyword'));
        SEOTools::setCanonical(Settings::get('site_url'));
    }

    public static function opengraph() {
        $meta = (object) self::dataMeta();

        $image = (Settings::get('ogimage')) ? route('ogi.display', Settings::get('ogimage')) :
            asset('img/cover.png');

        SEOTools::opengraph()->setTitle(Settings::get('site_name'));
        SEOTools::opengraph()->setDescription($meta->site_description);
        SEOTools::opengraph()->setUrl(Settings::get('site_url'));
        SEOTools::opengraph()->setSiteName(Settings::get('company_name'));
        SEOTools::opengraph()->addImage($image);
    }

    public static function twitter() {
        $meta = (object) self::dataMeta();

        $image = (Settings::get('ogimage')) ? route('ogi.display', Settings::get('ogimage')) :
            asset('img/cover.png');

        SEOTools::twitter()->setType('summary_large_image');
        SEOTools::twitter()->setSite('@' . Settings::get('twitter'));
        SEOTools::twitter()->setTitle(Settings::get('site_name'));
        SEOTools::twitter()->setDescription($meta->site_description);
        SEOTools::twitter()->setImage($image);
    }

    public static function jsonLd() {
        $meta = (object) self::dataMeta();

        $image = (Settings::get('ogimage')) ? route('ogi.display', Settings::get('ogimage')) :
            asset('img/cover.png');

        SEOTools::jsonLd()->setTitle(Settings::get('site_name'));
        SEOTools::jsonLd()->setDescription($meta->site_description);
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Settings::get('site_url'));
        SEOTools::jsonLd()->addImage($image);
    }




}
