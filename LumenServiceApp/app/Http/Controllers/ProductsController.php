<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        // Tugas Pertemuan 4
        // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
        $products = Product::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "products",
            "results" => $products
        ];
        
        return response()->json($products, 200);
    }
}