@extends('layouts.app')
@section('title', 'Tambah Pengajuan Peminjaman')
@section('content')

    <!-- BEGIN: Content-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Pengajuan Peminjaman</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Asset</a></li>
                            <li class="breadcrumb-item active">Tambah Pengajuan Peminjaman</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('pinjaman.store') }}" method="post" role="alert">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('pinjaman.index') }}" class="btn btn-danger mb-3"><i
                                    class="fas fa-backward"></i>
                                Kembali</a>

                            @if (Auth::user()->name == 'admin')
                                <div class="form-group">
                                    <label for="peminjam">Nama Peminjam</label>
                                    <select class="form-control @error('peminjam') is-invalid @enderror" id="peminjam"
                                        name="peminjam" style="width: 100%;">
                                        <option value="0">-- Pilih Users ---</option>
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @empty
                                            <option>Users kosong</option>
                                        @endforelse
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @else
                                <input type="hidden" name="peminjam" value="{{ Auth::user()->id }}">
                            @endif

                            <div class="form-group">
                                <label for="nohp">No HP</label>
                                <input type="text" id="nohp" name="nohp" value="{{ old('nohp') }}"
                                    class="form-control @error('nohp') is-invalid @enderror"
                                    placeholder="Masukan nama asset">
                                @error('nohp')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="namaasset">Nama Asset</label>
                                <select class="form-control @error('namaasset') is-invalid @enderror" id="namaasset"
                                    name="namaasset" style="width: 100%;">
                                    <option value="0">-- Pilih Nama Asset ---</option>
                                    @forelse ($assets as $as)
                                        <option value="{{ $as->id }}" nama-asset="{{ $as->uraian }}"
                                            kode-asset="{{ 'PDAM-' . sprintf('%05d', $as->kode_asset) }}" stok="{{ $as->jumlah }}">
                                            {{ 'PDAM-' . sprintf('%05d', $as->kode_asset) }}-{{ $as->uraian }}-[Stok:{{ $as->jumlah }}]</option>
                                    @empty
                                        <option>Asset kosong</option>
                                    @endforelse

                                </select>
                                @error('namaasset')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" onchange="cekStok()"
                                    class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukan jumlah">
                                @error('jumlah')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="button" id="simpan" onclick="detailAsset()" class="btn btn-primary"><i
                                    class="fas fa-plus"></i>
                                Tambah</button>
                        </div>
                    </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="tableasset" class="table">
                                    <tr>
                                        <th>Kode Asset</th>
                                        <th>Nama Asset</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </table>
                                <div class="form-group mt-3">
                                    <label for="tanggalkembali">Tangal Pengembalian</label>
                                    <input type="date" id="tanggalkembali" name="tanggalkembali"
                                        value="{{ old('tanggalkembali') }}"
                                        class="form-control @error('tanggalkembali') is-invalid @enderror col-4"
                                        placeholder="Masukan tanggalkembali">
                                    @error('tanggalkembali')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit"  class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </div>
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- END: Content-->

@endsection

@push('javascript-internal')
    <script>
        $(function() {
            $("#simpan").prop('disabled', true);
            $('#namaasset').select2({
                theme: 'bootstrap4',
                allowClear: true
            });
            $('#peminjam').select2({
                theme: 'bootstrap4',
                allowClear: true
            });
        });


        var table = document.getElementById("tableasset");

        function detailAsset() {
            var idasset = document.getElementById("namaasset").value;
            var kodeasset = $('#namaasset').find("option:selected").attr('kode-asset');
            var namaaset = $('#namaasset').find("option:selected").attr('nama-asset');
            var jumlah = document.getElementById("jumlah").value;

            var row = table.insertRow(-1);
            var celno = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);

            celno.innerHTML = '<input type="hidden" name="kodeasset[]" value='.concat(kodeasset, '>', kodeasset);
            cell1.innerHTML = '<input type="hidden" name="idasset[]" value='.concat(idasset, '>', namaaset);
            cell2.innerHTML = '<input type="hidden" name="jumlah[]" value='.concat(jumlah, '>', jumlah);
            cell3.innerHTML =
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)"><i class="mdi mdi-delete"></i> Hapus</button>';
        }

        function deleteRow(el) {
            var i = el.parentNode.parentNode.rowIndex;
            table.deleteRow(i);
            while (table.rows[i]) {
                updateRow(table.rows[i], i, false);
                i++;
            }
        }
      

        function cekStok(){
            let stok = $('#namaasset').find("option:selected").attr("stok");
            let jumlah = $('#jumlah').val();

            if(jumlah > stok){
                Swal.fire(
                'Peringatan!',
                'Stok tidak cukup!',
                'error'
                )
                $("#simpan").prop('disabled', true);
                
            }else{
                $("#simpan").prop('disabled', false);

            }

        }

        $(document).ready(function() {
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                // alert('Hallo');
                Swal.fire({
                    title: 'Perhatian ',
                    text: "Apakah data yang anda masukan sudah benar ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                })
            });
        });
    </script>
@endpush
