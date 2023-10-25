<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
    
    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    public function store(Request $request){
        $input = $request->all();
        $post = Post::create($input);

        return response()->json($post,200);
    }
    public function show($id){
        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        return response()->json($post,200);
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        $post->fill($input);
        $post->save();

        return response()->json($post,200);
    }
    public function destroy($id){
        $post = Post::find($id);

        if(!$post){
            abort(404);
        }

        $post->delete();
        $message = ['message' => 'deleted successfully', 'post_id' => $id];

        return response()->json($message,200);
    }
}