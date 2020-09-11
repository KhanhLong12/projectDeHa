<?php

namespace App\Http\Controllers\backend;

use App\User;

use App\Model\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

    public function list(Request $request)
    {
        $users = $this->user->all();
        return view('backend.page.user.list', compact('users'));
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $insertUser = $request->only(['name', 'email']);
        $insertUser['password'] = Hash::make($request->password);
        $user = $this->user->create($insertUser);
        $array_role = $request->user_role;
        $user->roles()->sync($array_role);
        return response()->json([
            'user' => $user,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
