<?php

namespace App\Helpers;

use App\Models\{Socialmedia, User};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Auth, File, Storage};
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class Users
{
    /**
     * @param $image
     * @return string
     */
    public static function getAvatar($image) {
        if ( $image === 'noavatar.png') {
            $file = file_get_contents(public_path('img/noavatar.png'));
            $type = File::mimeType(public_path('img/noavatar.png'));
        } else {
            $exists = Storage::disk('public')->exists('avatar/' . $image);

            if (!$exists) {
                $file = file_get_contents(public_path('img/noavatar.png'));
                $type = File::mimeType(public_path('img/noavatar.png'));
            } else {
                $file = Storage::get('public/avatar/' . $image);
                $type = Storage::disk('public')->mimeType('avatar/' . $image);
            }
        }
        return 'data:'.$type.';base64,' .base64_encode($file);
    }

    /**
     * @param $image
     * @return string
     */
    public static function getPhoto($image) {
        if ($image) {
            $exists = Storage::disk('public')->exists('avatar/' . $image);

            if ($exists) {
                $file = Storage::get('public/avatar/' . $image);
                $type = Storage::disk('public')->mimeType('avatar/' . $image);
                return 'data:'.$type.';base64,' .base64_encode($file);
            }
        }

        return 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D';
    }

    /**
     * @param $image
     * @return string
     */
    public static function uploadAvatar($image) {
        $path             = storage_path('app/public/avatar');
        $dimensionWidth   = '200';
        $getFileName      = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $getFileExtension = pathinfo($image->getClientOriginalExtension(), PATHINFO_FILENAME);
        $fileName         = $getFileName . '-' . Str::random(10) . '.' . $getFileExtension;
        $img              = Image::make($image);
        $resizeImage      = $img->resize($dimensionWidth, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->insert($resizeImage, 'center');
        $img->save($path . '/' . $fileName);

        return $fileName;
    }

    /**
     * @param $id
     */
    public static function syncSocialMedia($id) {
        $getUser = User::find($id);

        $data_array = [];
        if ( request()->filled('socmed') ) {
            foreach ( request('socmed') as $item ) {
                $socmed = Socialmedia::find($item);

                if (request($socmed->slug) != null) {
                    $data_array[$item] = [ 'url' => request($socmed->slug) ];
                }
            }
            $getUser->socialmedia()->sync($data_array);
        }
    }

	/**
	* @return bool
	*/
	public static function language()
	{
		$language = Auth::user()->language;

        if (Languages::isExists($language)) {
            return Languages::getName($language);
        } else {
            return Languages::getDefault();
        }
	}

    /**
     * @return bool
     */
    public static function lang()
    {
        return Auth::user()->language;
    }

    /**
     * @return array
     */
    public static function getModulesRole(): array
    {
        $getAllPermissions  = Auth::user()->getAllPermissions();

        $modules = [];
        foreach ($getAllPermissions as $permission) {
            $modules[] = Utl::getModuleFromPermission($permission->name);
        }

        return array_unique($modules);
    }

    /**
     * @param $roleName
     * @return bool
     */
    public static function checkRoleExcept($roleName): bool
    {
        $allRoles = Role::select('name')->whereNotIn('name', ['super-admin', 'admin', 'author'])->get();

        $arrRoles = Arr::flatten($allRoles->toArray());

        return in_array($roleName, $arrRoles);
    }

    /**
     * @param $user
     */
    public static function checkUserAuthorization($user) {
        $user->load('roles');

        if (Auth::User()->hasRole('super-admin')) {
            if ($user->hasRole('super-admin')
                && Auth::id() != $user->id) {
                abort('403');
            }
        } else if(Auth::User()->hasRole(['admin'])) {
            if ($user->hasRole('super-admin')) {
                abort('403');
            } else {
                if ($user->hasRole('admin')
                    && Auth::id() != $user->id) {
                    abort('403', '', ['locale'=>'ar']);
                }
            }
        } else {
            if ($user->hasRole(['super-admin','admin'])) {
                abort('403');
            } else {
                if ($user->hasRole('author')
                    && Auth::id() != $user->id) {
                    abort('403');
                }
            }
        }
    }

}
