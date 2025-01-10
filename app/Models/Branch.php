<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cabang';
    protected $fillable = ['nama_cabang', 'kota', 'alamat'];


    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_cabang', 'id_cabang');
    }

    public function warehouseStocks()
    {
        return $this->hasMany(WarehouseStock::class, 'id_cabang', 'id_cabang');
    }

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class, 'id_cabang', 'id_cabang');
    }
}
