<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_kasir', 'id_cabang', 'id_barang', 'jumlah', 'total_harga', 'tanggal'];



    public function user()
    {
        return $this->belongsTo(User::class, 'id_kasir', 'id_user');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'id_cabang', 'id_cabang');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang', 'id_barang');
    }
}
