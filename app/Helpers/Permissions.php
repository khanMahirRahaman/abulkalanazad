<?php

namespace App\Helpers;

use Spatie\Permission\Models\Permission;

class Permissions
{
    /**
     * @param $id
     * @return mixed
     */
    public static function get($id)
    {
        return Permission::where('group_id',$id)->get();
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getId($name)
    {
        return Permission::where('name', $name)->first()->id;
    }
}
