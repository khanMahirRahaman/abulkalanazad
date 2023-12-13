<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TranslationDataTable;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\TranslationGroup;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Support\Arr;
use Illuminate\Http\{JsonResponse, Request};
use Spatie\TranslationLoader\LanguageLine;

class TranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read-translations');
        $this->middleware('permission:update-translations', ['only' => ['edit', 'update']]);
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return TranslationGroup::get();
    }

    /**
     * Display a listing of the resource.
     *
     * @param TranslationDataTable $dataTable
     * @return void
     */
    public function index(TranslationDataTable $dataTable)
    {
        return $dataTable->render( 'admin.translation.index' );
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
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $translation = LanguageLine::findOrFail($id);
        $languages   = Language::select('language_code')->get();
        $text        = $translation->text;

        $language = [];
        foreach($languages as $lang){
            if(!Arr::exists($text, $lang->language_code)){
                $language[] = [$lang->language_code => ''];
            }
        }

        if($language){
            $text = array_merge($text, Arr::collapse($language));
        }

        return view('admin.translation.edit', compact('translation', 'text', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $language = LanguageLine::find($id);
        $language->text = request('text');
        $language->save();
        return redirect()->route('translations.index')
            ->withSuccess(__('notification.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
