<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index',
        ['posts'  =>Post::with(['User'])->latest()->paginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(Auth::check()){
          return view("posts.create");  
        }else{
            abort(401);
        }
         

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' =>["required",'min:3'],
            'subtitle' =>['required'],
            'body' =>['required'],
            'image'=>['required','mimes:jpg,png,gif,jpag']
        ]);

        $image=request('image')->store('posts','public');
        Post::create([
            'title'=>request('title'),
            'subtitle'=>request('subtitle'),
            'body'=>request('body'),
            'user_id'=>Auth::user()->id,
            'likes_num'=>0,
            'image' =>$image
            
        ]);

        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view("posts.show",['post' =>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
     
        return view("posts.edit",['post' =>$post]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $arrributes=request()->validate([
            'title' =>["required",'min:3'],
            'subtitle' =>['required'],
            'body' =>['required']
        ]);

        $post->update($arrributes);
        $post->save();
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect("/");
    }
}
