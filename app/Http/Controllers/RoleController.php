<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        
        $roles= Role::all();
        return view('admin.roles.index',['roles'=>$roles]);
    }
    public function store()
    {
        request()->validate(array(
            'name' => 'required',
        ));
        Role::create([
            'name'=>ucfirst(Request('name')),
            'slug'=>Str::lower(Request('name')),
        ]);
        request()->session()->flash('message', 'Role Added Successfully');     
        return back();
    }
    public function destroy(Role $role)
    {
        $role->delete();
        request()->session()->flash('message-delete', 'Role Deleted');    
        return redirect(route('roles.index'));

        
    }
    public function edit (Role $role)
    {
        return view('admin.roles.Edit',[
            'role'=>$role,
            'permissions'=>Permission::all(),
            ]);
    }
    public function update(Role $role)
    {
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'));
        if ($role->isdirty('name')) {
            $role->save();
            session()->flash('message', 'Role Updated Successfully'); 
        }else{
            session()->flash('message', 'Nothing has been updated'); 
        }
        return back();
    }
    public function PermissionAttach(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }
    public function PermissionDetatch(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
