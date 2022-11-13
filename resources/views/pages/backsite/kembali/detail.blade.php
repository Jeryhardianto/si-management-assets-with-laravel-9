@extends('layouts.app')
@section('title', 'Detail Transaksi Pinjaman')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Transaksi Pengembalian</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">List Transaksi Pengembalian</a></li>
                            <li class="breadcrumb-item active">Detail Transaksi Pengembalian</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('kembali.index') }}" class="btn btn-danger mb-3"><i
                                        class="fas fa-backward"></i>Kembali</a>
                                        <a href="{{ route('cetakSlipKembali', $kembali->id_transaksi) }}" target="_blank"
                                            class="btn btn-success mb-3 float-right"><i class="fas fa-print"></i> Cetak Slip
                                            Pengembalian</a>
                            
                                <table class="table">
                                    <tr>
                                        <td width="20%">No Transaksi</td>
                                        <td width="5%">:</td>
                                        <td width="75%">{{ $kembali->id_transaksi }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="5%">:</td>
                                        <td width="75%">{{ $kembali->pinjam->name }}</td>
                                    </tr>
                                
                                    <tr>
                                        <td width="20%">Status Pinjam</td>
                                        <td width="5%">:</td>
                                        <td width="75%">
                                       
                                                <span class="badge badge-success">Sudah Dikembalikan</span>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Petugas</td>
                                        <td width="5%">:</td>
                                        <td width="75%">
                                            @if (@$kembali->petugas->name)
                                                {{ $kembali->petugas->name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                 
                                </table>
                                <div class="mt-3">
                                    <h4>Detail Assets</h4>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Asset</th>
                                            <th scope="col">Nama Asset</th>
                                            <th scope="col">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detailPinjam as $dp)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $dp->kode_asset }}</td>
                                                <td>{{ $dp->asset->uraian }}</td>
                                                <td>{{ $dp->jumlah }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th colspan="3">Data asset kososng</th>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                  
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- END: Content-->

@endsection
@push('javascript-internal')
    <script>
        $(function() {
            $('#status').select2({
                theme: 'bootstrap4',
                allowClear: true
            });
        });
     
    </script>
@endpush
