<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostDataTable;
use App\Helpers\{Languages, Posts};
use App\Http\Controllers\Controller;
use App\Models\{Language, Post, PostGallery, Term, Translation, Video};
use App\Services\Slug;

use Carbon\Carbon;
use Cocur\Slugify\Slugify;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request, Response};
use Illuminate\Support\Facades\{Auth, File, Gate, Storage, Validator};
use Illuminate\Support\{Arr, Str};
use Illuminate\Validation\{Rule, ValidationException};

class PostController extends Controller
{
    /**
     * @var string
     */
    public string $path;
    /**
     * @var string
     */
    public string $dimensionWidth;
    /**
     * @var string
     */
    public string $dimensionHeight;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->path = storage_path('app/public/images'); //Post image storage path
        $this->dimensionWidth = '700'; //image width
        $this->dimensionHeight = '400'; //image height
        if (!File::exists($this->path)) {
            File::makeDirectory($this->path); //create path if not exist
        }
        $this->middleware('permission:read-posts');
        $this->middleware('permission:add-posts', ['only' => ['create', 'store']]);
        $this->middleware('permission:update-posts', ['only' => ['edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PostDataTable $dataTable
     * @return Response
     */
    public function index(PostDataTable $dataTable)
    {
        return $dataTable->render('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|View
     */
    public function createTranslate(Request $request, $id)
    {
        $language = Language::firstWhere('language_code', request('lang'));
        $post     = Post::with('translations')->findOrFail($id);
        $image    = Posts::getThumb($post->post_image);
        $transId  = $post->translations->first()->id;
        return view('admin.post.create-translate', compact('language', 'post', 'image', 'transId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Slug $slug
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Slug $slug, Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|min:3',
            'slug'  => ['nullable', Rule::unique('posts', 'post_name')->where(function ($query) {
                return $query->wherePostType('post');
            })]
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // status (draft or publish) based button submit
        $status = request()->has('draft') ? 'draft' : (request()->has('publish') ? 'publish' : NULL);

        $post = new Post;

        // if image available
        if (request()->hasFile('image')) {
            $post->post_image = Posts::postThumb(request('image'));
        }

        $slugify = new Slugify();

        $post_name = request()->slug;

        $post->post_title       = strip_tags(Str::title(request('title')));
        $post->post_name        = $post_name;
        $post->post_summary     = request('summary');
        $post->post_content     = request('content');
        $post->portal_name     = request('portal_name');
        $post->meta_description = strip_tags(request('meta_description'));
        $post->meta_keyword     = strip_tags(request('meta_keyword'));
        $post->post_status      = $status;
        $post->post_visibility  = request('visibility');
        $post->image_alt  = request('image_alt');
        $post->post_hits        = 0;
        $post->post_author      = Auth::id();
        $post->post_language    = request('language');
        $post->post_type        = 'post';
        $post->created_at       = date("Y-m-d", strtotime(str_replace('/', '-', request('postDate'))));

        $post->save();

        $lang = Languages::showCodeLanguage(request('language'));

        if (request()->has('trans_id')) {
            $translation = Translation::find(request('trans_id'));

            $valueArr = json_decode($translation->value, true);

            $valueAdded = Arr::add($valueArr, $lang, $post->id);

            $translation->value = json_encode($valueAdded);
            $translation->save();

            $post->translations()->sync([request('trans_id')]);
        } else {
            $translation = Translation::create([
                'value' => json_encode([
                    $lang => $post->id,
                ])
            ]);

            $post->translations()->attach([
                'translation_id' => $translation->id
            ]);
        }

        if (request()->filled('categories')) {
            foreach(request('categories') as $key => $value){
                $post->terms()->attach([
                    'term_id' => (int) $value
                ]);
            }
        }

        if (!is_null(request('tags'))) {
            $tags = explode(',', request('tags'));
            foreach ($tags as $tag) {
                $check_tag = Term::tag()->firstWhere('name', $tag);

                if ($check_tag) {
                    $tag_taxonomy_id = Term::tag()->firstWhere('name', $tag)->id;
                    $post->terms()->attach([
                        'term_taxonomy_id' => $tag_taxonomy_id
                    ]);
                } else {
                    $tag = Term::create([
                        'name' => $tag,
                        'slug' => $slugify->slugify($tag),
                        'taxonomy' => 'tag',
                        'language_id' => request('language')
                    ]);
                    $post->terms()->attach([
                        'term_id' => $tag->id
                    ]);
                }
            }
        }
        if($request->video) {
            Video::updateorcreate(
                ['url' => $request->video],
                [
                    'post_id' => $post->id
                ]);

        }


        if($request->file('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $gallery = new PostGallery();
                $gallery->post_id = $post->id;

                if ($image) {

                    $imgName = md5(Str::random(30) . time() . '_' . $image) . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads/postimage', $imgName);
                    $gallery->image = $imgName;
                } else {
                    $gallery->image = 'null';
                }

                $gallery->save();
            }
        }

        if($request->file('pdffile')) {
            $pdfFile = $request->file('pdffile');
            $pdfFileType = $pdfFile->getClientOriginalExtension();

            if ($pdfFileType === 'pdf') {
                $pdfFileName = md5(Str::random(30) . time() . '_' . $pdfFile) . '.' . $pdfFileType;
                $pdfFile->move('uploads/pdfs', $pdfFileName);

                // Perform any additional operations with the uploaded PDF file

                // Example: Save the file name to the database
                $post->pdffile = $pdfFileName;

            }
        }
        $post->save();


        return redirect()->route('posts.index')->withSuccess(__('notification.saved_successfully'));
    }

    /**
     * @param Slugify $slugify
     * @return JsonResponse
     */
    public function categoryStore(Slugify $slugify)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => ['required', 'min:3', Rule::unique('terms', 'name')->where(function ($query) {
                return $query->whereTaxonomy('category');
            })]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $data = [
            'name'        => request('name'),
            'slug'        => $slugify->slugify(request('name')),
            'parent'      => request('parent') ? request('parent') : '0',
            'taxonomy'    => 'category',
            'language_id' => request('lang')
        ];

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
     */
    public function edit($id)
    {
        $post = Post::with('translations')->findOrFail($id);

        // check term_relationships category
        $checkCategory = is_null( $post->terms()->where('taxonomy','category')->first() );

        if ($checkCategory) {
            $categories = array();
        } else {
            // Get Categories
            foreach ($post->terms()->category()->get() as $category) {
                $taxonomyId = $category->id;
                $categories[] = Term::findOrFail($taxonomyId);
            }
        }

        $tagTerm =  $post->terms()->tag();

        $tags = [];
        if($tagTerm){
            foreach ($tagTerm->get() as $tag) {
                $tags[] = $tag->name;
            }
            $tags = implode(',', $tags);
        }

        // visibility option
        $visibility = $post->post_visibility;

        // file
        $image = Posts::getThumb($post->post_image);

        // language
        $language = Language::find($post->post_language);




        return view('admin.post.edit', compact('post', 'categories', 'tags', 'image', 'visibility', 'language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|min:3',
            'slug'  => ['nullable', Rule::unique('posts', 'post_name')->where(function ($query) {
                return $query->wherePostType('post');
            })->ignore($id)]
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $post      = Post::findOrFail($id);
        $slugify   = new Slugify();
        $post_name = request()->slug;

        if (request()->filled('slug')) {
            if (request('slug') != $post->post_name) {
                $post_name = request()->slug;
            }
        } else {
            $post_name = request()->slug;
        }

        $data = array(
            'post_title'       => strip_tags(Str::title(request('title'))),
            'post_name'        => $post_name,
            'post_summary'     => request('summary'),
            'post_content'     => request('content'),
            'portal_name' => request('portal_name'),
            'post_type'        => 'post',
            'post_visibility'  => request('visibility'),
            'image_alt'  => request('image_alt'),
            'meta_description' => strip_tags(request('meta_description')),
            'meta_keyword'     => strip_tags(request('meta_keyword')),
            'created_at'       => date("Y-m-d", strtotime(str_replace('/', '-', request('postDate')))),
            'updated_at'       => Carbon::now()
        );

        $data['post_status'] = request()->has('draft') ? 'draft' : (request()->has('publish') ? 'publish' : NULL);

        if (request('isimage') == "true") {
            if (request()->hasFile('image')) {
                if (!empty($post->post_image)) {
                    Storage::disk('public')->delete('images/' . $post->post_image);
                }
                $data['post_image'] = Posts::postThumb(request('image'));
            }
        } else {
            if (!empty($post->post_image)) {
                Storage::disk('public')->delete('images/' . $post->post_image);
            }
        }

        if (request()->filled('categories')) {
            foreach(request('categories') as $key => $value){
                $terms[] = (int) $value;
            }
        }

        if (!is_null(request('tags'))) {
            $tags = explode(',', request('tags'));
            foreach ($tags as $tag) {
                $term = Term::tag()->firstWhere('name', $tag);
                if ($term) {
                    $terms[] = $term->id;
                } else {
                    $tag = Term::create([
                        'name' => $tag,
                        'slug' => $slugify->slugify($tag),
                        'taxonomy' => 'tag',
                        'language_id' => request('language')
                    ]);
                    $terms[] = $tag->id;
                }
            }
        }
        if($request->video) {
            Video::updateorcreate(
                ['url' => $request->video],
                [
                    'post_id' => $post->id
                ]);

        }
        if ($request->deleteimages){
            foreach ($request->deleteimages as $delete_image){
                $image_name = PostGallery::select("image")->where("id","=",$delete_image)->first();
                unlink('uploads/postimage/'.$image_name->image);
                PostGallery::where("id","=",$delete_image)->delete();
            }
        }
        if($request->file('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $gallery = new PostGallery();
                $gallery->post_id = $post->id;

                if ($image) {

                    $imgName = md5(Str::random(30) . time() . '_' . $image) . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads/postimage', $imgName);
                    $gallery->image = $imgName;
                } else {
                    $gallery->image = 'null';
                }

                $gallery->save();
            }
        }


        if($request->file('pdffile')) {
            $pdfFile = $request->file('pdffile');
            $pdfFileType = $pdfFile->getClientOriginalExtension();

            if ($pdfFileType === 'pdf') {
                $pdfFileName = md5(Str::random(30) . time() . '_' . $pdfFile) . '.' . $pdfFileType;
                $pdfFile->move('uploads/pdfs', $pdfFileName);

                // Perform any additional operations with the uploaded PDF file

                // Example: Save the file name to the database
                $data['pdffile'] = $pdfFileName;

            }
        }


        Post::where('id', $id)->update($data);

        if (request()->filled('categories') OR request()->filled('tags')) {
            $post->terms()
                ->sync($terms);
        }

        return redirect()->route('posts.index')->withSuccess(__('notification.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (Gate::allows('delete-posts')) {
            $post = Post::findOrFail($id);

            $transId     = $post->translations->first()->id;
            $translation = Translation::find($transId);
            $valueArr    = json_decode($translation->value, true);

            if (count($valueArr) == 1) {
                if ($post->post_image) {
                    Storage::disk('public')->delete('images/' . $post->post_image);
                }

                preg_match_all('/<img(.*?)src=("|\'|)(.*?)("|\'| )(.*?)>/s', $post->post_content, $url_images);

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
        if (Gate::allows('delete-posts')) {
            $posts_id_array = request('id');

            $posts = Post::whereIn('id', $posts_id_array)->get();

            foreach ($posts as $item) {

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

            $post = Post::whereIn('id', $posts_id_array);

            if ($post->delete()) {
                return response()->json(['success' => __('notification.deleted_successfully')]);
            } else {
                return response()->json(['error' => __('notification.deleted_not_successfully')]);
            }
        } else {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }
    }

}
