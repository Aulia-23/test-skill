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
    if (!Schema::hasTable('paket')) {
        Schema::create('paket', function (Blueprint $table) {
            $table->bigIncrements('id_paket');
            $table->string('nama_paket');
            $table->integer('harga_paket');
            $table->text('deskripsi');
            $table->timestamps();


        });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket');
    }
};
