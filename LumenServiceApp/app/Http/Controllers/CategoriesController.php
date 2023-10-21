<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        // Tugas Pertemuan 4
        // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
        $categories = Category::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "categories",
            "results" => $categories
        ];
        
        return response()->json($categories, 200);
    }
}