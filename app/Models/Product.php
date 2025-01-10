<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama_barang', 'kategori', 'harga', 'stok'];

    // Relationships
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_barang', 'id_barang');
    }

    public function warehouseStocks()
    {
        return $this->hasMany(WarehouseStock::class, 'id_barang', 'id_barang');
    }

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class, 'id_barang', 'id_barang');
    }
}
