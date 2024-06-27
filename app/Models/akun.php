<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    use HasFactory;
    protected $table = 'akun';
    public function sopir()
    {
        return $this->belongsTo(sopir::class);
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }

    public function pengiriman()
{
    return $this->hasMany(Pengiriman::class);
}



}
