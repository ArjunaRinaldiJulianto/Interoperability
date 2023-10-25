<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            // Tugas Pertemuan 4
            // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
            // $table->id();
            // $table->string('name');
            // $table->text('description');
            // $table->integer('price');
            // $table->integer('quantity');
            // $table->timestamps();


            // Tugas Pertemuan 5
            //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
            //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('category');
            $table->string('slug');
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
