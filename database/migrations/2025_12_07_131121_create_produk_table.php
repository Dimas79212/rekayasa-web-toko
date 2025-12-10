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
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk', 50);
            $table->string('nama_kategori', 50);
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->foreign('nama_kategori')
                ->references('nama_kategori')
                ->on('kategori')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
