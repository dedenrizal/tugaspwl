<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStock extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_stok_gudang';
    protected $fillable = ['id_cabang', 'id_barang', 'stok'];

    // Relationships
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'id_cabang', 'id_cabang');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang', 'id_barang');
    }
}
