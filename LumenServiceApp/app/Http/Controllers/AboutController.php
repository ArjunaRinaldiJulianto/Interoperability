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
    // Tugas Pertemuan 3
    // 1.	Silahkan membuat 5 routing, 5 middleware dan 5 controller dengan kasus yang berbeda.
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