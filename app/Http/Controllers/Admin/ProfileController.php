<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Users;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Routing\Redirector;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\{Auth, File, Hash, Storage, Validator};

class ProfileController extends Controller
{
    public $pathAvatar;

    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->pathAvatar = storage_path('app/public/avatar');
        $this->middleware('permission:read-profile');
        $this->middleware('permission:update-profile', ['only' => ['edit']]);
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
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());

        $roles = [];
        foreach ($user->getRoleNames() as $role) {
            $roles[] = $role;
        }
        $role = implode(' | ', $roles);

        $roles          = $user->roles;
        $image          = Users::getPhoto($user->photo);
        $userRel        = $user->socialmedia()->get();
        $checkRelSocmed = $user->socialmedia()->exists();

        return view('admin.profile.show', compact('user','role','roles','checkRelSocmed','userRel','image'));
    }

    /**
     * @return Application|Factory|View
     */
    public function change_password()
    {
        return view('admin.profile.change_password');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function password_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password'     => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('admin/change-password')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail(Auth::id());

        $hashedPassword = $user->password;

        if (Hash::check($request->old_password, $hashedPassword))
        {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        } else {
            return redirect('admin/change-password')
                ->withErrors(['old_password' => __('profile.message_password_wrong')])
                ->withInput();
        }

        return redirect()->route('view.password.edit')
            ->withSuccess(__('profile.message_change_password_successfully'));
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
        request()->validate([
            'name'       => 'required|string|min:2|max:100',
            'username'   => 'required|string|min:3|max:100|unique:users,username, ' . $id . ',id',
            'email'      => 'required|email|unique:users,email, ' . $id . ',id',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'occupation' => request('occupation'),
            'about' => request('about'),
            'updated_at' => Carbon::now()
        ];

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
                $data['photo'] = $name;
            }
        } else {
            if (request('isupload') == "remove") {
                if (!empty($user->photo)) {
                    Storage::disk('public')->delete('avatar/' . $user->photo);
                }
                $data['photo'] = null;
            }
        }

        $user->update($data);

        if (request()->has('roles')) {
            $user->syncRoles(request('roles'));
        }
        Users::syncSocialMedia($id);

        if ($user->wasChanged()) {
            return redirect()->route('profile.index')
                ->withSuccess(__('profile.message_your_profile_has_been_successfully_changed'));
        }

        return redirect()->route('profile.index')
            ->withSuccess(__('profile.message_there_are_no_changes_to_your_profile'));
    }
}
