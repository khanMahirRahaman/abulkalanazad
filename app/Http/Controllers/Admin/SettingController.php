<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MagzExports;
use App\Helpers\Settings;
use App\Helpers\Socialmedias;
use App\Http\Controllers\Controller;
use App\Models\{Language, Setting, User};
use App\Imports\MagzImport;
use GeoSot\EnvEditor\Facades\EnvEditor;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request, Response};
use Illuminate\Session\{SessionManager, Store};
use Illuminate\Support\Facades\{App, Artisan, Auth, Cache, File, Redirect, Session, Storage, Validator};
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use ZipArchive;

class SettingController extends Controller
{
    /**
     * SettingController constructor.
     */
    public function __construct()
    {
        if (!File::exists(storage_path('app/public/assets'))) {
            File::makeDirectory(storage_path('app/public/assets'));
        }
        $this->middleware('permission:read-settings', ['only' => ['index', 'setting']]);
        $this->middleware('permission:update-settings', [
            'only' => ['updateSettings', 'changeMaintenance', 'changeRegisterMember', 'changeActiveEmailVerification', 'settingUpdate']
        ]);
    }

    /**
     * setting
     *
     * @return Application|Factory|View
     */
    public function setting(): View|Factory|Application
    {
        $dir               = Settings::key('current_theme_dir');
        $maintenance       = Settings::key('maintenance') === 'y' ? 'checked' : '';
        $register          = Settings::key('register') === 'y' ? 'checked' : '';
        $emailVerification = Settings::key('email_verification') === 'y' ? 'checked' : '';
        $showLanguage      = Settings::key('display_language') === 'y' ? 'checked' : '';

        $creditFooter = File::get(resource_path('views/frontend/' . $dir . '/inc/_credit-footer.blade.php'));

        $languages = Language::pluck('language', 'language_code');

        $analyticsViewId =  EnvEditor::getKey("ANALYTICS_VIEW_ID");

        $logoWebLight  = $this->getAssetImage(Settings::key('logo_web_light'));
        $logoWebDark   = $this->getAssetImage(Settings::key('logo_web_dark'));
        $favicon       = $this->getAssetImage(Settings::key('favicon'));
        $ogImage       = $this->getAssetImage(Settings::key('og_image'));
        $logoDashboard = $this->getAssetImage(Settings::key('logo_dashboard'));
        $logoAuth      = $this->getAssetImage(Settings::key('logo_auth'));

        $socialmedia = Socialmedias::site();

        return view('admin.setting.index', compact(
            'analyticsViewId',
            'creditFooter',
            'favicon',
            'languages',
            'logoAuth',
            'logoDashboard',
            'logoWebLight',
            'logoWebDark',
            'maintenance',
            'ogImage',
            'register',
            'emailVerification',
            'showLanguage',
            'socialmedia'
        ));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function updateSettings(Request $request): JsonResponse
    {
        Cache::forget('settings');
        $this->authorize('update-settings');

        if (empty(request('key'))) {
            return response()->json(['failed' => __('setting.message_cannot_be_empty')]);
        }

        Setting::where('key', request('key'))->update(['value' => request('value')]);

        return response()->json(['success' => __('notification.saved_successfully')]);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function changeDashboardLanguage(Request $request)
    {
        Cache::forget('settings');
        return User::find(Auth::id())->update(['language' => request('id')]);
    }

    /**
     * @param $lang
     * @return RedirectResponse
     */
    public function changeCurrentUserLanguage($lang): RedirectResponse
    {
        Cache::forget('settings');
        User::find(Auth::id())->update(['language' => $lang]);
        return Redirect::back();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeThemeLanguage(Request $request): JsonResponse
    {
        Cache::forget('settings');
        App::setLocale(request('code'));
        Session::put('locale', request('code'));
        LaravelLocalization::setLocale(request('code'));
        Setting::where('key','theme_language')->update(['value' => request('code')]);

        return response()->json(['success' => __('notification.saved_successfully')]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeMaintenance(Request $request)
    {
        Cache::forget('settings');
        Setting::where('key', 'maintenance')->update(['value' => request('active')]);

        $msg = request('active') === 'y' ?
            __('Mode Maintenance Enabled!') : __('Mode Maintenance Disabled!');

        return response()->json(['success' => $msg]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeRegisterMember(Request $request): JsonResponse
    {
        Cache::forget('settings');
        if(!Auth::User()->hasRole(['super-admin', 'admin'])) {
            return response()->json(['abort' => __('setting.unauthorized_action')]);
        }

        Setting::where('key', 'register')->update(['value' => request('active')]);

        $msg = request('active') === 'y' ?
            __('setting.register_enabled') : __('setting.register_disabled');

        return response()->json(['success' => $msg]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeActiveEmailVerification(Request $request)
    {
        Cache::forget('settings');
        if(!Auth::User()->hasRole(['super-admin', 'admin'])) {
            return response()->json(['abort' => __('setting.unauthorized_action')]);
        }
        Setting::where('key', 'email_verification')
            ->update(['value' => request('active')]);
        if (request('active') === 'y') {
            $msg = __('setting.email_verification_enabled');
        } else {
            $msg = __('setting.email_verification_disabled');
        }

        return response()->json(['success' => $msg]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeDisplayLanguage(Request $request): JsonResponse
    {
        Cache::forget('settings');
        Setting::where('key', 'display_language')->update(['value' => request('active')]);

        $msg = request('active') === 'y' ?
            __('setting.display_language_enabled') : __('setting.display_language_disabled');

        return response()->json(['success' => $msg]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function settingUpdate(Request $request)
    {
        $this->authorize('update-settings');

        $validator = Validator::make(request()->all(), [
            'company_name' => Rule::requiredIf(request()->has('web_information')),
            'site_name'    => Rule::requiredIf(request()->has('web_information')),
            'site_url'     => Rule::requiredIf(request()->has('web_information')),
            'favicon'      => 'dimensions:max_width=256,max_height=256|mimes:jpeg,png,ico',
            'logo_website' => 'dimensions:max_width=800,max_height=800|image|mimes:jpeg,png',
            'og_image'     => 'dimensions:max_width=1484,max_height=1200|image|mimes:jpeg,png'
        ]);

        if (request()->has('site_logo')) {
            if ($validator->fails()) {
                return redirect()->route('settings.index')->with('error', $validator->errors()->first());
            }
        } else {
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }
        }

        if (request()->has('web_information')) {

            if (request('credit_footer')) {
                $dir = Settings::key('current_theme_dir');
                File::put(resource_path('views/frontend/'.$dir.'/inc/_credit-footer.blade.php'), request('credit_footer'));
            }

            $arrayValues = [
                ['key' => 'company_name', 'value' => request('company_name')],
                ['key' => 'site_name', 'value' => request('site_name')],
                ['key' => 'site_url', 'value' => request('site_url')],
                ['key' => 'site_description', 'value' => request('site_description')],
                ['key' => 'meta_keyword', 'value' => request('meta_keyword')],
            ];

            Cache::forget('settings');

            foreach ($arrayValues as $value) {
                Setting::where('key', $value['key'])->update(['value' => $value['value']]);
            }

            return response()->json(['success' => __('notification.saved_successfully')]);
        }

        if (request()->has('web_contact')) {
            $data= array();

            $social_media = '';

            if (request()->has('social_media')) {
                foreach (request('social_media') as $value) {
                    $data[] = ['id' => $value['id'], 'url' => $value['url']];
                    $social_media = json_encode($data);
                }
            }

            $arrayValues = [
                ['key' => 'street', 'value' => request('street')],
                ['key' => 'city', 'value' => request('city')],
                ['key' => 'postal_code', 'value' => request('postal_code')],
                ['key' => 'state', 'value' => request('state')],
                ['key' => 'country', 'value' => request('country')],
                ['key' => 'full_address', 'value' => request('full_address')],
                ['key' => 'site_phone', 'value' => request('site_phone')],
                ['key' => 'site_email', 'value' => request('site_email')],
                ['key' => 'contact_description', 'value' => request('contact_description')],
                ['key' => 'social_media', 'value' => $social_media]
            ];

            Cache::forget('settings');

            foreach ($arrayValues as $value) {
                Setting::where('key', $value['key'])->update(['value' => $value['value']]);
            }

            return response()->json(['success' => __('notification.saved_successfully')]);
        }

        if (request()->has('site_logo')) {

            Cache::forget('settings');

            if (request()->hasFile('favicon')) {
                $getFileName      = pathinfo(request()->favicon->getClientOriginalName(), PATHINFO_FILENAME);
                $getFileExtension = pathinfo(request()->favicon->getClientOriginalExtension(), PATHINFO_FILENAME);

                $fileName = $getFileName . '-' . Str::random(10) . '.' . $getFileExtension;

                if ($getFileExtension == 'ico') {
                    $upload_path = storage_path('app/public/assets');

                    $image = request('favicon');
                    $imageName = $fileName;
                    $image->move($upload_path, $imageName);
                    Image::configure(array('driver' => 'imagick'));
                    Image::make($upload_path .'/'. $fileName)
                        ->resize(32, 32, function($constraint){
                            $constraint->aspectRatio();
                        })->save($upload_path .'/'. $imageName);

                } else {
                    $img = Image::make(request('favicon'));
                    $resizeImage = $img->resize(32, 32);
                    $img->insert($resizeImage, 'center');

                    $img->save(storage_path('app/public/assets') . '/' . $fileName);
                }

                Setting::where('key', 'favicon')->update(['value' => $fileName]);
            }

            if (request()->hasFile('logo_web_light')) {
                $logoWebLight = request('logo_web_light');
                $filename     = $logoWebLight->getClientOriginalName();

                $logoWebLight->storeAs('assets', $filename, 'public');

                Setting::where('key', 'logo_web_light')
                    ->update(['value' => $filename]);
            }

            if (request()->hasFile('logo_web_dark')) {
                $logoWebDark = request('logo_web_dark');
                $filename    = $logoWebDark->getClientOriginalName();

                $logoWebDark->storeAs('assets', $filename, 'public');

                Setting::where('key', 'logo_web_dark')
                    ->update(['value' => $filename]);
            }

            if (request()->hasFile('og_image')) {
                $og_image = request('og_image');
                $filename = $og_image->getClientOriginalName();

                $og_image->storeAs('assets', $filename, 'public');

                Setting::where('key', 'og_image')
                    ->update(['value' => $filename]);
            }

            if (request()->hasFile('logo_dashboard')) {
                $logo_dashboard = request('logo_dashboard');
                $filename       = $logo_dashboard->getClientOriginalName();

                $logo_dashboard->storeAs('assets', $filename, 'public');

                Setting::where('key', 'logo_dashboard')
                    ->update(['value' => $filename]);
            }

            if (request()->hasFile('logo_auth')) {
                $logo_auth = request('logo_auth');
                $filename  = $logo_auth->getClientOriginalName();

                $logo_auth->storeAs('assets', $filename, 'public');

                Setting::where('key', 'logo_auth')
                    ->update(['value' => $filename]);
            }

            return redirect()->route('settings.index')->withSuccess(__('notification.saved_successfully'));
        }

        if (request()->has('web_config')) {

            Cache::forget('settings');

            $arrayValues = [
                ['key' => 'google_analytics_id', 'value' => request('google_analytics_id')],
                ['key' => 'google_map_code', 'value' => request('google_map_code')],
                ['key' => 'publisher_id', 'value' => request('publisher_id')],
                ['key' => 'disqus_shortname', 'value' => request('disqus_shortname')],
                ['key' => 'analytics_view_id', 'value' => request('analytics_view_id')],
            ];

            if (request()->hasFile('credentials_file')) {
                $filename = request()->credentials_file->getClientOriginalName();
                if (!File::exists(storage_path('app/analytics'))) {
                    File::makeDirectory(storage_path('app/analytics'));
                }
                request()->credentials_file->storeAs('', $filename, 'analytics');
                array_push($arrayValues, ['key' => 'credentials_file', 'value' => request('credentials_file')]);
            }

            if (!EnvEditor::keyExists("ANALYTICS_VIEW_ID")) {
                EnvEditor::addKey('ANALYTICS_VIEW_ID', request('analytics_view_id'));
            } else {
                EnvEditor::editKey('ANALYTICS_VIEW_ID', request('analytics_view_id'));
            }

            foreach ($arrayValues as $value) {
                Setting::where('key', $value['value'])->update(['value' => $value['value']]);
            }

            return Redirect::to(route('settings.index') . "#web-config")->withSuccess(__('notification.saved_successfully'));
        }

        if (request()->has('web_permalinks')) {

            Cache::forget('settings');

            if(request('permalink') == 'custom'){
                $permalink            = request('custom_input');
                $permalink_type       = request('permalink');
                $permalink_old_custom = request('custom_input');
            }else{
                $permalink            = request('permalink');
                $permalink_type       = request('permalink');
                $permalink_old_custom = Settings::key('permalink_old_custom');
            }

            $page_permalinks = request('page_permalink');
            $category_permalinks = request('category_permalink');

            $arrayValues = [
                ['key' => 'permalink_type', 'value' => $permalink_type ],
                ['key' => 'permalink', 'value' => $permalink],
                ['key' => 'permalink_old_custom', 'value' => $permalink_old_custom],
                ['key' => 'page_permalink_type', 'value' => $page_permalinks],
                ['key' => 'category_permalink_type', 'value' => $category_permalinks],
            ];

            foreach ($arrayValues as $value) {
                Setting::where('key', $value['key'])->update(['value' => $value['value']]);
            }

            return response()->json(['success' => __('notification.saved_successfully')]);
        }
    }

    /**
     * @param $filename
     * @return string
     */
    public function getAssetImage($filename)
    {
        if ($filename) {
            $exists = Storage::disk('public')->exists('assets/' . $filename);

            if ($exists) {
                $file = Storage::get('public/assets/' . $filename);
                $type = Storage::disk('public')->mimeType('assets/' . $filename);

                return 'data:'.$type.';base64,' .base64_encode($file);
            }
        } else {
            return null;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.setting.index');
    }

    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function sessionDeviceSetPeriode(){
        return session(['session_device_analytics' => (int)request('periode')]);
    }

    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function visitorPageViewSetPeriode(){
        return session(['session_visitor_pageview_analytics' => (int)request('periode')]);
    }

    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function mostVisitedPages(){
        return session(['session_most_visited_pages' => (int)request('periode')]);
    }

    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function browserUsed(){
        return session(['session_browser_used' => (int)request('periode')]);
    }

    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function operatingSystem(){
        return session(['session_browser_used' => (int)request('periode')]);
    }

    /**
     * @return Application|SessionManager|Store|mixed
     */
    public function sessionsCountry()
    {
        return session(['session_country' => (int)request('periode')]);
    }

    /**
     * @return BinaryFileResponse
     */
    public function exportStorage()
    {
        $zip = new ZipArchive;

        $name = config('retenvi.app_name') .'-v'.config('retenvi.version');
        $extension = 'storage.zip';
        $fileName = $name . '-' .$extension;

        if ($zip->open(storage_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            if(Storage::disk('local')->exists('analytics')){
                $ads = File::files(storage_path('app/analytics'));
                foreach ($ads as $key => $value) {
                    $relativeNameInZipFile = 'analytics/'.basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
            }

            if(Storage::disk('public')->exists('ad')){
                $ads = File::files(storage_path('app/public/ad'));
                foreach ($ads as $key => $value) {
                    $relativeNameInZipFile = 'public/ad/'.basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
            }

            if(Storage::disk('public')->exists('assets')){
                $assets = File::files(storage_path('app/public/assets'));
                foreach ($assets as $key => $value) {
                    $relativeNameInZipFile = 'public/assets/'.basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
            }

            if(Storage::disk('public')->exists('avatar')){
                $avatars = File::files(storage_path('app/public/avatar'));
                foreach ($avatars as $key => $value) {
                    $relativeNameInZipFile = 'public/avatar/'.basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
            }

            if(Storage::disk('public')->exists('file')){
                $file_localize = File::files(storage_path('app/public/file'));
                foreach ($file_localize as $key => $value) {
                    $relativeNameInZipFile = 'public/file/'.basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
            }

            if(Storage::disk('public')->exists('images')){
                $images = File::files(storage_path('app/public/images'));
                foreach ($images as $key => $value) {
                    $relativeNameInZipFile = 'public/images/'.basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
            }

            if(Storage::disk('public')->exists('theme')){
                $themes = File::files(storage_path('app/public/theme'));
                foreach ($themes as $key => $value) {
                    $relativeNameInZipFile = 'public/theme/'.basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }
            }

            $zip->close();
        }

        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }

    /**
     * @return BinaryFileResponse|Response
     */
    public function export()
    {
        $name = config('retenvi.app_name') .'-v'.config('retenvi.version');
        $extension = '.xlsx';
        $fileName = $name . '.' . $extension;
        return (new MagzExports())->download($fileName);
    }

    /**
     * @return JsonResponse
     */
    public function import()
    {
        $validator = Validator::make(request()->all(), [
            'import' => 'required|mimes:xlsx'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        Excel::import(new MagzImport, request()->file('import'));

        return response()->json(['success' => __('setting.message_import_successfully')]);
    }

    /**
     * @return JsonResponse
     */
    public function symlink()
    {
        $path = public_path('storage');

        if (File::exists($path)) {
            File::deleteDirectory($path);
        }

        Artisan::call('storage:link');

        if (Settings::key('symlink') == 'false') {
            Cache::forget('settings');
            Setting::where('key', 'symlink')->update(['value' => 'true']);
        }

        return response()->json(['success' => __('setting.message_symlink_successfully')]);
    }
}
