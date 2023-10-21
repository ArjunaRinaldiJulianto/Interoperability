<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    // Tugas Pertemuan 4
    // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
    // Order -> table_name = orders
    // custome table name:
    // protected $table = 'table_name';

    // define column name
    protected $fillable = [
        'user_id', 'order_number', 'total_amount', 'is_paid', 'shipping_address', 'payment_method'
    ];
}