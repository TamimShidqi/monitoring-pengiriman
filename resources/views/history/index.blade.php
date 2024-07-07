@extends('layout.index')

@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif

    <div class="container">
        <h1>Riwayat Pengiriman</h1>
        @if (Auth::user()->role == 'admin')
            <a href="{{ url('download-pdf') }}" class="btn btn-success mr-2">
                <i class="fas fa-print"></i>
            </a>
        @endif

        <!-- Form untuk filter berdasarkan date_order -->
        <form method="GET" action="{{ url('history') }}">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ request('start_date') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="end_date">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                        value="{{ request('end_date') }}">
                </div>
                <div class="form-group col-md-4 align-self-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

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
                        <th>Foto</th>
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
                                <td> <img style="width: 40px"
                                        src="{{ $data->foto ? asset('fotos/' . $data->foto) : asset('assets/') }}">
                                </td>
                            @endif
                            <td>{{ $data->updated_at }}</td>
                        </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
