<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    // Tugas Pertemuan 4
    // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
    // Post -> table_name = posts
    // custome table name:
    // protected $table = 'table_name';

    // define column name
    // protected $fillable = array('title','status','content','user_id');
    // protected $fillable = ['title','status','content','user_id'];

    // Tugas Pertemuan 5
    //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
    //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
    protected $fillable = ['author','views','title','status','content','user_id'];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
}