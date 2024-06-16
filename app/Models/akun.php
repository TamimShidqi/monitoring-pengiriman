<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
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

    
}
