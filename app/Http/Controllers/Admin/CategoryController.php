<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Helpers\Languages;
use App\Http\Controllers\Controller;
use App\Models\Term;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Gate, Storage, Validator};
use Illuminate\Validation\Rule;
use Psr\Container\{ContainerExceptionInterface, NotFoundExceptionInterface};

class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:read-categories', ['except' => ['ajaxSearch']]);
        $this->middleware('permission:add-categories', ['only' => ['store']]);
        $this->middleware('permission:update-categories', ['only' => ['update']]);
    }

    /**
     * @return JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function ajaxSearch(){
        $language = request('lang');

        if(request()->filled('q')) {
           $data = Term::category()->where('language_id', $language)->searchName(request()->get('q'))->limit(5)->get();
        } else {
            $data = Term::category()->where('language_id', $language)->limit(5)->get();
        }

        return response()->json($data);
    }

    /**
     * @return JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function ajaxCategorySearch(): JsonResponse
    {
        if(request()->filled('q')) {
            $data = Term::select('name','id')->category()->where('language_id', request('lang'))->searchName(request()->get('q'))->limit(5)->get();
        } else {
            $data = Term::select('name','id')->category()->where('language_id', request('lang'))->limit(5)->get();
        }

        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @param CategoryDataTable $dataTable
     * @return Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render( 'admin.category.index' );
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
     * @param Slugify $slugify
     * @return JsonResponse
     */
    public function store(Slugify $slugify)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => ['required', 'min:3', Rule::unique('terms', 'name')->where(function ($query) {
                return $query->whereTaxonomy('category');
            })]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $filenameStore = null;

        if (request()->hasFile('image')) {
            $filenameWithExt = request()->image->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = request()->image->getClientOriginalExtension();
            $filenameStore   = $filename . '-' . time() . '.' . $extension;
            request()->image->storeAs('public/images', $filenameStore);
        }

        if (request()->has('translation')) {

            $translations =  Arr::add(request('translation'), Languages::getLangCodeById(request('language')), request('slug'));

            foreach($translations as $key => $value){
                $translations['slug'][$key] = $value;
            }

            foreach($translations as $key => $value){
                if (Arr::get(request('translation'), $key)) {
                    $check_category = Term::category()
                        ->where('slug', $value)
                        ->where('language_id', Languages::getLangIdByCode($key))
                        ->exists();

                    if ($check_category) {
                        return response()->json(['error_translation_exists' => __('term.message_name_exists'), 'error_exists_lang' => $key]);
                    } else {

                        if(key($translations['slug']) == $key){
                            unset($translations['slug'][$key]);
                        }

                        $data = [
                            'name'        => $value,
                            'slug'        => $value,
                            'taxonomy'    => 'category',
                            'language_id' => Languages::getLangIdByCode($key),
                            'translation' => json_encode($translations['slug']),
                            'image'       => $filenameStore
                        ];

                        Term::create($data);

                        $translations['slug'][$key] = $value;
                    }
                } else {
                    unset($translations[$key]);
                    unset($translations['slug'][$key]);
                }
            }

        }

        $data = [
            'name'        => request('name'),
            'slug'        => request('slug'),
            'parent'      => request()->has('parent') ? request('parent') : '0',
            'taxonomy'    => 'category',
            'description' => request('description'),
            'language_id' => request('language'),
            'image'       => $filenameStore
        ];

        if (request()->has('translation')) {
            $translations = request('translation');
            foreach($translations as $key => $value){
                if (Arr::get($translations, $key)) {
                    $translations[$key] = $slugify->slugify($value);
                } else {
                    unset($translations[$key]);
                    unset($translations['slug'][$key]);
                }
            }

            $data = Arr::add($data, 'translation', json_encode($translations));
        }

        Term::create($data);

        return response()->json(['success' => __('notification.saved_successfully')]);
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
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Slugify $slugify
     * @param Term $category
     * @return JsonResponse
     */
    public function update(Slugify $slugify, Term $category)
    {
        $category = Term::category()->firstWhere('slug', $category->slug);

        $validator = Validator::make(request()->all(), [
            'name' => ['required','min:3', Rule::unique('terms', 'name')->where(function ($query) {
                return $query->where('taxonomy', 'category');
            })->ignore($category->id)->ignore('category', 'taxonomy')]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $filename = $category->image;

        if (request()->hasFile('image')) {
            if (!empty($category->post_image)) {
                Storage::disk('public')->delete('images/' . $category->image);
            }
            $file = request()->file('image');
            $filename = $file->hashName();
            Storage::putFileAs('public/images', request()->file('image'), $filename);
        } else {
            if (request('isupload') == "remove") {
                if (!empty($category->post_image)) {
                    Storage::disk('public')->delete('images/' . $category->image);
                }
                $filename = null;
            }
        }

        if (request()->has('translation')) {

            $translations    = Arr::add(request('translation'), Languages::getLangCodeById(request('language')), $slugify->slugify(request('name')));
            $getTranslations = Arr::add(json_decode($category->translation,true), Languages::getLangCodeById($category->language_id), $category->slug);

            foreach($translations as $key => $val) {
                $translations[$key] = ['name' => $val, 'slug' => $slugify->slugify($val)];
            }

            foreach($translations as $key => $value){
                if ($value['name']) {
                    if(key($translations) == $key){
                        unset($translations[$key]);
                    }

                    $trans = [];
                    foreach($translations as $k => $val) {
                        if($val['slug']){
                            $trans[$k] = $val['slug'];
                        }
                    }

                    $exists = Arr::exists($getTranslations, $key);

                    $data = [
                        'name'        => $value['name'],
                        'slug'        => $value['slug'],
                        'taxonomy'    => 'category',
                        'image'       => $filename,
                        'language_id' => Languages::getLangIdByCode($key),
                        'translation' => json_encode($trans)
                    ];

                    if (!$exists) {
                        Term::create($data);
                    } else {
                        $slug = Arr::get(json_decode($category->translation,true), $key);
                        Term::category()->where('slug', $slug)->update($data);
                    }

                    $translations[$key] = $value;

                } else {
                    $slug = Arr::get(json_decode($category->translation,true), $key);
                    Term::category()->where('slug', $slug)->delete();

                    unset($translations[$key]);
                }
            }
        }

        $data = [
            'name'        => request('name'),
            'slug'        => request('slug'),
            'parent'      => request()->has('parent') ? request('parent') : '0',
            'taxonomy'    => 'category',
            'description' => request('description'),
            'language_id' => request('language'),
            'image'       => $filename,
            'updated_at'  => Carbon::now()
        ];

        if (request()->has('translation')) {
            $translations = request('translation');
            foreach($translations as $key => $value){
                if ($translations[$key]) {
                    $translations[$key] = $slugify->slugify($value);
                } else {
                    unset($translations[$key]);
                }
            }
            $data = Arr::add($data, 'translation', json_encode($translations));
        }

        $category->update($data);

        return response()->json(['success' => __('notification.updated_successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Term $category
     * @return JsonResponse
     */
    public function destroy(Term $category)
    {
        if (!Gate::allows('delete-categories')) {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }

        if ($category->translation) {
            $translations = json_decode($category->translation,true);

            foreach ($translations as $key => $value) {
                if (key($translations) == $key) {
                    unset($translations[$key]);
                }

                if ($value == $category->slug) {
                    unset($translations[$key]);
                }

                $trans = [];
                foreach ($translations as $k => $val) {
                    $trans[$k] = $val;
                }

                $data = [
                    'translation' => $translations ? json_encode($translations) : null
                ];

                $slug = Arr::get(json_decode($category->translation, true), $key);
                Term::category()->where('slug', $slug)->update($data);
                $translations[$key] = $value;
            }
        }

        if ($category->image) {
            if (!$category->translation) {
                Storage::disk('public')->delete('images/' . $category->image);
            }
        }

        $category->delete();

        return response()->json(['success' => __('notification.deleted_successfully')]);
    }

    /**
     * Remove the multi resource from storage.
     *
     * @return JsonResponse
     */
    public function massdestroy()
    {
        if (!Gate::allows('delete-categories')) {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }

        $categories_id_array = request('id');

        $categories = Term::whereIn('id', $categories_id_array);

        Term::whereIn('parent', $categories_id_array)
            ->update(['parent' => '0']);

        foreach($categories->get() as $category){

            if ($category->translation) {
                $translations = json_decode($category->translation,true);

                foreach ($translations as $key => $value) {
                    if (key($translations) == $key) {
                        unset($translations[$key]);
                    }

                    if ($value == $category->slug) {
                        unset($translations[$key]);
                    }

                    $trans = [];
                    foreach ($translations as $k => $val) {
                        $trans[$k] = $val;
                    }

                    $data = [
                        'translation' => $translations ? json_encode($translations) : null
                    ];

                    $slug = Arr::get(json_decode($category->translation, true), $key);
                    Term::category()->where('slug', $slug)->update($data);
                    $translations[$key] = $value;
                }
            }

            if ($category->image) {
                if (!$category->translation) {
                    Storage::disk('public')->delete('images/' . $category->image);
                }
            }
        }

        if($categories->delete()) {
            return response()->json(['success' => __('notification.deleted_successfully')]);
        } else {
            return response()->json(['error' => __('notification.deleted_not_successfully')]);
        }
    }
}
