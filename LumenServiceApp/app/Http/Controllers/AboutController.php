<?php
namespace App\Http\Controllers;
class AboutController extends Controller
{
    /**
    * Create a new controller instance.
    * @return void
    */
    public function __construct()
    {
        //
    }
    public function about()
    {
        return response()->json([
            'message' => 'This is the about page of this web.',
            'version' => '1.0.0',
            'author' => 'Arjuna Rinaldi Julianto',
            'email' => 'yourname@example.com'
        ], 200);    
    }
}