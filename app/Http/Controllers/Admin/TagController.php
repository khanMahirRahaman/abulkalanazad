<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TagDataTable;
use App\Helpers\Languages;
use App\Http\Controllers\Controller;
use App\Models\Term;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Gate, Validator};
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * TagController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:read-tags', ['except' => ['tagsSearch']]);
        $this->middleware('permission:add-tags', ['only' => ['store']]);
        $this->middleware('permission:update-tags', ['only' => ['update']]);
    }

    /**
     * @return mixed
     */
    public function tagsSearch()
    {
        $keyword = strip_tags(request()->get('q'));
        $language = request('lang');

        if($keyword) {
            return Term::tag()->where('language_id', $language)->searchName($keyword)->limit(5)->get();
        } else {
            return Term::tag()->where('language_id', $language)->get();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param TagDataTable $dataTable
     * @return Response
     */
    public function index(TagDataTable $dataTable)
    {
        return $dataTable->render( 'admin.tag.index' );
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
                return $query->whereTaxonomy('tag');
            })]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if (request()->has('translation')) {

            $translations =  Arr::add(request('translation'), Languages::getLangCodeById(request('language')), $slugify->slugify(request('name')));

            foreach($translations as $key => $value){
                $translations['slug'][$key] = $slugify->slugify($value);
            }

            foreach($translations as $key => $value){
                if (Arr::get(request('translation'), $key)) {
                    $check_tag = Term::tag()
                        ->where('slug', $slugify->slugify($value))
                        ->where('language_id', Languages::getLangIdByCode($key))
                        ->exists();

                    if ($check_tag) {
                        return response()->json(['error_translation_exists' => __('term.message_name_exists'), 'error_exists_lang' => $key]);
                    } else {

                        if(key($translations['slug']) == $key){
                            unset($translations['slug'][$key]);
                        }

                        $data = [
                            'name'        => $value,
                            'slug'        => $slugify->slugify($value),
                            'taxonomy'    => 'tag',
                            'language_id' => Languages::getLangIdByCode($key),
                            'translation' => json_encode($translations['slug'])
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
            'slug'        => $slugify->slugify(request('name')),
            'taxonomy'    => 'tag',
            'description' => request('description'),
            'language_id' => request('language'),
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
     * @param  int  $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('update-tags');
        $tag = Term::findOrFail($id);
        $taxonomy = Term::find($id)->taxonomy;
        return view('admin.tag.edit', ['tag' => $tag, 'taxonomy'=>$taxonomy]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Slugify $slugify
     * @param Term $tag
     * @return JsonResponse
     */
    public function update(Slugify $slugify, Term $tag)
    {
        $tag = Term::tag()->firstWhere('slug', $tag->slug);

        $validator = Validator::make(request()->all(), [
            'name' => ['required','min:3', Rule::unique('terms', 'name')->where(function ($query) {
                return $query->where('taxonomy', 'tag');
            })->ignore($tag->id)]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if (request()->has('translation')) {

            $translations    = Arr::add(request('translation'), Languages::getLangCodeById(request('language')), $slugify->slugify(request('name')));
            $getTranslations = Arr::add(json_decode($tag->translation,true), Languages::getLangCodeById($tag->language_id), $tag->slug);

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
                        'slug'        => $slugify->slugify($value['name']),
                        'taxonomy'    => 'tag',
                        'language_id' => Languages::getLangIdByCode($key),
                        'translation' => json_encode($trans)
                    ];

                    if (!$exists) {
                        Term::create($data);
                    } else {
                        $slug = Arr::get(json_decode($tag->translation,true), $key);
                        Term::tag()->where('slug', $slug)->update($data);
                    }

                    $translations[$key] = $value;

                } else {
                    $slug = Arr::get(json_decode($tag->translation,true), $key);
                    Term::tag()->where('slug', $slug)->delete();

                    unset($translations[$key]);
                }
            }
        }

        $data = [
            'name'        => request('name'),
            'slug'        => $slugify->slugify(request('name')),
            'taxonomy'    => 'tag',
            'description' => request('description'),
            'language_id' => request('language'),
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

        $tag->update($data);

        return response()->json(['success' => __('notification.updated_successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Term $tag
     * @return JsonResponse
     */
    public function destroy(Term $tag)
    {
        $tag = Term::tag()->firstWhere('slug', $tag->slug);

        if (!Gate::allows('delete-tags')) {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }

        if ($tag->translation) {

            $translations = json_decode($tag->translation,true);

            foreach($translations as $key => $value) {
                if (key($translations) == $key) {
                    unset($translations[$key]);
                }

                if($value == $tag->slug){
                    unset($translations[$key]);
                }

                $trans = [];
                foreach ($translations as $k => $val) {
                    $trans[$k] = $val;
                }

                $data = [
                    'translation' => $translations ? json_encode($translations) : null
                ];

                $slug = Arr::get(json_decode($tag->translation,true), $key);
                Term::tag()->where('slug', $slug)->update($data);
                $translations[$key] = $value;
            }
        }

        $tag->delete();

        return response()->json(['success' => __('notification.deleted_successfully')]);
    }

    /**
     * Remove the multi resource from storage.
     *
     * @return JsonResponse
     */
    public function massdestroy()
    {
        if (!Gate::allows('delete-tags')) {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }

        $tags_id_array = request('id');

        $tags = Term::whereIn('id', $tags_id_array);

        foreach($tags->get() as $tag){

            if ($tag->translation) {
                $translations = json_decode($tag->translation,true);
                foreach($translations as $key => $value) {
                    if (key($translations) == $key) {
                        unset($translations[$key]);
                    }

                    if($value == $tag->slug){
                        unset($translations[$key]);
                    }

                    $trans = [];
                    foreach ($translations as $k => $val) {
                        $trans[$k] = $val;
                    }

                    $data = [
                        'translation' => $translations ? json_encode($translations) : null
                    ];

                    $slug = Arr::get(json_decode($tag->translation,true), $key);
                    Term::tag()->where('slug', $slug)->update($data);
                    $translations[$key] = $value;
                }
            }
        }

        if($tags->delete()) {
            return response()->json(['success' => __('notification.deleted_successfully')]);
        } else {
            return response()->json(['error' => __('notification.deleted_not_successfully')]);
        }
    }
}
