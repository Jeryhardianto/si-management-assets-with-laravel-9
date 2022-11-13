<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';
    protected $fillable = [
        'satuan_id',
        'kategori_id',
        'golongan_id',
        'kode_asset',
        'lokasi',
        'uraian',
        'harga',
        'jumlah',
        'masa',
        'kondisi',
        'gambar',
        'created_at',
        'updated_at',
    ];



    // Relationship to kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id');
    }

    // Relationship to Satuan
    public function satuan()
    {
        return $this->belongsTo(Satuan::class,'satuan_id');
    }

    // Relationship to Golongan
    public function golongan()
    {
        return $this->belongsTo(Golongan::class,'golongan_id');
    }



}
