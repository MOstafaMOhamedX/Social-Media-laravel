<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request)
    {  
        // dd(request()->all()); 
        $validator = \Validator::make($request->all(),[ 
            'comment' => 'required', 
        ]); 
        if($validator->fails()) { 
            return redirect(back())->withErrors($validator)->withInput(); 
        }
            $Comment=new Comment();
            $Comment->user_id=Auth::user()->id;
            $Comment->comment=$request->comment;
            $Comment->post_id=$request->post_id;
            $Comment->parent=$request->parent;
            $Comment->save();
            $request->session()->flash('message', 'Comment Added Successfully Waiting for Approval ');
            return back();
    }
    public function index()
    {
        return view('admin.comments.index',[
            'Comments'=>Comment::all(),
            ]);
    }
    public function approve()
    {
        $Comment = Comment::find(Request()->id);
        $Comment->approval=1;
        $Comment->save();
        session()->flash('message', 'Comment Approved '); 
        return back();
    }
    public function approveAll()
    {
        $Comments = Comment::all();
        foreach ($Comments as  $Comment) {
            $Comment->approval=1;
            $Comment->save();
        }
        session()->flash('message', 'All Comments Approved '); 
        return back();
    }
}
