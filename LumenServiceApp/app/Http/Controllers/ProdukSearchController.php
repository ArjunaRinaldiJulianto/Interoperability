<?php
namespace App\Http\Controllers;
class ProdukSearchController extends Controller
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
    public function getProdukById($produkId)
    {
        $produk = $this->findProdukById($produkId);

        if ($produk) {
            return response()->json($produk);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    }
    private function findProdukById($produkId)
    {
        $produks = [
            ['id' => 1, 'name' => 'Mie Baso', 'price' => 15000],
            ['id' => 2, 'name' => 'Mie Ayam', 'price' => 10000],
            ['id' => 3, 'name' => 'Mie Ayam Baso Kecil', 'price' => 15000],
            ['id' => 4, 'name' => 'Mie Ayam Baso Besar', 'price' => 20000],
            ['id' => 5, 'name' => 'Es Teh Manis', 'price' => 5000],
        ];

        foreach ($produks as $produk) {
            if ($produk['id'] == $produkId) {
                return $produk;
            }
        }
        
        return null;
    }
}