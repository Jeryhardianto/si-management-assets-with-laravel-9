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
                        <h1 class="m-0">Detail Transaksi Pinjaman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">List Transaksi Peminjaman</a></li>
                            <li class="breadcrumb-item active">Detail Transaksi Pinjaman</li>
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
                                <a href="{{ route('pinjaman.index') }}" class="btn btn-danger mb-3"><i
                                        class="fas fa-backward"></i>Kembali</a>
                          

                                <table class="table">
                                    <tr>
                                        <td width="20%">No Transaksi</td>
                                        <td width="5%">:</td>
                                        <td width="75%">{{ $pinjaman->id_transaksi }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="5%">:</td>
                                        <td width="75%">{{ $pinjaman->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">No HP</td>
                                        <td width="5%">:</td>
                                        <td width="75%">{{ $pinjaman->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Pengajuan</td>
                                        <td width="5%">:</td>
                                        <td width="75%">
                                            @php
                                                $date = date_create($pinjaman->tanggal_pengajuan);
                                                $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                                                echo $date->isoFormat('D MMMM Y');
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Pinjam</td>
                                        <td width="5%">:</td>
                                        <td width="75%">
                                            @if ($pinjaman->tanggal_peminjaman)
                                                @php
                                                    $date = date_create($pinjaman->tanggal_peminjaman);
                                                    $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                                                    echo $date->isoFormat('D MMMM Y');
                                                @endphp
                                            @else
                                                <span class="badge badge-warning">Menuggu Disetujui</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Pengembalian</td>
                                        <td width="5%">:</td>
                                        <td width="75%">
                                            @if ($pinjaman->tanggal_pengembalian)
                                                @php
                                                    $date = date_create($pinjaman->tanggal_pengembalian);
                                                    $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                                                    echo $date->isoFormat('D MMMM Y');
                                                @endphp
                                            @else
                                                <span class="badge badge-warning">Menuggu Disetujui</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Status Pinjam</td>
                                        <td width="5%">:</td>
                                        <td width="75%">
                                            @if ($pinjaman->status == '1')
                                                <span class="badge badge-warning">Menuggu Disetujui</span>
                                            @elseif ($pinjaman->status == '2')
                                                <span class="badge badge-success">Disetujui - Silahkan mengambil
                                                    barang</span>
                                            @elseif ($pinjaman->status == '3')
                                                <span class="badge badge-primary">Sudah diambil oleh
                                                    {{ $pinjaman->user->name }}</span>
                                            @elseif ($pinjaman->status == '4')
                                                <span class="badge badge-danger">Ditolak</span>
                                            @elseif ($pinjaman->status == '5')
                                                <span class="badge badge-success">Sudah Dikembalikan</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Petugas</td>
                                        <td width="5%">:</td>
                                        <td width="75%">
                                            @if (@$pinjaman->petugas->name)
                                                {{ $pinjaman->petugas->name }}
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
                        <div class="card">
                            <form action="{{ route('kembali.kembali') }}" method="post" target="_blank">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group" id="alasan">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" cols="20" rows="10"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="id_transaksi" value="{{ $pinjaman->id_transaksi }}">
                                <input type="hidden" name="id_peminjam" value="{{ $pinjaman->id_peminjam }}">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
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
