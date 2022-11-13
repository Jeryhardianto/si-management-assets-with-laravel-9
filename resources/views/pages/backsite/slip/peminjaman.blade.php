<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slip Peminjaman - {{ $pinjaman->id_transaksi }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .table-asset {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table-asset td {
            border: 1px solid #000000;
            padding: 8px;
        }

        .table-asset th {
            border: 1px solid #000000;
            text-align: center;
            padding: 8px;
        }

        .satuan,
        .jumlah {
            text-align: center;
        }
    </style>
</head>

<body>
    <h3 class="text-center"><u>SLIP PEMINJAMAN</u></h3>
    <div class="container mt-5">
        <table class="table">
            <tr>
                <td width="30%">Nomor Transaksi</td>
                <td width="70%">: {{ $pinjaman->id_transaksi }}</td>
            </tr>
            <tr>
                <td>Nama Peminjam</td>
                <td>: {{ $pinjaman->user->name }}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>: {{ $pinjaman->no_hp }}</td>
            </tr>
            <tr>
                <td>Tanggal Peminjaman</td>
                <td>:
                    @php
                        $date = date_create($pinjaman->tanggal_peminjaman);
                        $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                        echo $date->isoFormat('D MMMM Y');
                    @endphp
                </td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>:
                    @php
                        $date = date_create($pinjaman->tanggal_pengembalian);
                        $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                        echo $date->isoFormat('D MMMM Y');
                    @endphp
                </td>
            </tr>
            <tr>
                <td>Petugas</td>
                <td>: @if (@$pinjaman->petugas->name)
                        {{ $pinjaman->petugas->name }}
                    @else
                        -
                    @endif
                </td>
            </tr>

        </table>

        <h4 class="text-center"><u>DAFTAR ASSET YANG DIPINJAM</u></h4>
        <table class="table-asset mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Asset</th>
                    <th scope="col">Nama Asset</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($detailPinjam as $dp)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $dp->kode_asset }}</td>
                        <td>{{ $dp->asset->uraian }}</td>
                        <td class="satuan">{{ $dp->asset->satuan->nama_satuan }}</td>
                        <td class="jumlah">{{ $dp->jumlah }}</td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="3">Data asset kosong</th>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <br>
        <br>
        <p class="text-end">Malinau,
            @php
                $date = date_create($pinjaman->tanggal_peminjaman);
                $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                echo $date->isoFormat('D MMMM Y');
            @endphp
        </p>
        <table class="table">

            <tr>
                <td width="30%" style="text-align: center">Penanggung Jawab</td>
                <td width="40%"></td>
                <td width="20%" style="text-align: center">Petugas</td>
            </tr>
            <tr>
                <td width="30%" style="text-align: center"><br><br><br>
                    <u>{{ $pinjaman->user->name }}</u>
                </td>
                <td width="40%"></td>
                <td width="20%" style="text-align: center"><br><br><br>
                    <u>{{ $pinjaman->petugas->name }}</u>
                </td>
            </tr>


        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
