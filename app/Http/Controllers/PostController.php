<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = auth()->user()->following()->pluck('owner_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(20);

        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post'=>$post,
            'user'=>$post->user(),
        ]);
    }

    public function store() {

        $data = request()->validate([
            'caption'=>'required',
            'image'=>'required|image',
        ]);

        $imagePath = request('image')->store('postImages','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }
}
