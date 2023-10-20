<?php
namespace App\Http\Controllers;
class ProdukController extends Controller
{
    /**
    * Create a new controller instance.
    * @return void
    */
    public function __construct()
    {
        //
    }
    public function getProduk()
    {
        $produk = [
            ['id' => 1, 'name' => 'Mie Baso', 'price' => 15000],
            ['id' => 2, 'name' => 'Mie Ayam', 'price' => 10000],
            ['id' => 3, 'name' => 'Mie Ayam Baso Kecil', 'price' => 15000],
            ['id' => 4, 'name' => 'Mie Ayam Baso Besar', 'price' => 20000],
            ['id' => 5, 'name' => 'Es Teh Manis', 'price' => 5000],
        ];        
        return response()->json($produk);
    }
}