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
    protected $fillable = ["name", "description", "price", "quantity"];
}