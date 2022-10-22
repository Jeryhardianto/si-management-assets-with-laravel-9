@extends('layouts.app')
@section('title', 'Tambah Asset')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Asset</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Asset</a></li>
                            <li class="breadcrumb-item active">Tambah Asset</li>
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
                    <form method="POST" action="{{ route('assets.store') }}">
                        @csrf
                        <div class="card-body">
                            <a href="{{ route('assets.index') }}" class="btn btn-danger mb-3"><i
                                    class="fas fa-backward"></i>
                                Kembali</a>

                            <div class="form-group">
                                <label for="kategori">Kategori Asset</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                                    name="kategori" style="width: 100%;">
                                    @if (old('kategori'))
                                        <option value="{{ old('kategori')->id }}" selected>
                                            {{ old('kategori')->nama_kategori }}</option>
                                    @endif
                                </select>
                                @error('kategori')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nomor Unit</label>
                                <input type="number" id="nomorunit" name="nomorunit" value="{{ old('nomorunit') }}"
                                    class="form-control @error('nomorunit') is-invalid @enderror"
                                    placeholder="Masukan nama asset">
                                @error('nomorunit')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Kode Perkiraan</label>
                                <input type="number" id="kodeperkiraan" name="kodeperkiraan"
                                    value="{{ old('koodeperkiraan') }}"
                                    class="form-control @error('kodeperkiraan') is-invalid @enderror"
                                    placeholder="Masukan kode perkiraan">
                                @error('kodeperkiraan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Kode asset</label>
                                <input type="number" id="kodeasset" name="kodeasset" value="{{ old('kodeasset') }}"
                                    class="form-control @error('kodeasset') is-invalid @enderror"
                                    placeholder="Masukan kode asset">
                                @error('kodeasset')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Sub kode</label>
                                <input type="number" id="subkode" name="subkode" value="{{ old('subkode') }}"
                                    class="form-control @error('subkode') is-invalid @enderror"
                                    placeholder="Masukan sub kode">
                                @error('subkode')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}"
                                    class="form-control @error('lokasi') is-invalid @enderror"
                                    placeholder="Masukan sub kode">
                                @error('lokasi')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="namaaset">Nama Asset/ Uraian</label>
                                <input type="text" id="namaaset" name="namaaset" value="{{ old('namaaset') }}"
                                    class="form-control @error('namaaset') is-invalid @enderror"
                                    placeholder="Masukan nama asset">
                                @error('namaaset')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" id="harga" name="harga" value="{{ old('harga') }}"
                                    class="form-control @error('harga') is-invalid @enderror" placeholder="Masukan harga">
                                @error('harga')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}"
                                    class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukan jumlah">
                                @error('jumlah')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                                    name="satuan" style="width: 100%;">
                                    @if (old('satuan'))
                                        <option value="{{ old('satuan')->id }}" selected>{{ old('satuan')->nama_satuan }}
                                        </option>
                                    @endif
                                </select>
                                @error('satuan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <select class="form-control @error('golongan') is-invalid @enderror" id="golongan"
                                    name="golongan" style="width: 100%;">
                                    @if (old('golongan'))
                                        <option value="{{ old('golongan')->id }}" selected>{{ old('golongan')->nama_golongan }}
                                        </option>
                                    @endif
                                </select>
                                @error('golongan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="masa">Masa</label>
                                <input type="number" id="masa" name="masa" value="{{ old('masa') }}"
                                    class="form-control @error('masa') is-invalid @enderror"
                                    placeholder="Masukan masa">
                                @error('masa')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select class="form-control @error('kondisi') is-invalid @enderror" id="kondisi"
                                    name="kondisi" style="width: 100%;">
                                        <option value="" selected>--Pilih Kondisi--</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                </select>
                                @error('kondisi')
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
    <script src="{{ asset('assets/backsite/dist/js/jquery.maskMoney.js') }}"></script>
@endpush


@push('javascript-internal')
    <script>
        $(function() {
            // Mask harga
            $("#harga").maskMoney({
                prefix: 'Rp. ',
                allowNegative: true,
                thousands: '.',
                decimal: ',',
                affixesStay: false,
                precision: 0
            });


            //  Select2 Kategori 
            $('#kategori').select2({
                theme: 'bootstrap4',
                placeholder: '--Pilih Kategori --',
                allowClear: true,
                ajax: {
                    url: "{{ route('assets.selectkategori') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_kategori,
                                    id: item.id
                                }
                            })
                        }
                    }
                }
            });

            //  Select2 Satuan 
            $('#satuan').select2({
                theme: 'bootstrap4',
                placeholder: '--Pilih Satuan --',
                allowClear: true,
                ajax: {
                    url: "{{ route('assets.selectsatuan') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_satuan,
                                    id: item.id
                                }
                            })
                        }
                    }
                }
            });

            //  Select2 Golongan 
            $('#golongan').select2({
                theme: 'bootstrap4',
                placeholder: '--Pilih Golongan --',
                allowClear: true,
                ajax: {
                    url: "{{ route('assets.selectgolongan') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama_golongan,
                                    id: item.id
                                }
                            })
                        }
                    }
                }
            });

              //  Select2 Kondisi 
              $('#kondisi').select2({
                theme: 'bootstrap4',
                allowClear: true
            });


        });
    </script>
@endpush
