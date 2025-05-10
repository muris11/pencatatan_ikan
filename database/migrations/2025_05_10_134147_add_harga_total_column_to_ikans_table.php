<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('ikans', function (Blueprint $table) {
            // Hapus kolom lama jika sudah ada (opsional)
            if (Schema::hasColumn('ikans', 'harga_total')) {
                $table->dropColumn('harga_total');
            }

            // Tambahkan kolom generated
            $table->double('harga_total')->storedAs('jumlah * harga_per_kg');
        });
    }

    public function down(): void
    {
        Schema::table('ikans', function (Blueprint $table) {
            $table->dropColumn('harga_total');
        });
    }
};
