<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use \Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:user|administrator');
    // }
    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all()
            ]);
    }
    public function update(User $user , Request $request)
    {
        $inputs = request()->validate([
            'image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'name'       => 'required|max:100|min:3', 
            'email'      => 'required|max:100|min:3',  
            'password2'  => 'same:password1', 
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image'); 
            $name = time().\Str::random(30).\Str::random(15).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/images'); 
            $image->move($destinationPath, $name);  
             if(isset($user->image) && $user->image != 'avatar.png')
                 unlink('images/'.$user->image);
             $user->image=$name;
        }

        $user->name         =   $request->name;
        $user->email        =   $request->email;
        $user->First_name   =   $request->First_name;
        $user->Last_name    =   $request->Last_name;
        $user->Address      =   $request->Address;
        $user->City         =   $request->City;
        $user->Country      =   $request->Country;
        $user->Postal_code  =   $request->Postal_code;
        $user->About_Me     =   $request->About_Me;
        if(!empty($request['password1'])){
            $user->password     =   Hash::make($request['password1']);
        }
        $user->save();
        request()->session()->flash('message-updated', 'User was Updated');        
        return back();
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index' , ['users'=>$users]);
    }
    public function destroy(User $user,Request $request)
    {
        $user->delete();
        $request->session()->flash('message', 'User was Deleted');
        return back();
    }
    public function create(User $user)
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $inputs = request()->validate([
            'image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'name'       => 'required|max:100|min:3', 
            'email'      => 'required|max:100|min:3',  
            'password1'  => 'required|max:100|min:6', 
            'password2'  => 'required|max:100|min:3|same:password1', 
        ]);
        $user = new User();
        if ($request->hasFile('image')) {
            $image = $request->file('image'); 
            $name = time().\Str::random(30).\Str::random(15).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/images'); 
            $image->move($destinationPath, $name);  
            $user->image=$name;
        }

        $user->name         =   $request->name;
        $user->email        =   $request->email;
        $user->First_name   =   $request->First_name;
        $user->Last_name    =   $request->Last_name;
        $user->Address      =   $request->Address;
        $user->City         =   $request->City;
        $user->Country      =   $request->Country;
        $user->Postal_code  =   $request->Postal_code;
        $user->About_Me     =   $request->About_Me;
        if(!empty($request['password1'])){
            $user->password     =   Hash::make($request['password1']);
        }
        $user->save();
        request()->session()->flash('message-updated', 'User Added Successfully');        
        return back();
    }
    public function logout()
    {
        Auth::logout();
    }
    public function attach(User $user)
    {
        $user->roles()->attach(Request('role'));
        return back();
    }
    public function detatch(User $user)
    {
        $user->roles()->detach(Request('role'));
        return back();
    }
    public function profile(User $user)
    {
        return view('user.profile', [
            'user'=>$user,
            'roles'=>Role::all()
            ]);
    }
    public function editProfile(User $user , Request $request)
    {
        $inputs = request()->validate([
            'image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'name'       => 'required|max:100|min:3', 
            'email'      => 'required|max:100|min:3',  
            'password2'  => 'same:password1', 
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image'); 
            $name = time().\Str::random(30).\Str::random(15).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/images'); 
            $image->move($destinationPath, $name);  
             if(isset($user->image) && $user->image != 'avatar.png')
                 unlink('images/'.$user->image);
             $user->image=$name;
        }

        $user->name         =   $request->name;
        $user->email        =   $request->email;
        $user->First_name   =   $request->First_name;
        $user->Last_name    =   $request->Last_name;
        $user->Address      =   $request->Address;
        $user->City         =   $request->City;
        $user->Country      =   $request->Country;
        $user->Postal_code  =   $request->Postal_code;
        $user->About_Me     =   $request->About_Me;
        if(!empty($request['password1'])){
            $user->password     =   Hash::make($request['password1']);
        }
        $user->save();
        request()->session()->flash('message-updated', 'User was Updated');        
        return back();
    }
}
