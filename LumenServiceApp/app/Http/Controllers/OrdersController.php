<?php

namespace App\Http\Controllers;

use App\Models\Order;

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
}