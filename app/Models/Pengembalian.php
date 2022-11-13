<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $fillable = [
        'id_transaksi',
        'id_penerima',
        'id_peminjam',
        'tanggal_pengembalian',
        'keterangan',
        'created_at',
        'updated_at',
    ];

  
     public function petugas()
     {
         return $this->belongsTo(User::class,'id_penerima');
     }
     public function pinjam()
     {
         return $this->belongsTo(User::class,'id_peminjam');
     }
}
