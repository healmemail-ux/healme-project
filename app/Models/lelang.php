<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lelang extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'barang_id',
        'tgl_lelang',
        'harga_akhir',
        'user_id',
        'harga_akhir',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
    public function petugas()
    {
        return $this->hasMany(masyarakat::class);
    }
  
}