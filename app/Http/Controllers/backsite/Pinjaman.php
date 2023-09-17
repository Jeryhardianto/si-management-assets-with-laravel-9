<?php

namespace App\Http\Controllers\backsite;

use App\Models\User;
use App\Models\Asset;
use Illuminate\Http\Request;
use App\Models\DetailPinjaman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Pinjaman as ModelsPinjaman;

class Pinjaman extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pinjam_show', ['only' => 'index']);
        $this->middleware('permission:pinjam_create', ['only' => 'create', 'store']);
        $this->middleware('permission:pinjam_update', ['only' => 'update']);
        $this->middleware('permission:pinjam_detail', ['only' => 'show']);
        $this->middleware('permission:pinjam_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(in_array(Auth()->user()->name, ['admin', 'SuperAdmin'])){
            $pinjaman =  ModelsPinjaman::whereNot('status', 5)->orderBy('id', 'DESC')->get();
        }else{
            $pinjaman =  ModelsPinjaman::whereNot('status', 5)->where('id_peminjam', Auth()->user()->id)->orderBy('id', 'DESC')->get();
        }

        return view('pages.backsite.pinjaman.index',[
            'pinjaman' => $pinjaman
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backsite.pinjaman.create',[
            'assets' => Asset::all(),
            'users' => User::whereNot('id', 1)->whereNot('id', 2)->whereNot('id', 3)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        DB::beginTransaction();

        $id_transaksi = 'P-'.time();
        ModelsPinjaman::create([
            'id_transaksi' =>  $id_transaksi,
            'id_peminjam' => $request->peminjam,
            'tanggal_pengajuan' => date('Y-m-d H:i:s'),
            'tanggal_pengembalian' => $request->tanggalkembali,
            'no_hp' => $request->nohp,
            'status' => 1
        ]);
        $i = 0;
        foreach($request->idasset as $id){
            DetailPinjaman::create([
                'id_transaksi' =>  $id_transaksi,
                'kode_asset' => $request->kodeasset[$i],
                'id_asset' => $id,
                'jumlah' => $request->jumlah[$i]
            ]);
            
            $i++;
        }
        Alert::success('Sukses','Pengajuan Peminjaman sudah dibuat!');
        return redirect()->route('pinjaman.index');
      } catch (\Throwable $th) {
        DB::rollBack();
        Alert::error('Gagal','Pengajuan Peminjaman gagal dibuat!');
      }finally{
        DB::commit();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $pinjaman       =  ModelsPinjaman::where('id', $id)->first();
        $detailPinjam   =  DetailPinjaman::where('id_transaksi', $pinjaman->id_transaksi)->get();
        return view('pages.backsite.pinjaman.show', [
            'pinjaman' => $pinjaman,
            'detailPinjam' => $detailPinjam
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        $validator = Validator::make($request->all(),[
            'status' => 'required|not_in:0'
       ],
       [],
        );
        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        if($request->alasan){
            $alasan = $request->alasan;
        }else{
            $alasan = null;
        }
 
             
        DB::beginTransaction();
        try {
        if($request->status == '2'){
             // get id transaksi
             $pinjam = ModelsPinjaman::select('id_transaksi')->find($id);
             $dPinjam = DetailPinjaman::where('id_transaksi', $pinjam->id_transaksi)->get();
             foreach($dPinjam as $dp){
               // kurangi stok di assets
               $asset = Asset::where('id', $dp->id_asset)->first();
               Asset::where('id', $dp->id_asset)->update([
                   'jumlah' =>  $asset->jumlah - $dp->jumlah 
               ]);
             }
             
            ModelsPinjaman::where('id', $id)->update([
                'id_petugas' => Auth()->user()->id,
                'status' => $request->status,
                'tanggal_peminjaman' => date('Y-m-d H:i:s'),
                'keterangan' => $alasan,
                'updated_at' => date('Y-m-d H:i:s')
            ]); 
        }else{
            ModelsPinjaman::where('id', $id)->update([
                'status' => $request->status,
                'tanggal_peminjaman' => date('Y-m-d H:i:s'),
                'keterangan' => $alasan,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        Alert::success('Sukses','Status berhasil diubah!');
        return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Gagal','Status gagal diubah!');
            return redirect()->back();
        }finally{
            DB::commit();
        }

      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        DB::table('pinjaman')->where('id_transaksi', $id_transaksi)->delete();
        DB::table('detail_pinjaman')->where('id_transaksi', $id_transaksi)->delete();
        Alert::success('Sukses','Data berhasil dihapus!');
        return redirect()->back();
    }

   
}
