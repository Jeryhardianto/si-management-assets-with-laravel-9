<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $fillable = [
        'id_transaksi',
        'id_peminjam',
        'id_petugas',
        'tanggal_pengajuan',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'no_hp',
        'status',
        'keterangan',
        'created_at',
        'updated_at',
    ];

        // Relationship to user
        public function user()
        {
            return $this->belongsTo(User::class,'id_peminjam');
        }  
        public function petugas()
        {
            return $this->belongsTo(User::class,'id_petugas');
        }
}
