@extends('layouts.app')
@section('title', 'Edit Satuan')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Satuan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Satuan</a></li>
                            <li class="breadcrumb-item active">Edit Satuan</li>
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
                    <form method="POST" action="{{ route('satuan.update', ['satuan' => $satuan]) }}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <a href="{{ route('satuan.index') }}" class="btn btn-danger mb-3"><i class="fas fa-backward"></i>
                                Kembali</a>
                            <div class="form-group">
                                <label for="name">Nama Satuan</label>
                                <input type="text" id="satuan" name="satuan" value="{{ old('satuan', $satuan->nama_satuan) }}"
                                    class="form-control @error('satuan') is-invalid @enderror" placeholder="Masukan nama kategori">
                                @error('satuan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
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
            $('#role').select2({
                theme: 'bootstrap4',
                allowClear: true,
                ajax: {
                    url: "{{ route('roles.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        }
                    }
                }

            });
        });
    </script>
@endpush
