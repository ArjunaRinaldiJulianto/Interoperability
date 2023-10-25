<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model{
    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    protected $fillable = ["first_name", "last_name", "email", "phone", "address", "bank_account", "bank_account_number"];

    public $timestamps = true;
}