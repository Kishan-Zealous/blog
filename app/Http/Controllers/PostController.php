<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PostController extends Controller
{
    public function index(){

        $posts = Post::latest();
        
        return view('index',[
            'posts'=>$posts->filter(request(['search','category','author','post']))->paginate(3)->withQueryString(),
        ]);
    }



    public function showOnePost(Post $post){
        return view('posts/post',[
            'post' => $post,
        ]);
    }


    // function showPostByCategory(Category $category){
    //     return view('posts/index',[
    //         'posts' => $category->posts,
    //         'currentCategory'=>$category,
    //         'categories'=>Category::all(),
    //         'authors'=>User::all()
    //     ]);
    // }

    // function showPostByAuthor(User $author){
    //     return view('/posts/index',[
    //         'posts'=> $author->posts,
    //         'categories'=>Category::all(),
    //         'currentAuthor'=>$author,
    //         'authors'=>User::all()
    //     ]);
    // }
}
