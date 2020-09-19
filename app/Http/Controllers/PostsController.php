<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        //return view('posts.index', compact('posts'));
        return redirect('/profile/' . auth()->user()->id.'/ShowMyData');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');
       

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        //dd($image);
       

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        
        

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));
    }
    
    public function edit(\App\Post $post, \App\User $user)
    {
       
        return view('posts.edit', compact('user'),compact('post'));
    }
    
        public function update(\App\Post $post,\App\User $user)
    {
      
            if(auth()->user()->id==$post->user_id){

        $data = request()->validate([
            'caption' => 'required',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        
        
        $post->update(array_merge(
            $data,
            $imageArray ?? []
        ));
            }
        return redirect("/profile/{$user->id}");
    }
    
}
