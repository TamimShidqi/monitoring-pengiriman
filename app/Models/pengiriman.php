<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';

    protected $fillable = [
        'sopir_id',
        'mobil_id',
        'perusahaan',
        'alamat',
        'date_order',
        'jenis',
        'liter',
        'jarak',
        'tarif',
        'total',
        'status',
        'foto',
    ];

    public function sopir()
    {
        return $this->belongsTo(sopir::class);
    }

    public function mobil()
    {
        return $this->belongsTo(mobil::class);
    }
}
