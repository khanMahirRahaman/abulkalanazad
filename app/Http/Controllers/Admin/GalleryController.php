<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use App\Helpers\Languages;
use Illuminate\Support\{Arr, Str};
use Illuminate\Validation\ValidationException;
use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Contracts\View\{Factory, View};
use App\DataTables\GalleryDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Gate, Storage, Validator};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Auth\Access\AuthorizationException;

class GalleryController extends Controller
{
    /**
     * GalleryController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:read-galleries');
        $this->middleware('permission:add-galleries', ['only' => ['create']]);
        $this->middleware('permission:update-galleries', ['only' => ['edit']]);
        $this->middleware('permission:delete-galleries', ['only' => ['destroy', 'massdestroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param GalleryDataTable $dataTable
     * @return Response
     * @throws AuthorizationException
     */
    public function index(GalleryDataTable $dataTable)
    {
        $this->authorize('read-galleries');
        return $dataTable->render('admin.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'file' => 'required|image',
        ])->validate();

        $filename = '';
        $mimetype = '';
        $url      = '';
        $json     = '';
        if (request()->hasFile('file')) {
            $file         = request()->file->getClientOriginalName();
            $file0        = explode('.', $file);
            $filename     = head($file0);
            $mimetype     = request()->file->getClientMimeType();
            $imagedetails = getimagesize(request('file'));
            $width        = $imagedetails[0];
            $height       = $imagedetails[1];

            request()->file->storeAs('images', $file, 'public');

            $url = $file;

            $meta = [
                'file'           => $file,
                'type'           => request()->file->extension(),
                'size'           => request()->file->getSize(),
                'dimension'      => $width . 'x' . $height,
                'attr_image_alt' => '',
            ];

            $json = json_encode($meta);
        }

        Post::create([
            'post_title'      => Str::title($filename),
            'post_name'       => $filename,
            'post_mime_type'  => $mimetype,
            'post_type'       => 'gallery',
            'post_content'    => '',
            'post_status'     => 'inherit',
            'post_author'     => Auth::id(),
            'post_language'   => Languages::getLangIdDefault(),
            'post_image'      => '',
            'post_guid'       => $url,
            'post_image_meta' => $json,
        ]);

        return redirect()->route('galleries.index')
            ->withSuccess(__('notification.saved_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
        $gallery = Post::findOrFail($id);
        $meta = json_decode($gallery->post_image_meta);
        return view('admin.gallery.edit', compact('gallery', 'meta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $gallery     = Post::findOrFail($id);
        $meta        = json_decode($gallery->post_image_meta, true);
        $update_meta = Arr::set($meta, 'attr_image_alt', strip_tags(request('alt_text')));
        $newmeta     = json_encode($update_meta);

        $data = [
            'post_title'      => strip_tags(Str::title(request('title'))),
            'post_content'    => request('description'),
            'post_summary'    => request('caption'),
            'post_image_meta' => $newmeta,
            'updated_at'      => Carbon::now()
        ];

        Post::where('id', $id)->update($data);

        return redirect()->route('galleries.index')
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
        if (Gate::allows('delete-permissions')) {
            $gallery  = Post::find($id);
            $meta     = json_decode($gallery->post_image_meta);
            $filename = $meta->file;
            Storage::disk('public')->delete('images/' . $filename);
            Post::destroy($id);
            return response()->json(['success' => __('notification.deleted_successfully')]);
        } else {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }
    }
}
