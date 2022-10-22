@extends('layouts.app')
@section('title', 'Satuan')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Satuan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            <li class="breadcrumb-item active">Satuan</li>
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
                        @can('satuan_create')
                            <a href="{{ route('satuan.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                                Tambah
                                Satuan</a>
                        @endcan
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama golongan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @forelse ($satuans as $satuan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $satuan->nama_satuan }}</td>
                                    <td>
                                        {{-- <a href="{{ route('users.show', $user->email) }}" class="btn btn-primary"><i
                                            class="fas fa-eye"></i> Detail</a> --}}
                                        @can('satuan_update')
                                            <a href="{{ route('satuan.edit', ['satuan' => $satuan]) }}"
                                                class="btn btn-success"><i class="fas fa-pen-square"></i> Edit</a>
                                        @endcan
                                        @can('satuan_delete')
                                            <form class="d-inline" method="post" role="alert"
                                                action="{{ route('satuan.destroy', ['satuan' => $satuan]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus</a>
                                                </button>
                                            </form>
                                        @endcan

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"><strong>Data Satuan Kosong</strong></td>
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
                "paging": true,
                "info": true,
                "ordering": true,
                "searching": true,
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
                    title: 'Hapus Satuan',
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
