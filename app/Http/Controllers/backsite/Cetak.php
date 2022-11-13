<?php

namespace App\Http\Controllers\backsite;
use PDF;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Models\DetailPinjaman;
use App\Http\Controllers\Controller;
use App\Models\Pengembalian;

class Cetak extends Controller
{
    
    public function cetakSlipPinjam($transaksi){
        $pinjaman       =  Pinjaman::where('id_transaksi', $transaksi)->first();
        $detailPinjam   =  DetailPinjaman::where('id_transaksi', $pinjaman->id_transaksi)->get();

        $slip_pinjam_pdf = PDF::loadView('pages.backsite.slip.peminjaman', [
            'pinjaman' => $pinjaman,
            'detailPinjam' => $detailPinjam
        ])->setpaper('A4', 'potrait');
        return $slip_pinjam_pdf->stream('Slip_Peminjaman.pdf');
        
      
    }

    public function cetakSlipKembali($transaksi){
        $kembali       =  Pengembalian::where('id_transaksi', $transaksi)->first();
        $pinjaman       =  Pinjaman::where('id_transaksi', $transaksi)->first();
        $detailPinjam   =  DetailPinjaman::where('id_transaksi', $kembali->id_transaksi)->get();

        $slip_pinjam_pdf = PDF::loadView('pages.backsite.slip.kembali', [
            'kembali' => $kembali,
            'pinjaman' => $pinjaman,
            'detailPinjam' => $detailPinjam
        ])->setpaper('A4', 'potrait');
        return $slip_pinjam_pdf->stream('Slip_Pengembalian.pdf');
    }

    // Cetak Laporan pinjam
    public function laporan_pinjam(Request $request){
        if($request->tgl_mulai && $request->tgl_selesai){
            $pinjaman = Pinjaman::whereBetween('tanggal_peminjaman', [
                $request->tgl_mulai,
                $request->tgl_selesai
            ])->get();
          }else{
            $pinjaman = Pinjaman::all();
          }
          $dpAsset = [];
          foreach($pinjaman as $pj){
            $dpAsset[] = DetailPinjaman::where('id_transaksi', $pj->id_transaksi)->get();
          }
          $dpAsset2 = [];
          foreach($dpAsset as $dpa){
                foreach($dpa as $dp){
                   $dpAsset2[] = $dp;
                }
          }


        $slip_pinjam_pdf = PDF::loadView('pages.backsite.slip.laporan_pinjam', [
            'detailAsset' => $dpAsset2,
            'tanggal' => $request
        ])->setpaper('A4', 'landscape');
        return $slip_pinjam_pdf->stream('Slip_Pengembalian.pdf');
    }

    // Cetak Laporan kembali
    public function laporan_kembali(Request $request){
        if($request->tgl_mulai && $request->tgl_selesai){
            $kembali = Pengembalian::whereBetween('tanggal_pengembalian', [
                $request->tgl_mulai,
                $request->tgl_selesai
            ])->get();
          }else{
            $kembali = Pengembalian::all();
          }
          $dpAsset = [];
          foreach($kembali as $pj){
            $dpAsset[] = DetailPinjaman::where('id_transaksi', $pj->id_transaksi)->get();
          }
          $dpAsset2 = [];
          foreach($dpAsset as $dpa){
                foreach($dpa as $dp){
                   $dpAsset2[] = $dp;
                }
          }


        $slip_pinjam_pdf = PDF::loadView('pages.backsite.slip.laporan_kembali', [
            'detailAsset' => $dpAsset2,
            'tanggal' => $request
        ])->setpaper('A4', 'landscape');
        return $slip_pinjam_pdf->stream('Slip_Pengembalian.pdf');
    }

}
