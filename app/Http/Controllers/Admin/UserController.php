<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Helpers\{Users, Languages};
use App\Models\{Socialmedia, User};
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\{Auth, File, Gate, Storage, Hash};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request, Response};

class UserController extends Controller
{
    public $pathAvatar;
    public $dimensions;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->pathAvatar = storage_path('app/public/avatar');
        $this->middleware('permission:read-users');
        $this->middleware('permission:add-users', ['only' => ['create','store']]);
        $this->middleware('permission:update-users', ['only' => ['edit', 'update']]);
    }

    /**
     * @param $filename
     * @param $filetype
     * @return string
     */
    public function base64_encode_image($filename = string, $filetype = string)
    {
        if ($filename) {
            $imgbinary = fread(fopen($filename, "r"), filesize($filename));
            return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserDataTable $dataTable
     * @return Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|min:3|max:100',
            'username' => 'required|string|min:3|max:100|unique:users,username|alpha_dash',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'    => 'required|exists:roles,name'
        ]);

        $user = new User;

        $user->name       = request('name');
        $user->username   = request('username');
        $user->email      = request('email');
        $user->password   = Hash::make(request('password'));
        $user->occupation = request('occupation');
        $user->about      = request('about');
        $user->language   = Languages::getLangIdDefault();


        // if image available
        if (request()->hasFile('image')) {
            $image = request('image_base64');
            $name = request()->image->getClientOriginalName();

            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);

            $fileImage = base64_decode($image);
            $path = $this->pathAvatar . '/' . $name;

            if (!File::exists($this->pathAvatar)) {
                File::makeDirectory($this->pathAvatar);
            }

            file_put_contents($path, $fileImage);

            $user->photo = $name;
        }

        $user->save();

        $user->assignRole(request('role'));

        if ( request()->filled('socmed') ) {
            foreach ( request('socmed') as $item ) {
                $socmed = Socialmedia::find($item);
                if(request($socmed->slug) !== "") {
                    if (request($socmed->slug)) {
                        $user->socialmedia()->attach($item, [
                            'url' => request($socmed->slug)
                        ]);
                    }
                }
            }
        }

        return redirect()->route('users.index')
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
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        Users::checkUserAuthorization($user);
        $image          = Users::getPhoto($user->photo);

        $userRel        = $user->socialmedia()->get();
        $checkRelSocmed = $user->socialmedia()->exists();

        return view('admin.user.edit', compact('user', 'image', 'checkRelSocmed','userRel'));
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
        $request->validate([
            'name'       => 'required|string|min:2|max:100',
            'username'   => 'required|string|min:3|max:100|unique:users,username, ' . $id . ',id|alpha_dash',
            'email'      => 'required|email|unique:users,email, ' . $id . ',id',
            'password'   => 'nullable|min:6',
            'role'       => 'required',
        ]);

        $user             = User::findOrFail($id);

        $user->name       = request('name');
        $user->username   = request('username');
        $user->password   = request('password') ? Hash::make(request('password')) : $user->password;
        $user->email      = request('email');
        $user->occupation = request('occupation');
        $user->about      = request('about');
        $user->updated_at = Carbon::now();

        if (request()->missing('status')) {
            $user->ban();
            $user->active = '0';
        } else {
            if ($user->isBanned()) {
                $user->unban();
                $user->active = 1;
            }
        }

        if (request()->hasFile('image')) {
            if (!empty($user->photo)) {
                Storage::disk('public')->delete('avatar/' . $user->photo);
            }

            $image = $request->image_base64;
            $name  = request()->image->getClientOriginalName();

            if (count(explode(';', $image)) == 2) {
                list($type, $image) = explode(';', $image);
                list(, $image) = explode(',', $image);
                $image = base64_decode($image);
                $path  = $this->pathAvatar . '/' . $name;
                if (!File::exists($this->pathAvatar)) {
                    File::makeDirectory($this->pathAvatar);
                }
                file_put_contents($path, $image);
                $user->photo = $name;
            }
        } else {
            if (request('isupload') == "remove") {
                if (!empty($user->photo)) {
                    Storage::disk('public')->delete('avatar/' . $user->photo);
                }
                $user->photo = null;
            }
        }

        $user->save();
        $user->syncRoles($request->role);
        Users::syncSocialMedia($id);

        return redirect()->route('users.index')
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
        if (Gate::allows('delete-users')) {
            if (Auth::id() != $id) {
                $user = User::findOrFail($id);
                $user->delete();
                return response()->json(['success' => __('notification.deleted_successfully')]);
            } else {
                return response()->json(['error' => __('notification.dont_have_permission')]);
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
        if (Gate::allows('delete-users')) {
            $user_id_array = request('id');

            if (($key = array_search(Auth::id(), $user_id_array)) !== false) {
                unset($user_id_array[$key]);
            }

            $users = User::whereIn('id', $user_id_array)->get();

            foreach($users as $item) {
                if ($item->photo != "noavatar.png") {
                    Storage::disk('public')->delete('avatar/' . $item->photo);
                }
            }

            $user = User::whereIn('id', $user_id_array);
            if($user->delete()) {
                return response()->json(['success' => __('notification.deleted_successfully')]);
            } else {
                return response()->json(['error' => __('notification.deleted_not_successfully')]);
            }
        } else {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }
    }

    /**
     * @param $filename
     * @return StreamedResponse
     */
    public function displayImageUser($filename)
    {
        if (Storage::disk('public')->exists('avatar/' . $filename)) {
            return Storage::disk('public')->response('avatar/' . $filename);
        } else {
            return response()->file(public_path('/img/noavatar.png'));
        }
    }
}
