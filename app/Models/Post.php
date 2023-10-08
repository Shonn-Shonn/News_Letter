<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            return redirect('/posts');
        }

        $post = cache()->remember("posts.{$slug}",1200, function() use ($path){
           var_dump(file_get_contents($path));
        });

        return $post;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
