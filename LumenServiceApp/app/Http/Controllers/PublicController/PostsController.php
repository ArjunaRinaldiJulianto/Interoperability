<?php

namespace App\Http\Controllers\PublicController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $acceptHeader = request()->header('Accept');

        $posts = Post::OrderBy("id", "ASC")->paginate(10)->toArray();
        $response = [
            "total_count" => $posts["total"],
            "limit" => $posts["per_page"],
            "pagination" => [
                "next_page" => $posts["next_page_url"],
                "current_page" => $posts["current_page"]
            ],
            "data" => $posts["data"],
        ];

        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml') {
            if($acceptHeader === 'application/json'){
                return response()->json($response, 200);
            }else{
                $xml = new \SimpleXMLElement('<posts/>');
                $xml->addChild('total_count', $posts['total']);
                $xml->addChild('limit', $posts['per_page']);
                $pagination = $xml->addChild('pagination');
                $pagination->addChild('next_page', $posts['next_page_url']);
                $pagination->addChild('current_page', $posts['current_page']);
                $data = $xml->addChild('data');
                foreach ($posts['data'] as $post) {
                    $postXml = $data->addChild('post');
                    $postXml->addChild('id', $post['id']);
                    $postXml->addChild('title', $post['title']);
                    $postXml->addChild('content', $post['content']);
                    $postXml->addChild('created_at', $post['created_at']);
                    $postXml->addChild('updated_at', $post['updated_at']);
                }
                return $xml->asXML();
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }
    public function show($id)
    {
        $acceptHeader = request()->header('Accept');

        $post = Post::with(['user' => function($query){
            $query->select('id','name');
        }])->find($id);

        if(!$post){
            abort(404);
        }

        if ($acceptHeader === 'application/json' || $acceptHeader === 'application/xml') {
            if($acceptHeader === 'application/json'){
                return response()->json($post,200);
            }else{
                $xml = new \SimpleXMLElement('<post/>');
                $xml->addChild('id', $post['id']);
                $xml->addChild('user_id', $post['user_id']);
                $xml->addChild('status', $post['status']);
                $xml->addChild('title', $post['title']);
                $xml->addChild('content', $post['content']);
                $xml->addChild('created_at', $post['created_at']);
                $xml->addChild('updated_at', $post['updated_at']);
                return $xml->asXML();
            }
        } else {
            return response('Not Acceptable!', 406);
        }
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $posts = Post::OrderBy("id", "ASC")->paginate(10)->toArray();
    //     $response = [
    //         "total_count" => $posts["total"],
    //         "limit" => $posts["per_page"],
    //         "pagination" => [
    //             "next_page" => $posts["next_page_url"],
    //             "current_page" => $posts["current_page"]
    //         ],
    //         "data" => $posts["data"],
    //     ];

    //     return response()->json($response, 200);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response 
    //  */
    // public function show($id)
    // {
    //     // $post = Post::find($id);
    //     $post = Post::with(['user' => function($query){
    //         $query->select('id','name');
    //     }])->find($id);

    //     if(!$post){
    //         abort(404);
    //     }
    //     return response()->json($post,200);
    // }
}