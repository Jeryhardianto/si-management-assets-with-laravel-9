@extends('layouts.app')
@section('title', 'Detail Asset')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Asset</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Asset</a></li>
                            <li class="breadcrumb-item active">Detail Asset</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('assets.index') }}" class="btn btn-danger mb-3"><i class="fas fa-backward"></i>
                            Kembali</a>
                        <div class="form-group">
                            <label>Kategori Asset</label>
                            <input type="text" value="{{ $asset->kategori->nama_kategori }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Nomor Unit</label>
                            <input type="text" value="{{ $asset->nomor_unit }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kode Perkiraan</label>
                            <input type="text" value="{{ $asset->kode_perkiraan }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Kode asset</label>
                            <input type="text" value="{{ $asset->kode_asset }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Sub kode</label>
                            <input type="text" value="{{ $asset->sub_kode }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" value="{{ $asset->lokasi }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Asset/ Uraian</label>
                            <input type="text" value="{{ $asset->uraian }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" value="{{ Rupiah($asset->harga) }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" value="{{ $asset->jumlah }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" value="{{ $asset->satuan->nama_satuan }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Golongan</label>
                            <input type="text" value="{{ $asset->golongan->nama_golongan }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Masa</label>
                            <input type="text" value="{{ $asset->masa }}" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Masa</label>
                            <input type="text" value="{{ $asset->kondisi }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- END: Content-->

@endsection
