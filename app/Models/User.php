<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telp',
        'level'
    ];
    public function history_lelang()
    {
        return $this->hasMany(history_lelang::class);
    }
    public function lelang()
    {
        return $this->hasMany(lelang::class);
    }
}
