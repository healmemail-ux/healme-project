<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_barang',
        'tgl',
        'harga_awal',
        'image',
        'deskripsi_barang'
    ];
    public function lelang()
    {
        return $this->hasMany(lelang::class);
    }
    public function history_lelang()
    {
        return $this->hasMany(history_lelang::class);
    }
}