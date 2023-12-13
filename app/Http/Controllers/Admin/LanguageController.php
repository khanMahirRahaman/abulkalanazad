<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LanguagesDataTable;
use App\Helpers\Localization;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use App\Models\{Language, Setting, User};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request, Response};
use Illuminate\Support\{Arr, Collection};
use Illuminate\Support\Facades\{Auth, File, Gate, Validator};
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};
use Spatie\TranslationLoader\LanguageLine;

class LanguageController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('permission:read-languages', ['except' => ['getId', 'showLanguage', 'showGroup', 'showTextLang', 'dataSelectOption']]);
        $this->middleware('permission:add-languages', ['only' => ['store']]);
        $this->middleware('permission:delete-languages', ['only' => ['update', 'destroy', 'massdestroy']]);
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getId($code) {
        $lang = Language::where('language_code', $code);

        if($lang->exists()) {
            return Language::where('language_code', $code)->first()->id;
        }
    }

    /**
     * @return Collection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function showLanguage()
    {
        $keyword = strip_tags(request()->get('q'));
        return Language::where("language", "LIKE", "%$keyword%")->get();
    }

    /**
     * @return mixed
     */
    public function showGroup()
    {
        return LanguageLine::select('group')->groupBy('group')->get();
    }

    /**
     * @return JsonResponse
     */
    public function showTextLang()
    {
        $id = request('id');
        $lang = Language::findOrFail($id);
        $data = asset('img/flag/'.strtolower($lang->country_code).'.svg');
        return response()->json($data);
    }

    /**
     * @return JsonResponse
     */
    public function dataSelectOption()
    {
        $data = Language::select('id', 'language_code', 'language', 'default')->get();
        return response()->json($data);
    }

    /**
     * @return JsonResponse
     */
    public function setActive(Language $language)
    {
        if ($language->default === 'y') {
            return response()->json(['error' => __('localization.msg_default_language_cannot_be_changed')]);
        }

        $message = '';

        if ($language->active == 'y' && request('status') == 'n') {
            $message = $language->language .' '. __('localization.msg_deactivated_successfully');
        } else if ($language->active == 'n' && request('status') == 'y'){
            $message = $language->language .' '. __('localization.msg_activated_successfully');
        }

        $language->update(['active' => request('status')]);

        return response()->json(['success' => $message]);
    }

    /**
     * @return JsonResponse
     */
    public function setDefault(Language $language)
    {
        Language::where('default', 'y')->update(['default' => 'n']);
        $language->update(['default' => 'y']);

        return response()->json(['success' => $language->language .' '. __('localization.msg_default_succeed')]);
    }

    /**
     * @return RedirectResponse
     */
    public function settingLang()
    {
        Setting::where('name','dashboard_language')->update(['value' => request('code')]);
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(LanguagesDataTable $dataTable)
    {
        return $dataTable->render( 'admin.language.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'language' => 'required',
            'country' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $check_language = Language::where('language_code', request('language'))
                            ->where('country_code', request('country'))
                            ->exists();

        if ($check_language) {
            return response()->json(['error_exists' => __('localization.msg_name_exists')]);
        }

        $locales = json_decode(file_get_contents(resource_path('lang/locales.json')), true);
        $countries = Localization::countries();

        function filter_array($array, $key, $term){
            $matches = array();
            foreach($array as $a){
                if($a[$key] == $term) {
                    $matches[] = $a;
                }
            }
            return $matches;
        }

        $arr_country = filter_array($countries,'code', request('country'));

        Language::create([
            'language'      => data_get($locales, request('language') . '.name'),
            'language_code' => request('language'),
            'country'       => data_get(Arr::collapse($arr_country), 'name'),
            'country_code'  => request('country'),
            'direction'     => data_get($locales, request('language') . '.direction')
        ]);

        $languages = Language::all();

        $dataArr = [];
        foreach($languages as $language){
            $dataArr[] = [
                $language->language_code => [
                    "name"     => data_get($locales, $language->language_code . '.name'),
                    "script"   => data_get($locales, $language->language_code . '.script'),
                    "native"   => $language->language,
                    "regional" => $language->language_code . '_' . $language->country_code,
                ]
            ];
        }

        $dataJson = json_encode(Arr::collapse($dataArr), JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

        File::put(storage_path('app/public/file/supportedLocales.json'), trim($dataJson, '[]'));

        return response()->json(['success' => __('notification.saved_successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param Language $language
     * @return void
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Language $language
     * @return Application|Factory|View
     */
    public function edit(Language $language)
    {
        if ($language->default == 'y') {
           abort(403);
        }

        $countries = json_decode(file_get_contents(resource_path('lang/countries.json')), true);
        return view('admin.language.edit', compact('language','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Language $language
     * @return RedirectResponse
     */
    public function update(Request $request, Language $language)
    {
        $validator = Validator::make(request()->all(), [
            'language' => 'required|string|' . Rule::unique('languages')->ignore($language->id, 'id'),
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = json_decode(file_get_contents(storage_path('app/public/file/supportedLocales.json')), true);
        $data[$language->language_code]['name'] = request('language');
        $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);;
        File::put(storage_path('app/public/file/supportedLocales.json'), trim($newJsonString, '[]'));

        $language->language = request('language');
        $language->save();

        return redirect()->route('languages.index')->withSuccess(__('notification.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Language $language
     * @return JsonResponse
     */
    public function destroy(Language $language)
    {
		if (Gate::allows('delete-languages')) {

            $languageCodeDefault = Language::select('language_code')->where('default', 'y')->first()->language_code;
            $languageCode        = $language->language_code;

            if ($language->default === 'y') {
                return response()->json(['error' => __('notification.dont_have_permission')]);
            }

            if (Auth::user()->language == $language->id) {
                User::find(Auth::id())->update(['language' => $languageCodeDefault]);
            }

            $delete = $language->delete();

            $getJson = json_decode(file_get_contents(storage_path('app/public/file/supportedLocales.json')), true);

            Arr::forget($getJson, $languageCode);

            $dataJson = json_encode($getJson, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

            File::put(storage_path('app/public/file/supportedLocales.json'), trim($dataJson, '[]'));

			if ($delete) {
				return response()->json(['success' => __('notification.deleted_successfully')]);
			} else {
				return response()->json(['error' => __('notification.deleted_not_successfully')]);
			}
		} else {
			return response()->json(['error' => __('notification.dont_have_permission')]);
		}
    }

	/**
	* Remove the multi resource from storage.
	*
	* @return JsonResponse
	*/
	public function massdestroy()
	{
		if (Gate::allows('delete-languages')) {

            $userLanguageId = Auth::user()->language;
            $languageCodeDefault = Language::select('language_code')->where('default', 'y')->first()->language_code;

            $getJson = json_decode(file_get_contents(storage_path('app/public/file/supportedLocales.json')), true);

            foreach(request('id') as $requestId) {
                $language = Language::find($requestId);

                if ($language->default === 'y') {
                    $savedId[] = $language->id;
                } else {
                    if ($userLanguageId == $requestId) {
                        User::find(Auth::id())->update(['language' => $languageCodeDefault]);
                    }
                    $languageCode = Language::find($requestId)->language_code;
                    Arr::forget($getJson, $languageCode);
                }
            }

            $dataJson = json_encode($getJson, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

            File::put(storage_path('app/public/file/supportedLocales.json'), trim($dataJson, '[]'));

            if (!empty($savedId)) {
                $result = array_diff(request('id'), $savedId);
                $languages_id_array = Arr::flatten($result);
            } else {
                $languages_id_array = request('id');
            }

			$languages = Language::whereIn('id', $languages_id_array);

			if ($languages->delete()) {
				return response()->json(['success' => __('notification.deleted_successfully')]);
			} else {
				return response()->json(['error' => __('notification.deleted_not_successfully')]);
			}
		} else {
			return response()->json(['error' => __('notification.dont_have_permission')]);
		}
	}
}
