<?php
namespace App\Http\Controllers;
class HomeController extends Controller
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
    public function index()
    {
        return '<h1>Selamat Datang</h1> <br> <h3>Ini Adalah Halaman Home</h3>';
    }
}