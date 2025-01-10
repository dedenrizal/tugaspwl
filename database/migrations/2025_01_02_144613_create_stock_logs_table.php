<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockLogsTable extends Migration
{
    public function up(): void
    {
        Schema::create('stock_logs', function (Blueprint $table) {
            $table->id('id_log_stok');
            $table->foreignId('id_cabang')->constrained('branches', 'id_cabang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_barang')->constrained('products', 'id_barang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_pegawai_gudang')->constrained('users', 'id_user')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_masuk');
            $table->integer('jumlah_keluar');
            $table->timestamp('tanggal');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('stock_logs');
    }
}
