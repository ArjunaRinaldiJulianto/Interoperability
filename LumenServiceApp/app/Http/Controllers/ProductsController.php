<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    public function store(Request $request){
        $input = $request->all();
        $product = Product::create($input);

        return response()->json($product,200);
    }
    public function show($id){
        $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        return response()->json($product,200);
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        $product->fill($input);
        $product->save();

        return response()->json($product,200);
    }
    public function destroy($id){
        $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        $product->delete();

        $message = ['message' => 'deleted successfully', 'product_id' => $id];

        return response()->json($message,200);
    }
}