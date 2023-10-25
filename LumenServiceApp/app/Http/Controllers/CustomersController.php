<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    public function index()
    {
        $customers = Customer::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "customers",
            "results" => $customers
        ];
        
        return response()->json($customers, 200);
    }
    public function store(Request $request){
        $input = $request->all();
        $customer = Customer::create($input);

        return response()->json($customer,200);
    }
    public function show($id){
        $customer = Customer::find($id);

        if(!$customer){
            abort(404);
        }

        return response()->json($customer,200);
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $customer = Customer::find($id);

        if(!$customer){
            abort(404);
        }

        $customer->fill($input);
        $customer->save();

        return response()->json($customer,200);
    }
    public function destroy($id){
        $customer = Customer::find($id);

        if(!$customer){
            abort(404);
        }

        $customer->delete();

        $message = ["message" => "deleted successfully", "customer_id" => $id];

        return response()->json($message,200);
    }
}