<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function show()
    {
        return view('admin.dashboard', [
            'posts' => Post::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.addNewPost');
    }

    public function store()
    {


        $attributes = request()->validate([
            'title' => ['required','unique:posts,title'],
            'slug' => ['required','unique:posts,slug'],
            'body' => ['required'],
            'excerpt' => ['required','unique:posts,excerpt'],
            'category_id' => ['required']
        ]);

        Post::create(array_merge(
            $attributes,
            [
                'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
                'user_id'=>request()->user()->id
            ]
        ));


        return redirect('/dashboard');
    }


    public function edit(Post $post)
    {

        return view('admin.editPost',[
            'post'=>$post
        ]);
    }


    public function update(Post $post)
    {


        $attributes = request()->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
            'excerpt' => ['required'],
            'category_id' => ['required']
        ]);


        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);


        return redirect('/dashboard');
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/dashboard');
        
    }
}
