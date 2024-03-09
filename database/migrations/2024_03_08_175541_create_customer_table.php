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
    if (!Schema::hasTable('customer')) {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id_customer');
            $table->string('nama_customer');
            $table->string('alamat');
            $table->integer('no_telp');
            $table->unsignedBigInteger('id_paket');
            $table->enum("role", ["admin", "sales"]);
            $table->timestamps();

        });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
