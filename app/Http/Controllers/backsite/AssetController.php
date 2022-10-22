<?php

namespace App\Http\Controllers\backsite;

use App\Models\Asset;
use App\Models\Satuan;
use App\Models\Golongan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:asset_show', ['only' => 'index']);
        $this->middleware('permission:asset_create', ['only' => 'create', 'store']);
        $this->middleware('permission:asset_update', ['only' => 'edit', 'update']);
        $this->middleware('permission:asset_detail', ['only' => 'show']);
        $this->middleware('permission:asset_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Asset::all());
        return view('pages.backsite.asset.index',[
            'assets' => Asset::all()
        ]);
    }

    public function selectKategori(Request $request)
    {
        $kategories = Kategori::select('id', 'nama_kategori')->limit(7);
        if($request->has('q')){
            $kategories->where('nama_kategori', 'LIKE',"%{$request->q}%");
        }
        return response()->json($kategories->get());
    }

    public function selectSatuan(Request $request)
    {
        $satuans = Satuan::select('id', 'nama_satuan')->limit(7);
        if($request->has('q')){
            $satuans->where('nama_satuan', 'LIKE',"%{$request->q}%");
        }
        return response()->json($satuans->get());
    }

    public function selectGolongan(Request $request)
    {
        $golongans = Golongan::select('id', 'nama_golongan')->limit(7);
        if($request->has('q')){
            $golongans->where('nama_golongan', 'LIKE',"%{$request->q}%");
        }
        return response()->json($golongans->get());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backsite.asset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "kategori" => "required",
            "nomorunit" => "required",
            "kodeperkiraan" => "required",
            "kodeasset" => "required",
            "subkode" => "required",
            "lokasi" => "required",
            "namaaset" => "required",
            "harga" => "required",
            "jumlah" => "required",
            "satuan" => "required",
            "golongan" => "required",
            "masa" => "required",
            "kondisi" => "required"
       ],
       [],
        );
        if ($validator->fails()){
            $request['kategori'] = Kategori::select('id', 'nama_kategori')->find($request->kategori);
            $request['satuan'] = Satuan::select('id', 'nama_satuan')->find($request->satuan);
            $request['golongan'] = Golongan::select('id', 'nama_golongan')->find($request->golongan);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
         Asset::create([
            "kategori_id" =>  $request->kategori,
            "nomor_unit" => $request->nomorunit,
            "kode_perkiraan" => $request->kodeperkiraan,
            "kode_asset" => $request->kodeasset,
            "sub_kode" => $request->subkode,
            "lokasi" => $request->lokasi,
            "uraian" => $request->namaaset,
            "harga" => str_replace('.','' ,$request->harga),
            "jumlah" => $request->jumlah,
            "satuan_id" => $request->satuan,
            "golongan_id" => $request->golongan,
            "masa" => $request->masa,
            "kondisi" => $request->kondisi,
            'created_at' => date('Y-m-d H:i:s')
         ]);

         Alert::success('Sukses','Data berhasil dibuat!');
         return redirect()->route('assets.index');

        } catch (\Throwable $th) {
         DB::rollBack();
         Alert::error('Gagal','Data gagal dibuat!');
         return redirect()->back()->withInput($request->all());
        }finally{
         DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        return view('pages.backsite.asset.show',[
            'asset' => $asset
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return view('pages.backsite.asset.edit',[
            'asset' => $asset
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        $validator = Validator::make($request->all(),[
            "kategori" => "required",
            "nomorunit" => "required",
            "kodeperkiraan" => "required",
            "kodeasset" => "required",
            "subkode" => "required",
            "lokasi" => "required",
            "namaaset" => "required",
            "harga" => "required",
            "jumlah" => "required",
            "satuan" => "required",
            "golongan" => "required",
            "masa" => "required",
            "kondisi" => "required"
       ],
       [],
        );
        if ($validator->fails()){
            $request['kategori'] = Kategori::select('id', 'nama_kategori')->find($request->kategori);
            $request['satuan'] = Satuan::select('id', 'nama_satuan')->find($request->satuan);
            $request['golongan'] = Golongan::select('id', 'nama_golongan')->find($request->golongan);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
         Asset::where('id', $asset->id)->update([
            "kategori_id" =>  $request->kategori,
            "nomor_unit" => $request->nomorunit,
            "kode_perkiraan" => $request->kodeperkiraan,
            "kode_asset" => $request->kodeasset,
            "sub_kode" => $request->subkode,
            "lokasi" => $request->lokasi,
            "uraian" => $request->namaaset,
            "harga" => str_replace('.','' ,$request->harga),
            "jumlah" => $request->jumlah,
            "satuan_id" => $request->satuan,
            "golongan_id" => $request->golongan,
            "masa" => $request->masa,
            "kondisi" => $request->kondisi,
            'updated_at' => date('Y-m-d H:i:s')
         ]);

         Alert::success('Sukses','Data berhasil diubah!');
         return redirect()->route('assets.index');

        } catch (\Throwable $th) {
         DB::rollBack();
        //  dd($th->getMessage());
         Alert::error('Gagal','Data gagal diubah!');
         return redirect()->back()->withInput($request->all());
        }finally{
         DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        DB::beginTransaction();
        try {
         $asset->delete();
         Alert::success('Sukses','Data berhasil dihapus!');
        } catch (\Throwable $th) {
         DB::rollBack();
         Alert::error('Gagal','Data gagal dihapus!');
        }finally{
         DB::commit();
         return redirect()->back();
        }
    }
}
