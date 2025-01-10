<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseStocksTable extends Migration
{
    public function up(): void
    {
        Schema::create('warehouse_stocks', function (Blueprint $table) {
            $table->id('id_stok_gudang');
            $table->foreignId('id_cabang')->constrained('branches', 'id_cabang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_barang')->constrained('products', 'id_barang')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('warehouse_stocks');
    }
}
