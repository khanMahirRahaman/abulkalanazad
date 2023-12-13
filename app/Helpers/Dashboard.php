<?php

namespace App\Helpers;

use App\Models\{Contact, Post, Term, User};
use Illuminate\Database\Eloquent\{Builder, Collection};
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class Dashboard
{

    /**
     * @return array
     */
    public static function roles()
    {
        return User::showRoles();
    }

    /**
     * @return Builder[]|Collection
     */
    public static function getDataTaxonomy()
    {
        return Term::with('taxonomy')->get();
    }

}
