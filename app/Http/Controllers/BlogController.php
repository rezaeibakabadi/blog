<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{


    public function getIndex()
    {
        $posts = Post::paginate(5);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug)
    {

        $post = Post::where('slug', '=', $slug)->first();

        return view('blog.single')->withPost($post);

    }

}
