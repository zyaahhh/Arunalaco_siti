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
       Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->default('nophoto.jpg');
            $table->string('nama_barang', 100);
            $table->integer('harga');
            $table->integer('stok');
            $table->string('satuan', 50);
            $table->string('warna', 50); // <-- ini penting! harus string
            $table->timestamps();
});
    }
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
