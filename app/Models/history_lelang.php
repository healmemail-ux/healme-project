<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_lelang extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'lelang_id',
        'barang_id',
        'user_id',
        'penawaran_harga'
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
    public function lelang()
    {
        return $this->belongsTo(lelang::class);
    }
}
