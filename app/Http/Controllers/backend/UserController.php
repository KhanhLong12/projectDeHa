<?php

namespace App\Http\Controllers\backend;

use App\User;

use App\Model\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
    protected $user;

    protected $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;

        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->all();
        return view('backend.page.user.index', compact('roles'));
    }

    public function list()
    {
        $users = $this->user->paginate(3);
        return view('backend.page.user.list', compact('users'));
    }

    public function store(StoreUserRequest $request)
    {
        $insertUser = $request->only(['name', 'email','password']);
        $user = $this->user->create($insertUser);
        $array_role = $request->user_role;
        $user->roles()->sync($array_role);
        return response()->json([
            'user' => $user,
        ], 200);
    }

    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        $roles = $this->role->all();
        $userHasRole = $user->roles;
        return view('backend.page.user.get_data', compact('user', 'roles', 'userHasRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);
        $user->update($request->all());
        $array_role = $request->user_role;
        $user->roles()->sync($array_role);
        return response()->json([
            'user' => $user,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return response()->json([
            'user' => $user,
        ], 200);
    }
}
