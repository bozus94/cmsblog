<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles.index')->only('index');
        $this->middleware('permission:roles.show')->only('show');
        $this->middleware('permission:roles.create')->only(['create', 'store']);
        $this->middleware('permission:roles.edit')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(8);

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('id', 'ASC')->get();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RoleStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create($request->validated());
        $role->givePermissionTo($request->input('permissions'));

        return redirect()->route('roles.edit', $role->id)
                         ->with('info', 'El role se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('id', 'ASC')->get();
        return view('admin.roles.edit', compact('permissions', 'role'));  
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RoleUpdateRequest  $request
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->fill($request->validated())->save();
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.edit', $role->id)
                         ->with('info', 'El role se modifico correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
                         ->with('info', 'El role se elimino correctamente');

    }
}
