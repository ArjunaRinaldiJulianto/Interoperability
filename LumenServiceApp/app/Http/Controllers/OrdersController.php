<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        // Tugas Pertemuan 4
        // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
        $orders = Order::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "orders",
            "results" => $orders
        ];
        
        return response()->json($orders, 200);
    }

    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    public function store(Request $request){
        $input = $request->all();
        $order = Order::create($input);

        return response()->json($order,200);
    }
    public function show($id){
        $order = Order::find($id);

        if(!$order){
            abort(404);
        }

        return response()->json($order,200);
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $order = Order::find($id);

        if(!$order){
            abort(404);
        }

        $order->fill($input);
        $order->save();

        return response()->json($order,200);
    }
    public function destroy($id){
        $order = Order::find($id);

        if(!$order){
            abort(404);
        }

        $order->delete();

        $output = [
            "message" => "order deleted successfully",
            "order_id" => $id
        ];

        return response()->json($output,200);
    }
}