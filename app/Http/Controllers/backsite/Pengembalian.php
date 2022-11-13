<?php

namespace App\Http\Controllers\backsite;

use App\Models\Asset;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Models\DetailPinjaman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pengembalian as ModelsPengembalian;

class Pengembalian extends Controller
{
    public function index(){
        if(in_array(Auth()->user()->name, ['admin', 'SuperAdmin'])){
            $kembali =  ModelsPengembalian::all();
        }else{
            $kembali =  ModelsPengembalian::where('id_peminjam', Auth()->user()->id)->orderBy('id', 'DESC')->get();
        }
        return view('pages.backsite.kembali.index',[
            'kembali' => $kembali
        ]);
    }

    public function detail($id_transaksi)
    {
        $kembali       =  ModelsPengembalian::where('id_transaksi', $id_transaksi)->first();
        $detailPinjam   =  DetailPinjaman::where('id_transaksi', $id_transaksi)->get();
        return view('pages.backsite.kembali.detail', [
            'kembali' => $kembali,
            'detailPinjam' => $detailPinjam
        ]);
    }

    public function show($id)
    {
        $pinjaman       =  Pinjaman::where('id', $id)->first();
        $detailPinjam   =  DetailPinjaman::where('id_transaksi', $pinjaman->id_transaksi)->get();
        return view('pages.backsite.kembali.show', [
            'pinjaman' => $pinjaman,
            'detailPinjam' => $detailPinjam
        ]);
    }

    public function kembali(Request $request){
        DB::beginTransaction();
        try {
            $cek = ModelsPengembalian::where('id_transaksi', $request->id_transaksi)->first();
            if($cek){
                Alert::error('Gagal','Data sudah diproses!');
                return redirect()->back();
            }
            Pinjaman::where('id_transaksi', $request->id_transaksi)->update([
                'status' => 5
            ]);
            
              // get id transaksi
              $dPinjam = DetailPinjaman::where('id_transaksi', $request->id_transaksi)->get();
              foreach($dPinjam as $dp){
                // kurangi stok di assets
                $asset = Asset::where('id', $dp->id_asset)->first();
                Asset::where('id', $dp->id_asset)->update([
                    'jumlah' =>  $asset->jumlah + $dp->jumlah 
                ]);
              }

            ModelsPengembalian::create([
                'id_transaksi' => $request->id_transaksi,
                'id_penerima' => Auth()->user()->id,
                'id_peminjam' => $request->id_peminjam,
                'tanggal_pengembalian' => date('Y-m-d H:i:s'),
                'keterangan' => $request->keterangan,
                'updated_at' => date('Y-m-d H:i:s')
            ]); 
            return redirect()->route('cetakSlipKembali', $request->id_transaksi);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollBack();
            Alert::error('Gagal','Data gagal disimpan!');
            return redirect()->back();
        }finally{
            DB::commit();
        }
    
    }
}
