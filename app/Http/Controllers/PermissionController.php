<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    { 
        $Permissions  = Permission::all();
        return view('admin.permissions.index',['Permissions'=>$Permissions ]);
    }
    public function store()
    {
        request()->validate(array(
            'name' => 'required',
        ));
        Permission::create([
            'name'=>ucfirst(Request('name')),
            'slug'=>Str::lower(Request('name')),
        ]);
        request()->session()->flash('message', 'Permission Added Successfully');     
        return back();
    }
    public function destroy(Permission $Permission)
    {
        $Permission->delete();
        request()->session()->flash('message-delete', 'Permission Deleted');    
        return redirect(route('Permissions.index'));

        
    }
    public function edit (Permission $Permission)
    {
        return view('admin.Permissions.Edit',[
            'Permission'=>$Permission,
            'roles'=>Role::all(),
            ]);
    }
    public function update(Permission $Permission)
    {
        $Permission->name = Str::ucfirst(request('name'));
        $Permission->slug = Str::of(request('name'));
        if ($Permission->isdirty('name')) {
            $Permission->save();
            session()->flash('message', 'Permission Updated Successfully'); 
        }else{
            session()->flash('message', 'Nothing has been updated'); 
        }
        return back();
    }
    public function PermissionAttach(Permission $Permission)
    {
        $Permission->permissions()->attach(request('permission'));
        return back();
    }
    public function PermissionDetatch(Permission $Permission)
    {
        $Permission->permissions()->detach(request('permission'));
        return back();
    }
}
