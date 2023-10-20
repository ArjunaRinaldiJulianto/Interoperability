<?php
namespace App\Http\Controllers;
class ProfileController extends Controller
{
    /**
    * Create a new controller instance.
    * @return void
    */
    public function __construct()
    {
        //
    }
    public function profile()
    {
        return response()->json([
            'Name' => 'Arjuna Rinaldi Julianto',
            'NIM' => 'D112111019',
            'Class' => 'IF5B',
        ], 200);    
    }
}