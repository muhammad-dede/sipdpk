<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Cetak Laporan') }}</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        #kop {
            width: 100%;
        }
    </style>
</head>

<body>
    <img src="{{ asset('') }}assets/images/kop.jpg" alt="kop" id="kop">
    <hr>
    <br>
    <table>
        <thead>
            <th>Nopol</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Awal PKB</th>
            <th>Tanggal Akhir PKB</th>
            <th>Rak</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        {{ $item->stnk ? $item->stnk->nopol : '-' }}
                    </td>
                    <td>{{ $item->stnk ? $item->stnk->nama : '-' }}</td>
                    <td>{{ $item->stnk ? $item->stnk->alamat : '-' }}</td>
                    <td>{{ $item->stnk ? \Carbon\Carbon::parse($item->stnk->tgl_awal_pkb)->isoFormat('D-M-Y') : '-' }}
                    </td>
                    <td>
                        {{ $item->rc ? \Carbon\Carbon::parse($item->rc->tgl_akhir_pkb)->isoFormat('D-M-Y') : '-' }}
                    </td>
                    <td>
                        {{ $item->rak ? $item->rak->kode : '-' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
