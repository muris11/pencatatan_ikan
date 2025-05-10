<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kapal', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // jika sebelumnya memakai foreign key
            $table->dropColumn('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('kapal', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};
