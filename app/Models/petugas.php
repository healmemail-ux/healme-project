<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'id_level'
        
    ];
    public function lelang()
    {
        return $this->hasMany(lelang::class);
    }
    public function level()
    {
        return $this->belongsTo(level::class);
    }
}