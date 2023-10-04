<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function getIndex($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            return redirect('/posts');
        }

        $post = file_get_contents($path);

        return view('post', [
            'post' => $post,
        ]);
    }

    public function showBarChart()
    {
        $aug = Post::whereMonth('created_at', '8')->count();
        $sep = Post::whereMonth('created_at', '9')->count();
        $oct = Post::whereMonth('created_at', '10')->count();

        return view('post-show-barchart',compact('aug','sep','oct'));
    }
}
