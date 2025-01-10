<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->decimal('harga', 10, 2);
            $table->unsignedInteger('stok');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
