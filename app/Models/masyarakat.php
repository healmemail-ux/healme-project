<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'telp',
        'level'
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