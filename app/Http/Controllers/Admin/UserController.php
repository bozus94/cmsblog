<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users.index')->only('index');
        $this->middleware('permission:users.show')->only('show');
        $this->middleware('permission:users.edit')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(8);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.users.create', compact('roles'));
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
   /*  public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.edit', $user->id)
                         ->with('info', 'El usuario se creo correctamente');
    } */

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('admin.users.edit', compact('roles', 'user'));  
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill($request->validated())->save();
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.edit', $user->id)
                         ->with('info', 'El usuario se modifico correctamente');
    }

    public function updatePassword(PasswordUpdateRequest $request, User $user)
    {
        $user->fill(['password' => bcrypt($request->input('password'))])->save();

        return redirect()->route('users.edit', $user->id)
                         ->with('info', 'La contraseña se modifico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                         ->with('info', 'El usuario se elimino correctamente');

    }
}
