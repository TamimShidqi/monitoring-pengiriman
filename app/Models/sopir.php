<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sopir extends Model
{
    use HasFactory;
    protected $table = 'sopir';
    protected $fillable = [
        'nama',
        'nik',
        'tgl_lahir',
        'alamat',
        'email',
        'no_hp',
        'masa_sim',
    ];
    public function sopir()
    {
        return $this->belongsTo(sopir::class)->onDelete('cascade');
    }

    public function akun()
    {
        return $this->hasOne(Akun::class);
    }
}
