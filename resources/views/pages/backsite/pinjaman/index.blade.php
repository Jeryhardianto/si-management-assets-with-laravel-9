@extends('layouts.app')
@section('title', 'List Transaksi Peminjaman')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Transaksi Peminjaman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item active">List Transaksi Peminjaman</li>
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
                        @can('pinjam_create')
                            <a href="{{ route('pinjaman.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                                Tambah Pengajuan Peminjaman</a>
                        @endcan

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Peminjam</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pinjaman as $pj)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('pinjaman.show', $pj->id) }}">{{ $pj->id_transaksi }}</a>
                                        </td>
                                        <td>{{ $pj->user->name }}</td>
                                        <td>
                                            @if ($pj->status == '1')
                                                <span class="badge badge-warning">Menuggu Disetujui</span>
                                            @elseif ($pj->status == '2')
                                                <span class="badge badge-secondary">Disetujui - Silahkan mengambil
                                                    barang</span>
                                            @elseif ($pj->status == '3')
                                                <span class="badge badge-primary">Sudah diambil oleh
                                                    {{ $pj->user->name }}</span>
                                            @elseif ($pj->status == '4')
                                                <span class="badge badge-danger">Ditolak dengan alasan :
                                                    {{ $pj->keterangan }}</span>
                                            @elseif ($pj->status == '5')
                                                <span class="badge badge-success">Sudah Dikembalikan</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('pinjam_detail')
                                                <a href="{{ route('pinjaman.show', $pj->id) }}" class="btn btn-primary"><i
                                                        class="fas fa-eye"></i> Detail</a>
                                            @endcan

                                            {{-- <a href="{{ route('pinjaman.edit', $pj->id) }}"
                                                    class="btn btn-success"><i class="fas fa-pen-square"></i> Edit</a> --}}
                                            @can('kembali_detail')
                                                @if ($pj->status == '3')
                                                    <a href="{{ route('kembali.show', $pj->id) }}" class="btn btn-primary"><i
                                                            class="fas fa-sign-out-alt"></i> Kembali Asset</a>
                                                @endif
                                            @endcan

                                            @can('pinjam_delete')
                                                @if (in_array($pj->status, ['1', '4']))
                                                    <form class="d-inline" method="post" role="alert"
                                                        action="{{ route('pinjaman.destroy', $pj->id_transaksi) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> Hapus</a>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center"><strong>Data Pinjaman Kosong</strong></td>
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
        });
    </script>
@endpush

@push('javascript-internal')
    <script>
        // Alert konfirmasi hapus
        $(document).ready(function() {
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                // alert('Hallo');
                Swal.fire({
                    title: 'Hapus Asset',
                    text: "Apakah anda yakin menghapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                })
            });
        });
    </script>
@endpush
