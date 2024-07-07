<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pengiriman</title>
    <style>
        .container {
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 4px;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .badge-secondary {
            background-color: #6c757d;
        }

        .badge-success {
            background-color: #28a745;
        }

        .fas {
            margin-right: 5px;
        }

        .fa-print {
            color: #fff;
        }

        .fa-edit {
            color: #fff;
        }

        .fa-trash-alt {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Pengiriman</h1>
        <table id="tableHistory" class="table table-bordered table-hover">
            <thead>
                <tr align="center">

                    <th>Perusahaan</th>
                    <th>Tujuan</th>
                    <th>Sopir</th>
                    <th>Mobil</th>
                    <th>Tanggal Transaksi</th>
                    <th>Liter</th>
                    <th>Jarak</th>
                    @if (Auth::user()->role == 'admin')
                        <th>Tarif</th>
                        <th>Total</th>
                    @endif
                    <th>updated_at</th>
                </tr>
            </thead>
            @foreach ($history as $data)
                @if (Auth::user()->role === 'admin' or Auth::user()->sopir->id == $data->sopir->id)
                    <tbody>
                        <tr>
                            <td>{{ $data->perusahaan }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->sopir->nama }}</td>
                            <td>{{ $data->mobil->nopol }}</td>
                            <td>{{ $data->date_order }}</td>
                            <td>{{ $data->liter }}</td>
                            <td>{{ $data->jarak }}</td>
                            @if (Auth::user()->role == 'admin')
                                <td>{{ $data->tarif }}</td>
                                <td>Rp.{{ number_format($data->total, 3, ',', '.') }}</td>
                            @endif
                            <td>{{ $data->updated_at }}</td>
                        </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
