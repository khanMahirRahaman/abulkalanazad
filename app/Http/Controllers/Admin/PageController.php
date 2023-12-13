<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PageDataTable;
use App\Helpers\{Languages, Posts};
use App\Http\Controllers\Controller;
use App\Models\{Language, Post, Translation};
use App\Services\Slug;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request, Response};
use Illuminate\Support\Facades\{Auth, File, Gate, Storage, Validator};
use Illuminate\Support\{Arr, Str};
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    public $dimensionWidth;
    public $dimensionHeight;

    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->dimensionWidth = '640';
        $this->dimensionHeight = '426';
        if (!File::exists(storage_path('app/public/images'))) {
            File::makeDirectory(storage_path('app/public/images'));
        }
        $this->middleware('permission:read-pages');
        $this->middleware('permission:add-pages', ['only' => ['create']]);
        $this->middleware('permission:update-pages', ['only' => ['edit']]);
        $this->middleware('permission:delete-pages', ['only' => ['destroy', 'massdestroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PageDataTable $dataTable
     * @return Response
     */
    public function index(PageDataTable $dataTable)
    {
        return $dataTable->render('admin.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
    public function createTranslate(Request $request, $id)
    {
        $language = Language::firstWhere('language_code', request('lang'));
        $page     = Post::with('translations')->findOrFail($id);
        $image    = Posts::getThumb($page->post_image);
        $transId  = $page->translations->first()->id;
        return view('admin.page.create-translate', compact('language', 'page', 'image', 'transId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|min:3',
            'slug'  => ['nullable', Rule::unique('posts', 'post_name')->where(function ($query) {
                return $query->wherePostType('page');
            })]
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // status (draft or publish) based button submit
        $status = request()->has('draft') ? 'draft' : (request()->has('publish') ? 'publish' : NULL);

        $page = new Post;

        // if image available
        if (request()->hasFile('image')) {
            $page->post_image = Posts::postThumb(request('image'));
        }

        $slugify = new Slugify();

        $post_name = request()->filled('slug') ?
            $slugify->slugify(request('slug')) :
            $slugify->slugify(request('title'));

        $page->post_title       = strip_tags(Str::title(request('title')));
        $page->post_name        = $post_name;
        $page->post_summary     = request('summary');
        $page->post_content     = request('content');
        $page->meta_description = strip_tags(request('meta_description'));
        $page->meta_keyword     = strip_tags(request('meta_keyword'));
        $page->post_status      = $status;
        $page->post_visibility  = request('visibility');
        $page->post_hits        = 0;
        $page->post_author      = Auth::id();
        $page->post_language    = request('language');
        $page->post_type        = 'page';

        $page->save();

        $lang = Languages::showCodeLanguage(request('language'));

        if (request()->has('trans_id')) {
            $translation = Translation::find(request('trans_id'));

            $valueArr = json_decode($translation->value, true);

            $valueAdded = Arr::add($valueArr, $lang, $page->id);

            $translation->value = json_encode($valueAdded);
            $translation->save();

            $page->translations()->sync([request('trans_id')]);
        } else {
            $translation = Translation::create([
                'value' => json_encode([
                    $lang => $page->id,
                ])
            ]);

            $page->translations()->attach([
                'translation_id' => $translation->id
            ]);
        }

        return redirect()->route('pages.index')
            ->withSuccess(__('notification.saved_successfully'));
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
     */
    public function edit($id)
    {
        $page = Post::with('translations')->findOrFail($id);

        // visibility option
        $visibility = $page->post_visibility;

        // file
        $image = Posts::getThumb($page->post_image);

        $ready = $image != "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D";

        // language
        $language = Language::find($page->post_language);

        return view('admin.page.edit', compact('page','visibility','image','language', 'ready'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Slug $slug
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Slug $slug, $id)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|min:3',
            'slug'  => ['required', Rule::unique('posts', 'post_name')->where(function ($query) {
                return $query->wherePostType('page');
            })->ignore($id),]
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $page                   = Post::findOrFail($id);
        $page->post_title       = strip_tags(Str::title(request('title')));
        $page->post_name        = Slug::slug(request('slug'), '-');
        $page->post_summary     = request('summary');
        $page->post_content     = request('content');
        $page->post_type        = 'page';
        $page->post_status      = request()->has('draft') ? 'draft' : (request()->has('publish') ? 'publish' : null);
        $page->meta_description = strip_tags(request('meta_description'));
        $page->meta_keyword     = strip_tags(request('meta_keyword'));
        $page->post_visibility  = request('visibility');
        $page->updated_at       = Carbon::now();

        if (request('isimage') == "true") {
            if (request()->hasFile('image')) {
                if (!empty($page->post_image)) {
                    Storage::disk('public')->delete('images/' . $page->post_image);
                }
                $page->post_image = Posts::postThumb(request('image'));
            }
        } else {
            if (!empty($page->post_image)) {
                Storage::disk('public')->delete('images/' . $page->post_image);
            }
            $page->post_image = null;
        }

        $page->save();

        return redirect()->route('pages.index')
            ->withSuccess(__('notification.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (Gate::allows('delete-pages')) {
            $page = Post::findOrFail($id);

            $transId = $page->translations->first()->id;
            $translation = Translation::find($transId);
            $valueArr    = json_decode($translation->value, true);

            if (count($valueArr) == 1) {
                if ($page->post_image) {
                    Storage::disk('public')->delete('images/' . $page->post_image);
                }

                preg_match_all('/<img(.*?)src=("|\'|)(.*?)("|\'| )(.*?)>/s', $page->post_content, $url_images);

                foreach ($url_images[3] as $url_image) {
                    $image = last(explode('/', $url_image));
                    Storage::disk('public')->delete('images/' . $image);
                }
            }

            $key = array_search((int)$id, $valueArr, true);

            if ($key !== false) {
                unset($valueArr[$key]);
            }

            $translation->value = json_encode($valueArr);
            $translation->save();

            Post::destroy($id);

            return response()->json(['success' => __('notification.deleted_successfully')]);
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
        if (Gate::allows('delete-pages')) {
            $pages_id_array = request('id');

            $pages = Post::whereIn('id', $pages_id_array)->get();

            foreach($pages as $item) {

                $transId = $item->translations->first()->id;
                $translation = Translation::find($transId);
                $valueArr    = json_decode($translation->value, true);

                if (count($valueArr) == 1) {
                    if ($item->post_image) {
                        Storage::disk('public')->delete('images/' . $item->post_image);
                    }

                    preg_match_all('/<img(.*?)src=("|\'|)(.*?)("|\'| )(.*?)>/s', $item->post_content, $url_images);

                    foreach ($url_images[3] as $url_image) {
                        $image = last(explode('/', $url_image));
                        Storage::disk('public')->delete('images/' . $image);
                    }
                }
                $key = array_search($item->id, $valueArr, true);

                if ($key !== false) {
                    unset($valueArr[$key]);
                }

                $translation->value = json_encode($valueArr);
                $translation->save();
            }

            $pages = Post::whereIn('id', $pages_id_array);

            if($pages->delete()) {
                return response()->json(['success' => __('notification.deleted_successfully')]);
            } else {
                return response()->json(['error' => __('notification.deleted_not_successfully')]);
            }
        } else {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }
    }
}
