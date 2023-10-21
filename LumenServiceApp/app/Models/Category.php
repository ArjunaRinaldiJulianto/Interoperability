<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    // Tugas Pertemuan 4
    // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
    // Category -> table_name = categories
    // custome table name:
    // protected $table = 'table_name';

    // define column name
    protected $fillable = ["name","slug"];
}