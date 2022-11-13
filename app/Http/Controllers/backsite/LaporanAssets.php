<?php

namespace App\Http\Controllers\backsite;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use App\Models\Pinjaman;

class LaporanAssets extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laporan_show', ['only' => 'index']);
        $this->middleware('permission:laporan_stok', ['only' => 'laporan_stok']);
        $this->middleware('permission:laporan_pinjam', ['only' => 'laporan_pinjam']);
        $this->middleware('permission:laporan_kembali', ['only' => 'laporan_kembali']);
    
    }


    public function index(){
        return view('pages.backsite.laporan.lapasset', [
            'assets' => Asset::all()
        ]);
    }

    public function laporan_stok(){
        return view('pages.backsite.laporan.lapstok', [
            'assets' => Asset::all()
        ]);
    }   

    public function laporan_pinjam(){
       

        return view('pages.backsite.laporan.lappinjam', [
            'pinjaman' =>  Pinjaman::all()
        ]);

    }   
    
    public function laporan_kembali(){
        return view('pages.backsite.laporan.lapkembali', [
            'kembali' => Pengembalian::all()
        ]);
    }
}
