<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_cabang')->constrained('branches', 'id_cabang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_kasir')->constrained('users', 'id_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_barang')->constrained('products', 'id_barang')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah');
            $table->decimal('total_harga', 10, 2);
            $table->timestamp('tanggal');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
}
