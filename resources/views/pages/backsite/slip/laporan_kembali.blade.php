<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Peminjaman</title>
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
    <h3 class="text-center"><u>Laporan Pengembalian</u></h3>
    <span>
        @if ($tanggal->tgl_mulai)
            Tanggal :
            @php
                $date = date_create($tanggal->tgl_mulai);
                $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                echo $date->isoFormat('D MMMM Y');
            @endphp
        @endif
        @if ($tanggal->tgl_selesai)
            s/d
            @php
                $date = date_create($tanggal->tgl_selesai);
                $date = Carbon\Carbon::parse($date, 'Asia/Jakarta');
                echo $date->isoFormat('D MMMM Y');
            @endphp
        @endif
    </span>
    <table class="table-asset mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id Transaksi</th>
                <th scope="col">Kode Asset</th>
                <th scope="col">Nama Asset</th>
                <th scope="col">Satuan</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse ($detailAsset as $dp)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $dp->id_transaksi }}</td>
                    <td>{{ $dp->kode_asset }}</td>
                    <td>{{ $dp->asset->uraian }}</td>
                    <td class="satuan">{{ $dp->asset->satuan->nama_satuan }}</td>
                    <td class="jumlah">{{ $dp->jumlah }}</td>
                </tr>
            @empty
                <tr>
                    <th colspan="6">Data transaksi pinjam kosong</th>
                </tr>
            @endforelse

        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
