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
    public function index()
    {
        return '<h1>Selamat Datang</h1> <br> <h3>Ini Adalah Halaman Home</h3>';
    }
}