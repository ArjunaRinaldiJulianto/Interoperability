<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    // Tugas Pertemuan 4
    // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
    // Product -> table_name = products
    // custome table name:
    // protected $table = 'table_name';

    // define column name
    // protected $fillable = ["name", "description", "price", "quantity"];

    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    protected $fillable = ["name", "category", "slug", "description", "price", "stock"];

    public $timestamps = true;
}