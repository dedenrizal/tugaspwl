<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_user';
    protected $fillable = ['nama', 'email', 'password', 'role'];

    // Relationships
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_kasir', 'id_user');
    }

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class, 'id_pegawai_gudang', 'id_user');
    }
}
