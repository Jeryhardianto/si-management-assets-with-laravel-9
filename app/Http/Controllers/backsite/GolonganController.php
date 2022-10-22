<?php

namespace App\Http\Controllers\backsite;

use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.backsite.golongan.index',[
            'golongans' => Golongan::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backsite.golongan.create');
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
            "golongan" => "required"
       ],
       [],
        );
        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try {
         Golongan::create([
            'nama_golongan' => $request->golongan,
            'created_at' => date('Y-m-d H:i:s')
         ]);

         Alert::success('Sukses','Data berhasil dibuat!');
         return redirect()->route('golongan.index');

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
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        return view('pages.backsite.golongan.edit',[
            'golongan' => $golongan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan)
    {
        $validator = Validator::make($request->all(),[
            "golongan" => "required"
       ],
       [],
        );
        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            Golongan::where('id', $golongan->id)->update([
            'nama_golongan' => $request->golongan,
            'updated_at' => date('Y-m-d H:i:s')
         ]);
         Alert::success('Sukses','Data berhasil diubah!');
         return redirect()->route('golongan.index');
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
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        DB::beginTransaction();
        try {
         $golongan->delete();
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
