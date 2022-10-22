@extends('layouts.app')
@section('title', 'Edit Asset')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Asset</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Asset</a></li>
                            <li class="breadcrumb-item active">Edit Asset</li>
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
                    <form method="POST" action="{{ route('assets.update', ['asset' => $asset]) }}">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <a href="{{ route('assets.index') }}" class="btn btn-danger mb-3"><i
                                    class="fas fa-backward"></i>
                                Kembali</a>

                            <div class="form-group">
                                <label for="kategori">Kategori Asset</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                                    name="kategori" style="width: 100%;">
                                    <option value="{{ old('kategori',$asset->kategori->id) }}" selected>
                                        {{ old('kategori', $asset->kategori->nama_kategori) }}
                                    </option>
                                </select>
                                @error('kategori')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nomor Unit</label>
                                <input type="number" id="nomorunit" name="nomorunit" value="{{ old('nomorunit', $asset->nomor_unit) }}"
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
                                    value="{{ old('koodeperkiraan', $asset->kode_perkiraan) }}"
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
                                <input type="number" id="kodeasset" name="kodeasset" value="{{ old('kodeasset', $asset->kode_asset) }}"
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
                                <input type="number" id="subkode" name="subkode" value="{{ old('subkode',$asset->sub_kode) }}"
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
                                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi',$asset->lokasi) }}"
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
                                <input type="text" id="namaaset" name="namaaset" value="{{ old('namaaset', $asset->uraian) }}"
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
                                <input type="text" id="harga" name="harga" value="{{ old('harga',$asset->harga) }}"
                                    class="form-control @error('harga') is-invalid @enderror" placeholder="Masukan harga">
                                @error('harga')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah', $asset->jumlah) }}"
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
                                    <option value="{{ old('satuan',$asset->satuan->id) }}" selected>
                                        {{ old('satuan', $asset->satuan->nama_satuan) }}
                                    </option>
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
                                    <option value="{{ old('golongan',$asset->golongan->id) }}" selected>
                                        {{ old('golongan', $asset->golongan->nama_golongan) }}
                                    </option>
                                </select>
                                @error('golongan')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="masa">Masa</label>
                                <input type="number" id="masa" name="masa" value="{{ old('masa',$asset->masa) }}"
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
                                    @if ($asset->kondisi == 'Baik')
                                     <option value="{{ old('kondisi',$asset->kondisi) }}" selected>{{ old('kondisi',$asset->kondisi) }}</option>
                                     <option value="Rusak">Rusak</option>
                                     @elseif ($asset->kondisi == 'Rusak')
                                     <option value="{{ old('kondisi',$asset->kondisi) }}" selected>{{ old('kondisi',$asset->kondisi) }}</option>
                                     <option value="Baik">Baik</option>
                                     @endif
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
