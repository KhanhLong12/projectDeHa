<?php

namespace App\Http\Controllers\backend;

use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    protected $permission;

    protected $role;

    public function __construct(Permission $permission, Role $role)
    {
        $this->permission = $permission;

        $this->role = $role;
    }

    public function index()
    {
        $permissions = $this->permission->all();
        return view('backend.page.role.index', compact('permissions'));
    }

    public function list(Request $request)
    {
        $roles = $this->role->paginate(4);
        return view('backend.page.role.list', compact('roles'));
    }

    public function store(Request $request)
    {
        $insertRole = $request->only(['name', 'description']);
        $role = $this->role->create($insertRole);
        $array_permission = $request->permission_role;
        $role->permissions()->sync($array_permission);
        return response()->json([
            'role' => $role,
        ], 200);
    }

    public function edit($id)
    {
        $role = $this->role->findOrFail($id);
        $permissions = $this->permission->all();
        $roleHasPermission = $role->permissions;
        return view('backend.page.role.get_data_role', compact('role', 'permissions', 'roleHasPermission'));
    }

    public function update(Request $request, $id)
    {
        $role = $this->role->findOrFail($id);
        $role->update($request->all());
        $array_permission = $request->permission_role;
        $role->permissions()->sync($array_permission);
        return response()->json([
            'role' => $role,
        ], 200);
    }

    public function destroy($id)
    {
        $role = $this->role->findOrFail($id);
        $role->permissions()->detach();
        $role->delete();
        return response()->json([
            'role' => $role,
        ], 200);
    }
}
