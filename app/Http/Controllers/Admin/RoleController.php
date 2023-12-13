<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RoleDataTable;
use App\Models\User;
use App\Helpers\{Permissions, Users};
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Support\Facades\{Auth, DB, Gate};
use Illuminate\Support\Str;
use Illuminate\Validation\{Rule, ValidationException};
use Spatie\Permission\Models\{Permission, Role};

class RoleController extends Controller
{
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:read-roles', ['except' => ['ajaxSearch']]);
        $this->middleware('permission:add-roles', ['only' => ['create']]);
        $this->middleware('permission:update-roles', ['only' => 'edit']);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        return User::searchRole($keyword);
    }

    /**
     * @return JsonResponse
     */
    public function changePermission()
    {
        $role = Role::findOrFail(request('role_id'));

        $permission = Permission::find(request('permissions'));
        if ( $role->hasPermissionTo($permission->name) ) {
            $role->revokePermissionTo($permission->name);
            $msg = __('Revoke ' . $permission->name . ' permissions');
        } else {
            $role->givePermissionTo($permission->name);
            $msg = __('Give ' . $permission->name . ' permissions');
        }
        return response()->json(['success' => $msg]);
    }

    /**
     * @return JsonResponse
     */
    public function changeAllPermission()
    {
        $role = Role::findOrFail(request('role_id'));

        if ( request('status') === 'true' ) {
            $role->givePermissionTo(Permission::all());
            $msg = __('role.give_all_permission');
        } else {
            $role->revokePermissionTo(Permission::all());
            $msg = __('role.revoke_all_permission');
        }

        return response()->json(['success' => $msg]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param RoleDataTable $dataTable
     * @return Response
     */
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        if(Auth::User()->hasRole('super-admin')) {
            $permissions = Permission::all()->pluck('name', 'id');
        }else{
            $except = [
                Permissions::getId('read-super-admin'),
                Permissions::getId('add-super-admin'),
                Permissions::getId('update-super-admin'),
                Permissions::getId('delete-super-admin'),
            ];

            $permission = Permission::all()->except($except);
            $permissions = $permission->pluck('name', 'id');
        }

        $modules = Users::getModulesRole();

        return view('admin.role.create', compact('permissions', 'modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles|max:50|min:2|alpha_dash'
        ]);

        $role = Role::firstOrCreate(['name' => Str::lower(request('name'))]);

        $role->syncPermissions(request('permissions'));

        $read       = Permission::create(['name' => 'read-' . Str::lower(request('name'))]);
        $add        = Permission::create(['name' => 'add-' . Str::lower(request('name'))]);
        $update     = Permission::create(['name' => 'update-' . Str::lower(request('name'))]);
        $delete     = Permission::create(['name' => 'delete-' . Str::lower(request('name'))]);
        $editPost   = Permission::create(['name' => 'edit-post-' . Str::lower(request('name'))]);
        $deletePost = Permission::create(['name' => 'delete-post-' . Str::lower(request('name'))]);

        Role::findByName('super-admin')->givePermissionTo([
            $read, $add, $update, $delete, $editPost, $deletePost
        ]);
        Role::findByName('admin')->givePermissionTo([
            $read, $add, $update, $delete, $editPost, $deletePost
        ]);

        return redirect()->route('roles.index')->withSuccess(__('role.role_saved_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $role = Role::findOrFail($id);

        $status = Users::checkRoleExcept($role->name);

        if(Auth::User()->hasRole('super-admin')) {
            $permissions = Permission::all()->pluck('name', 'id');
        }else{
            $except = [
                Permissions::getId('read-settings'),
                Permissions::getId('update-settings'),
            ];

            $permission = Permission::all()->except($except);
            $permissions = $permission->pluck('name', 'id');
        }

        $modules = Users::getModulesRole();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        $ifCheckAll = Permission::count() === count($rolePermissions);

        return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions', 'ifCheckAll', 'modules', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|' . Rule::unique('roles')->ignore($id, 'id') .'|max:50|min:2|alpha_dash',
        ]);

        $role = Role::findOrFail($id);

        if (Users::checkRoleExcept($role->name)) {
            $role->name       = Str::lower(request('name'));
            $role->updated_at = Carbon::now();
            $role->save();

            return redirect()->route('roles.index')
                ->withSuccess(__('role.role_updating_successfully'));
        } else {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (Gate::allows('delete-roles')) {
            $role = Role::findOrFail($id);

            if (Users::checkRoleExcept($role->name)) {
                Permission::where('name', 'read-' . $role->name)->delete();
                Permission::where('name', 'add-' . $role->name)->delete();
                Permission::where('name', 'update-' . $role->name)->delete();
                Permission::where('name', 'delete-' . $role->name)->delete();
                Permission::where('name', 'edit-post-' . $role->name)->delete();
                Permission::where('name', 'delete-post-' . $role->name)->delete();
                $role->delete();
                return response()->json(['success' => __('role.role_deleted_successfully')]);
            }
            return response()->json(['error' => __('role.role_deleted_no_successfully')]);

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
        if (Gate::allows('delete-roles')) {
            $roles_id_array = request('id');

            $roles = Role::whereIn('id', $roles_id_array);

            $roles_id = [];
            $permission_id_array = [];

            foreach($roles->get() as $role) {
                if (Users::checkRoleExcept($role->name)) {
                    $permission_id_array[] = Permission::where('name', 'read-' . $role->name)->first()->id;
                    $permission_id_array[] = Permission::where('name', 'add-' . $role->name)->first()->id;
                    $permission_id_array[] = Permission::where('name', 'update-' . $role->name)->first()->id;
                    $permission_id_array[] = Permission::where('name', 'delete-' . $role->name)->first()->id;
                    $permission_id_array[] = Permission::where('name', 'edit-post-' . $role->name)->first()->id;
                    $permission_id_array[] = Permission::where('name', 'delete-post-' . $role->name)->first()->id;

                    $roles_id[] = $role->id;
                }
            }

            Permission::whereIn('id', $permission_id_array)->delete();

            $roles = Role::whereIn('id', $roles_id);

            if($roles->delete()) {
                return response()->json(['success' => __('role.role_deleted_successfully')]);
            } else {
                return response()->json(['error' => __('role.role_deleted_no_successfully')]);
            }
        } else {
            return response()->json(['error' => __('notification.dont_have_permission')]);
        }
    }
}
