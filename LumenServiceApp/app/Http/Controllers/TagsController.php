<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function index()
    {
        // Tugas Pertemuan 4
        // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
        $tags = Tag::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "tags",
            "results" => $tags
        ];
        
        return response()->json($tags, 200);
    }
}