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
        Schema::create('ikans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('kategori_id');
            $table->decimal('harga_per_kg', 10, 2)->nullable();
            $table->integer('jumlah')->default(0);
            $table->decimal('harga_total', 15, 2)->virtualAs('jumlah * harga_per_kg');
            $table->timestamps();
        
            $table->foreign('kategori_id')->references('id')->on('categories');
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('ikans');
    }
};
