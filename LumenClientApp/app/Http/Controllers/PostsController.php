<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXMLElement;

class PostsController extends Controller
{
    public function getRequestsJson(Request $request)
    {
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/json'];

        $ch = curl_init();

        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ];

        curl_setopt_array($ch, $curlOptions);

        $result = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($result, true);

        return view('posts/getRequestJson', ['results' => $response]);

    }
    public function getRequestsJsonById(Request $request, $id)
    {
        $url = 'http://localhost:8000/public/posts/' . $id;
        $headers = ['Accept: application/json'];

        $ch = curl_init();

        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ];

        curl_setopt_array($ch, $curlOptions);

        $result = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($result, true);

        return view('posts/getRequestJsonById', ['results' => $response]);

    }
    public function getRequestsXml(Request $request)
    {
        $url = 'http://localhost:8000/public/posts';
        $headers = ['Accept: application/xml'];

        $ch = curl_init();

        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ];

        curl_setopt_array($ch, $curlOptions);

        $result = curl_exec($ch);

        curl_close($ch);

        $parsedXml = new \SimpleXMLElement($result);

        $response = [];

        foreach ($parsedXml->data->post as $post) {
            $response[] = [
                'id' => (int) $post->id,
                'title' => (string) $post->title,
                'content' => (string) $post->content,
                'created_at' => (string) $post->created_at,
                'updated_at' => (string) $post->updated_at,
            ];
        }

        return view('posts/getRequestXml', ['results' => $response]);

    }
    public function getRequestsXmlById(Request $request, $id){
        $url = 'http://localhost:8000/public/posts/' . $id;
        $headers = ['Accept: application/xml'];

        $ch = curl_init();

        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ];

        curl_setopt_array($ch, $curlOptions);

        $result = curl_exec($ch);

        curl_close($ch);

        $parsedXml = new \SimpleXMLElement($result);

        $response = [
            'id' => (int) $parsedXml->id,
            'user_id' => (int) $parsedXml->user_id,
            'status' => (string) $parsedXml->status,
            'title' => (string) $parsedXml->title,
            'content' => (string) $parsedXml->content,
            'created_at' => (string) $parsedXml->created_at,
            'updated_at' => (string) $parsedXml->updated_at,
        ];

        return view('posts/getRequestXmlById', ['results' => $response]);
    }
    // public function getRequestsJson(Request $request)
    // {
    //     $url = 'http://localhost:8000/public/posts';

    //     // Initiate curl
    //     $ch = curl_init();

    //     // Will return the response, if false it print the response
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     // Set the url
    //     curl_setopt($ch, CURLOPT_URL, $url);

    //     // Execute
    //     $result = curl_exec($ch);

    //     // Closing
    //     curl_close($ch);

    //     // Parse JSON response from request to be php object
    //     $response = json_decode($result, true);
    //     // dd($response);

    //     // Return response()->json($response, 200);
    //     return view('posts/getRequestJson', ['results' => $response]);
    // }
    // public function getRequestsJsonById(Request $request, $id)
    // {
    //     $url = 'http://localhost:8000/public/posts/' . $id;

    //     // Initiate curl
    //     $ch = curl_init();

    //     // Will return the response, if false it print the response
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     // Set the url
    //     curl_setopt($ch, CURLOPT_URL, $url);

    //     // Execute
    //     $result = curl_exec($ch);

    //     // Closing
    //     curl_close($ch);

    //     // Parse JSON response from request to be php object
    //     $response = json_decode($result, true);
    //     // dd($response);

    //     // Return response()->json($response, 200);
    //     return view('posts/getRequestJsonById', ['results' => $response]);
    // }
}