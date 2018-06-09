<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission as Permission;
use Spatie\Permission\Models\Role as Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get(); //Get all roles
        return view('admin.permissions.create',compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();
        if ($request->roles <> '') {
            foreach ($request->roles as $key=>$value) {
                $role = Role::find($value);
                $role->permissions()->attach($permission);
            }
        }
        return redirect()->route('admin.permissions.index')->with('success','Permission added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permissions\ModelName as Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
//
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permissions\ModelName as Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permissions\ModelName as Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name'=>'required',
        ]);
        $permission->name=$request->name;
        $permission->save();
        return redirect()->route('admin.permissions.index')
            ->with('success',
                'Permission'. $permission->name.' updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permissions\ModelName as Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')
            ->with('success',
                'Permission deleted successfully!');
    }
}