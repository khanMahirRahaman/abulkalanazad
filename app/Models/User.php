<?php

namespace App\Models;

use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements BannableContract, MustVerifyEmail
{
    use Bannable, HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'name', 'username', 'email', 'password', 'about', 'photo', 'occupation', 'image', 'active', 'language', 'darkmode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password',
        //'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * @return BelongsTo
     */
    public function userLanguage()
    {
        return $this->belongsTo(Language::class, 'language');
    }

    /**
     * @return BelongsToMany
     */
    public function socialmedia()
    {
        return $this->belongsToMany('App\Models\Socialmedia', 'user_socialmedia', 'user_id', 'socialmedia_id')
        ->withTimestamps()
        ->withPivot('url');
    }

    /**
     * Get the posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'post_author');
    }

    /**
     * @return string
     */
    public function adminlte_image()
    {
        if (Auth::user()->photo) {
            if (Auth::user()->photo != 'noavatar.png') {
                return route('profile.photo', Auth::user()->photo);
            } else {
                return asset('img/noavatar.png');
            }
        } else {
            return asset('img/noavatar.png');
        }
    }

    /**
     * @return string
     */
    public function adminlte_desc()
    {
        $roles = [];
        foreach (Auth::user()->getRoleNames() as $role) {
            $roles[] = $role;
        }
        return implode(' ', $roles);
    }

    /**
     * @return string
     */
    public function adminlte_profile_url()
    {
        return 'admin/profile';
    }

    /**
     * @param Builder $query
     * @param $roles
     * @param null $guard
     * @return Builder
     */
    public function scopeNotRole(Builder $query, $roles, $guard = null): Builder
    {
        if ($roles instanceof Collection) {
            $roles = $roles->all();
        }

        if (! is_array($roles)) {
            $roles = [$roles];
        }

        $roles = array_map(function ($role) use ($guard) {
            if ($role instanceof Role) {
                return $role;
            }

            $method = is_numeric($role) ? 'findById' : 'findByName';
            $guard = $guard ?: $this->getDefaultGuardName();

            return $this->getRoleClass()->{$method}($role, $guard);
        }, $roles);

        return $query->whereHas('roles', function ($query) use ($roles) {
            $query->where(function ($query) use ($roles) {
                foreach ($roles as $role) {
                    $query->where(config('permission.table_names.roles').'.id', '!=' , $role->id);
                }
            });
        });
    }

    /**
     * @param $keyword
     * @return mixed
     */
    public static function searchRole($keyword) {
        if (!Auth::user()->hasRole('super-admin')) {
            $roles = Role::all()->reject(function ($role) {
                return $role->name === 'super-admin';
            })->map(function ($role) {
                return 'read-' . $role->name;
            })->toArray();
        } else {
            $roles = Role::all()->map(function ($role) {
                return 'read-' . $role->name;
            })->toArray();
        }

        $user  = Auth::user();
        $perms = $user->getAllPermissions()->whereIn('name', $roles)->flatten()->toArray();

        $roleName = [];
        foreach ($perms as $perm) {
            $name    = $perm['name'];
            $roleName[] = last(explode('-', $name));
        }

        return Role::select('id','name')
            ->whereIn('name', $roleName)
            ->where("name", "LIKE", "%$keyword%")->get();
    }

    /**
     * @return array
     */
    public static function showRoles()
    {
        $roles = Role::all()->reject(function ($role) {
            return $role->name === 'super-admin';
        })->map(function ($role) {
            return 'read-' . $role->name;
        })->toArray();

        $permissions =  Auth::user()->getAllPermissions()->whereIn('name', $roles)->flatten()->toArray();

        $roles = [];
        foreach ($permissions as $permission) {
            $roles[] = last(explode('-', $permission['name']));
        }

        return $roles;
    }

    /**
     * @param $query
     * @param $name
     */
    public function scopeSearchName($query, $name)
    {
        $query->where("name", "LIKE", "%$name%");
    }
}
