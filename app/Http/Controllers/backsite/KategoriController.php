<?php

namespace App\Http\Controllers\backsite;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category_show', ['only' => 'index']);
        $this->middleware('permission:category_create', ['only' => 'create', 'store']);
        $this->middleware('permission:category_update', ['only' => 'edit', 'update']);
        $this->middleware('permission:category_delete', ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('pages.backsite.kategori.index',[
            'kategories' => Kategori::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backsite.kategori.create');
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
            "namakategori" => "required"
       ],
       [],
        );
        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
         Kategori::create([
            'nama_kategori' => $request->namakategori,
            'created_at' => date('Y-m-d H:i:s')
         ]);
         Alert::success('Sukses','Data berhasil dibuat!');
         return redirect()->route('kategori.index');

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
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('pages.backsite.kategori.edit',[
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(),[
            "namakategori" => "required"
       ],
       [],
        );
        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            Kategori::where('id', $kategori->id)->update([
            'nama_kategori' => $request->namakategori,
            'updated_at' => date('Y-m-d H:i:s')
         ]);
         Alert::success('Sukses','Data berhasil diubah!');
         return redirect()->route('kategori.index');
        } catch (\Throwable $th) {
         DB::rollBack();
         Alert::error('Gagal','Data gagal diubah!');
         return redirect()->back()->withInput($request->all());
        }finally{
         DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        DB::beginTransaction();
        try {
         $kategori->delete();
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
