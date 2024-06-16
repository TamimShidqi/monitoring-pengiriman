<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sopir extends Model
{
    use HasFactory;
    protected $table = 'sopir';
    public function sopir()
    {
        return $this->belongsTo(sopir::class);
    }

    public function akun()
    {
        return $this->hasOne(Akun::class);
    }
}
