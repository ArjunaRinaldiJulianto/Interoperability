<?php
namespace App\Http\Controllers;
class UserController extends Controller
{
    /**
    * Create a new controller instance.
    * @return void
    */
    public function __construct()
    {
        // return "Lumen Controller";
    }
    // Latihan Pertemuan 3
    public function index()
    {
        return "Anda mendapatkan response ini dari <b>Controller</b>";
    }
}