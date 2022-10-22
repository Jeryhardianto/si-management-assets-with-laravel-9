@extends('layouts.app')
@section('title', 'Laporan Asset')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Laporan Assets</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item active">Laporan Assets</li>
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
                    {{-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> --}}
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Assets</th>
                                    <th>Nomor Unit</th>
                                    <th>Kode Perkiraan</th>
                                    <th>Kode Asset</th>
                                    <th>Sub Kode</th>
                                    <th>Lokasi</th>
                                    <th>Nama Assets</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Masa</th>
                                    <th>Kondisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assets as $asset)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $asset->kategori->nama_kategori }}</td>
                                        <td>{{ $asset->nomor_unit }}</td>
                                        <td>{{ $asset->kode_perkiraan }}</td>
                                        <td>{{ $asset->kode_asset }}</td>
                                        <td>{{ $asset->sub_kode }}</td>
                                        <td>{{ $asset->lokasi }}</td>
                                        <td>{{ $asset->uraian }}</td>
                                        <td>{{ Rupiah($asset->harga) }}</td>
                                        <td>{{ $asset->jumlah }}</td>
                                        <td>{{ $asset->masa }}</td>
                                        <td>
                                            @if ($asset->kondisi == 'Baik')
                                            <span class="badge badge-success">{{ $asset->kondisi }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ $asset->kondisi }}</span>

                                            @endif
                                        </td>
                                      
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center"><strong>Data Assets Kosong</strong></td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- END: Content-->

@endsection

{{-- Datatabel --}}
@push('javascript-internal')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush

