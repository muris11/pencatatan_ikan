<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKapalsTable extends Migration
{
    public function up()
    {
    Schema::create('kapal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('no_kapal');
            $table->datetime('tanggal');
            $table->string('nama_kapal');
            $table->string('pemilik');
            $table->string('kapasitas');
            $table->string('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kapal');
    }
}

