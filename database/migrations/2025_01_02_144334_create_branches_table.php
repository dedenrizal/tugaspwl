<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id('id_cabang');
            $table->string('nama_cabang');
            $table->string('kota');
            $table->string('alamat');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
}
