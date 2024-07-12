<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Jalan Pengiriman Minyak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
        }
        .header h1, .header h2 {
            margin: 0;
        }
        .content {
            margin: 20px 0;
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
        .signature {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            width: 45%;
            text-align: center;
        }
        .signature div p {
            margin: left;
        }
    </style>
    </head>
<body>
    <div class="container">
        <div class="header">
            {{-- <img src="public/logo.png" style="position: absolute; left: 10px; top: 10px; width: 100px;"> --}}
            <h1>PT. Dul Jaya Sempurna</h1>
            <h2>Surat Jalan Pengiriman Minyak</h2>
            <p>JL. Kemarogan RT.11 No. 551 Kemasrindo Kertapati, Palembang</p>
            <p>Telp: 0821-8446-2270 | Email: mamadia.palembang@yahoo.com</p>
        </div>

        <div class="content">
            <table>
                <tr>
                    <th>No. Surat Jalan</th>
                    <td>{{$pengiriman->id}}</td>
                    <th>Tanggal</th>
                    <td>{{$pengiriman->date_order}}</td>
                </tr>
                <tr>
                    <th>Pengirim</th>
                    <td>PT. Dul Jaya Sempurna</td>
                    <th>Penerima</th>
                    <td>{{$pengiriman->perusahaan}}</td>
                </tr>
                <tr>
                    <th>Alamat Pengirim</th>
                    <td>JL. Kemarogan RT.11 No. 551 KemasrindoKertapati, Palembang</td>
                    <th>Alamat Penerima</th>
                    <td>{{$pengiriman->alamat}}</td>
                </tr>
                <tr>
                    <th>Nomor Kendaraan</th>
                    <td>{{$pengiriman->mobil->nopol}}</td>
                    <th>Nama Supir</th>
                    <td>{{$pengiriman->sopir->nama}}</td>
                </tr>
            </table>

            <h3>Detail Barang</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Minyak</td>
                        <td class="text-capitalize">{{$pengiriman->jenis->nama}}</td>
                        <td>{{$pengiriman->liter}}000</td>
                        <td>Liter</td>
                    </tr>
                </tbody>
            </table>
        </div>
<br>
        <div class="signature">
            {{-- <div>
                <p>Sopir</p>
                <br><br>
                <p>________________________</p>
                <p>(Nama Pengirim)</p>
            </div>
            <br> --}}
            <div>
                <p>Penerima</p>
                <br><br>
                <p>________________________</p>
                {{-- <p>(Nama Penerima)</p> --}}
            </div>
        </div>

        <div class="footer">
            <br><br>
            <p>Terima kasih atas kerjasamanya.</p>
        </div>
    </div>
</body>
</html>
