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
        Schema::create('posts', function (Blueprint $table) {
            //$table->id();
            // Tugas Pertemuan 4
            // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
            // $table->bigIncrements('id');

            // $table->string('title', 100);
            // $table->enum('status', array('draft','published'))->default('draft');
            // $table->text('content', 65535);
            // $table->integer('user_id')->index('user_id_foreign');

            // $table->timestamps();

            
            // Tugas Pertemuan 5
            //1.	Silahkan membuat 5 CRUD dengan mengimplementasikan Restful Design API dengan lumen.
            //2.	Satu CRUD, minimal menggunakan 7 fields + field created_at dan updated_at.
            $table->bigIncrements('id');

            $table->string('author', 100);
            $table->integer('views')->default(0);
            $table->string('title', 100);
            $table->enum('status', array('draft','published'))->default('draft');
            $table->text('content');
            $table->integer('user_id')->index('user_id_foreign');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
