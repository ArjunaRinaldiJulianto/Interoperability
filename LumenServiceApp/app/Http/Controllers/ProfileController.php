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
    // Tugas Pertemuan 3
    // 1.	Silahkan membuat 5 routing, 5 middleware dan 5 controller dengan kasus yang berbeda.
    public function profile()
    {
        return response()->json([
            'Name' => 'Arjuna Rinaldi Julianto',
            'NIM' => 'D112111019',
            'Class' => 'IF5B',
        ], 200);    
    }
}