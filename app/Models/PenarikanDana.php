<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenarikanDana extends Model
{
    use HasFactory;

    protected $table = 'penarikan_dana';

    protected $primaryKey = 'id_transaksi';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id_transaksi',
        'nama_pengguna',
        'jumlah',
        'bank',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];
}
