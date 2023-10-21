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
        Schema::create('orders', function (Blueprint $table) {
            // Tugas Pertemuan 4
            // Silahkan membuat 5 migration untuk membuat 5 table kemudian implementasikan dengan lumen.
            $table->id();
            $table->integer('user_id');
            $table->string('order_number');
            $table->decimal('total_amount', 8, 2);
            $table->boolean('is_paid');
            $table->text('shipping_address');
            $table->string('payment_method');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
