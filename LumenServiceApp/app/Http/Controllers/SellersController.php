<?php

namespace App\Http\Controllers;

use App\Models\Seller;

use Illuminate\Http\Request;

class SellersController extends Controller
{
    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    public function index()
    {
        $sellers = Seller::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "sellers",
            "results" => $sellers
        ];
        
        return response()->json($sellers, 200);
    }

    public function store(Request $request){
        $input = $request->all();
        $seller = Seller::create($input);

        return response()->json($seller,200);
    }
    public function show($id){
        $seller = Seller::find($id);

        if(!$seller){
            abort(404);
        }

        return response()->json($seller,200);
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $seller = Seller::find($id);

        if(!$seller){
            abort(404);
        }

        $seller->fill($input);
        $seller->save();

        return response()->json($seller,200);
    }
    public function destroy($id){
        $seller = Seller::find($id);

        if(!$seller){
            abort(404);
        }

        $seller->delete();
        $message = ["message" => "deleted successfully", "seller_id" => $id];

        return response()->json($message,200);
    }
}