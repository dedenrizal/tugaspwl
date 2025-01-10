<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_log_stok';
    protected $fillable = ['id_cabang', 'id_barang', 'id_pegawai_gudang', 'stok_masuk', 'stok_keluar', 'tanggal'];


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'id_cabang', 'id_cabang');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang', 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pegawai_gudang', 'id_user');
    }
}
