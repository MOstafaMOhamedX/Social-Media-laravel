<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(Post $post)
    {   
        return view('blog-post' , [
            'post'=>$post,
            'comments'=>Comment::where('post_id',$post->id)->where('approval',1)->orderBy('id', 'asc')->get(),
            ]);
    }
    public function create ()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {   
        $validator = \Validator::make($request->all(),[ 
            'title' => 'required|max:100|min:3', 
            'body' => 'required', 
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 
        if($validator->fails()) { 
            return redirect(route('post.create'))->withErrors($validator)->withInput(); 
        }
        if ($request->hasFile('image')){
            $image = $request->file('image'); 
            $name = time().\Str::random(30).\Str::random(15).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('/images'); 
            $image->move($destinationPath, $name); $imagePath='images/'.$name; 
        }
            $_title=$request->title;
            $_body=$request->body;    

            $Post=new Post();
            $Post->title=$_title;
            $Post->body=$_body;
            $Post->user_id=Auth::user()->id;
            $Post->post_image=$imagePath;//
            $Post->save();
            $request->session()->flash('message', 'Post was Created');
            // return redirect(route('home'));
            return back();
    }
    public function list()
    {
        // $posts = Auth::user()->posts()->paginate(5);
        $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }
    public function destroy(Post $post ,Request $request)
    {
        // $this->authorize('delete', $post);
        $post->delete();
        $request->session()->flash('message', 'Post was Deleted');
        return redirect( route('posts.index'));
    }
    public function edit(Post $post)
    {
        // $this->authorize('view', $post);
        return view('admin.posts.edit', ['post'=>$post]);
    }
    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => 'required|max:100|min:3', 
            'body' => 'required', 
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(request('image')) { 
            $inputs['post_image'] = request('post_image')->store('images');
            $post->pot_image = 'images'.$inputs['image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
        $this->authorize('update', $post);
        auth()->user()->posts()->save($post);
        request()->session()->flash('message-updated', 'Post was Updated');
        return redirect(route('posts.index'));
    }
}
