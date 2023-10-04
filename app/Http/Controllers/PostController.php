<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
}
