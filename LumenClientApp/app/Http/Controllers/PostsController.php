<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getRequestsJson(Request $request)
    {
        $url = 'http://localhost:8000/public/posts';

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        // Return response()->json($response, 200);
        return view('posts/getRequestJson', ['results' => $response]);
    }
    public function getRequestsJsonById(Request $request, $id)
    {
        $url = 'http://localhost:8000/public/posts/' . $id;

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        // Return response()->json($response, 200);
        return view('posts/getRequestJsonById', ['results' => $response]);
    }
}