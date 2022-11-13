<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjaman extends Model
{
    use HasFactory;
    protected $table = 'detail_pinjaman';
    protected $fillable = [
        'id_transaksi',
        'id_asset',
        'kode_asset',
        'jumlah',
        'keterangan',
        'created_at',
        'updated_at',
    ];

    // Relationship to user
    public function asset()
    {
        return $this->belongsTo(Asset::class,'id_asset');
    }
}
