<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    // Tugas Pertemuan 6
    // 1. Pada function Create, tentukan response format (json/xml) berdasarkan Accept Header.
    // 2. Implementasi Accept Header pada function show, update, delete.
    // 3. Implementasi Content-Type Header pada function update.

    public function index(Request $request){
        $acceptHeader = $request->header('Accept');

        // $posts = Post::OrderBy("id", "DESC")->paginate(2)->toArray();
        // $response = [
        //     "total_count" => $posts["total"],
        //     "limit" => $posts["per_page"],
        //     "pagination" => [
        //         "next_page" => $posts["next_page_url"],
        //         "current_page" => $posts["current_page"]
        //     ],
        //     "data" => $posts["data"],
        // ];

        $posts = Post::OrderBy("id", "DESC")->paginate(2);
        $response = [
            "total_count" => $posts->total(),
            "limit" => $posts->perPage(),
            "pagination" => [
                "next_page" => $posts->nextPageUrl(),
                "current_page" => $posts->currentPage()
            ],
            "data" => $posts->items(),
        ];

        if($acceptHeader === 'application/json' || $acceptHeader === 'application/xml'){
            // $posts = Post::OrderBy("id", "DESC")->paginate(10); // Tugas Pertemuan 6

            if($acceptHeader === 'application/json'){
                return response()->json($response, 200); // Tugas Pertemuan 7
                // return response()->json($posts->items('data'), 200); // Tugas Pertemuan 6
            } else {
                $xml = new \SimpleXMLElement('<posts/>');

                // Tugas Pertemuan 7
                $responseElement = $xml->addChild('response');
                $responseElement->addChild('total_count', $response['total_count']);
                $responseElement->addChild('limit', $response['limit']);
                $paginationElement = $responseElement->addChild('pagination');
                $paginationElement->addChild('next_page', $response['pagination']['next_page']);
                $paginationElement->addChild('current_page', $response['pagination']['current_page']);

                // foreach($posts->items('data') as $item){ // Tugas Pertemuan 6
                foreach($posts->items() as $item){
                    $xmlItem = $xml->addChild('post');

                    $xmlItem->addChild('id', $item->id);
                    $xmlItem->addChild('author', $item->author);
                    $xmlItem->addChild('views', $item->views);
                    $xmlItem->addChild('title', $item->title);
                    $xmlItem->addChild('status', $item->status);
                    $xmlItem->addChild('content', $item->content);
                    $xmlItem->addChild('created_at', $item->created_at);
                    $xmlItem->addChild('updated_at', $item->updated_at);
                }

                return response($xml->asXML(), 200);
                // return $xml->asXML(); // Tugas Pertemuan 6
            }
            
        } else {
            return response('Not Acceptable!', 406);
        }
    }
    public function store(Request $request){
        $acceptHeader = $request->header('Accept');

        if($acceptHeader === 'application/json' || $acceptHeader === 'application/xml'){
            $contentTypeHeader = $request->header('Content-Type');

            if($contentTypeHeader === 'application/json'){
                $input = $request->all();

                // Tugas Pertemuan 7
                $validator = Validator::make($input, [
                    'author' => 'required|min:5',
                    'views' => 'required|numeric',
                    'title' => 'required|min:5',
                    'status' => 'required|in:draft,published',
                    'content' => 'required|min:5',
                    'user_id' => 'required|numeric'
                ]);

                if($validator->fails()){
                    return response()->json($validator->errors(), 400);
                }
                
                $post = Post::create($input); // Tugas Pertemuan 6

                return response()->json($post,200);
            } else if ($contentTypeHeader === 'application/xml'){
                $xml = new \SimpleXMLElement($request->getContent());

                $post = Post::create([
                    'author' => $xml->author,
                    'views' => $xml->views,
                    'title' => $xml->title,
                    'status' => $xml->status,
                    'content' => $xml->content,
                    'user_id' => $xml->user_id
                ]);

                return response($post, 200);
            } else {
                return response('Unsupported Media Type', 415);
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }
    public function show(Request $request, $id){
        $acceptHeader = $request->header('Accept');

        if($acceptHeader === 'application/json' || $acceptHeader === 'application/xml'){
            $post = Post::find($id);

            if(!$post){
                abort(404);
            }

            if($acceptHeader === 'application/json'){
                return response()->json($post,200);
            } else {
                $xml = new \SimpleXMLElement('<posts/>');

                $xmlItem = $xml->addChild('post');

                $xmlItem->addChild('id', $post->id);
                $xmlItem->addChild('author', $post->author);
                $xmlItem->addChild('views', $post->views);
                $xmlItem->addChild('title', $post->title);
                $xmlItem->addChild('status', $post->status);
                $xmlItem->addChild('content', $post->content);
                $xmlItem->addChild('created_at', $post->created_at);
                $xmlItem->addChild('updated_at', $post->updated_at);

                return $xml->asXML();
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }
    public function update(Request $request, $id){
        $acceptHeader = $request->header('Accept');

        if($acceptHeader === 'application/json' || $acceptHeader === 'application/xml'){
            $contentTypeHeader = $request->header('Content-Type');

            if($contentTypeHeader === 'application/json'){
                $input = $request->all();
                $post = Post::find($id);

                if(!$post){
                    abort(404);
                }

                // Tugas Pertemuan 7
                $validator = Validator::make($input, [
                    'author' => 'required|min:5',
                    'views' => 'required|numeric',
                    'title' => 'required|min:5',
                    'status' => 'required|in:draft,published',
                    'content' => 'required|min:5',
                    'user_id' => 'required|numeric'
                ]);

                if($validator->fails()){
                    return response()->json($validator->errors(), 400);
                }

                $post->fill($input); // Tugas Pertemuan 6
                $post->save();

                return response()->json($post,200);
            } else if ($contentTypeHeader === 'application/xml'){
                $xml = new \SimpleXMLElement($request->getContent());

                $post = Post::find($id);

                if(!$post){
                    abort(404);
                }

                $post->fill([
                    'author' => $xml->author,
                    'views' => $xml->views,
                    'title' => $xml->title,
                    'status' => $xml->status,
                    'content' => $xml->content,
                    'user_id' => $xml->user_id
                ]);
                $post->save();

                return response($post, 200);
            } else {
                return response('Unsupported Media Type', 415);
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }
    public function destroy(Request $request, $id){
        $acceptHeader = $request->header('Accept');

        if($acceptHeader === 'application/json' || $acceptHeader === 'application/xml'){
            $post = Post::find($id);

            if(!$post){
                abort(404);
            }

            $post->delete();
            $message = ['message' => 'deleted successfully', 'post_id' => $id];

            if($acceptHeader === 'application/json'){
                return response()->json($message,200);
            } else {
                $xml = new \SimpleXMLElement('<messages/>');

                $xmlItem = $xml->addChild('message', $message['message']);
                $xmlItem->addAttribute('post_id', $message['post_id']);

                return $xml->asXML();
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }
    
    // public function index()
    // {
    //     // Tugas Pertemuan 4
    //     // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
    //     $posts = Post::OrderBy("id", "DESC")->paginate(10);

    //     $output = [
    //         "message" => "posts",
    //         "results" => $posts
    //     ];
        
    //     return response()->json($posts, 200);
    // }
    
    // // Tugas Pertemuan 5
    // //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    // //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    // public function store(Request $request){
    //     $input = $request->all();
    //     $post = Post::create($input);

    //     return response()->json($post,200);
    // }
    // public function show($id){
    //     $post = Post::find($id);

    //     if(!$post){
    //         abort(404);
    //     }

    //     return response()->json($post,200);
    // }
    // public function update(Request $request, $id){
    //     $input = $request->all();
    //     $post = Post::find($id);

    //     if(!$post){
    //         abort(404);
    //     }

    //     $post->fill($input);
    //     $post->save();

    //     return response()->json($post,200);
    // }
    // public function destroy($id){
    //     $post = Post::find($id);

    //     if(!$post){
    //         abort(404);
    //     }

    //     $post->delete();
    //     $message = ['message' => 'deleted successfully', 'post_id' => $id];

    //     return response()->json($message,200);
    // }
}