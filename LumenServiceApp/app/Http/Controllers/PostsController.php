<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        // Tugas Pertemuan 4
        // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
        $posts = Post::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "posts",
            "results" => $posts
        ];
        
        return response()->json($posts, 200);
    }
}