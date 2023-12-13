<?php

namespace App\Exports;

use App\Exports\Sheets\AdPlacementSheet;
use App\Exports\Sheets\AdvertisementSheet;
use App\Exports\Sheets\BanSheet;
use App\Exports\Sheets\ContactSheet;
use App\Exports\Sheets\GoogleAdsenseSheet;
use App\Exports\Sheets\LanguageLineSheet;
use App\Exports\Sheets\LanguageSheet;
use App\Exports\Sheets\MenuItemSheet;
use App\Exports\Sheets\MenuLanguageSheet;
use App\Exports\Sheets\MenuSheet;
use App\Exports\Sheets\ModelHasRoleSheet;
use App\Exports\Sheets\PermissionSheet;
use App\Exports\Sheets\PostSheet;
use App\Exports\Sheets\PostTranslationSheet;
use App\Exports\Sheets\RoleHasPermissionSheet;
use App\Exports\Sheets\RolesSheet;
use App\Exports\Sheets\SettingSheet;
use App\Exports\Sheets\SocialMediaSheet;
use App\Exports\Sheets\TermSheet;
use App\Exports\Sheets\TranslationSheet;
use App\Exports\Sheets\UserSheet;
use App\Exports\Sheets\UserSocialmediaSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MagzExports implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new SettingSheet();
        $sheets[] = new LanguageSheet();
        $sheets[] = new LanguageLineSheet();
        $sheets[] = new RolesSheet();
        $sheets[] = new PermissionSheet();
        $sheets[] = new RoleHasPermissionSheet();
        $sheets[] = new ModelHasRoleSheet();
        $sheets[] = new UserSheet();
        $sheets[] = new BanSheet();
        $sheets[] = new ContactSheet();
        $sheets[] = new SocialMediaSheet();
        $sheets[] = new UserSocialmediaSheet();
        $sheets[] = new TermSheet();
        $sheets[] = new PostSheet();
        $sheets[] = new TranslationSheet();
        $sheets[] = new PostTranslationSheet();
        $sheets[] = new MenuSheet();
        $sheets[] = new MenuItemSheet();
        $sheets[] = new MenuLanguageSheet();
        $sheets[] = new AdvertisementSheet();
        $sheets[] = new AdPlacementSheet();
        $sheets[] = new GoogleAdsenseSheet();

        return $sheets;
    }
}
