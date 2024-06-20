@extends('layout.index')
@section('titles', 'Pengiriman')
@section('content')
    <br>
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-3">Pengiriman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Pengiriman</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <a style="width: 200px" class="btn btn-primary mb-3" href="{{ url('pengiriman/create') }}">
                        Tambah Pengiriman
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pengiriman</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableCuti" class="table table-bordered table-hover">
                                    <thead>
                                        <tr align="center">

                                            <th>Perusahaan</th>
                                            <th>Tujuan</th>
                                            <th>Sopir</th>
                                            <th>Mobil</th>
                                            {{-- <th>Tanggal Transaksi</th> --}}
                                            {{-- <th>Liter</th> --}}
                                            {{-- <th>Jarak</th> --}}
                                            {{-- <th>Tarif</th> --}}
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengiriman as $data)
                                            <tr>
                                                <td>{{ $data->perusahaan }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>{{ $data->sopir->nama }}</td>
                                                <td>{{ $data->mobil->nopol }}</td>
                                                {{-- <td>{{ $data->date_order }}</td> --}}
                                                {{-- <td>{{ $data->liter }}</td> --}}
                                                {{-- <td>{{ $data->jarak }}</td> --}}
                                                {{-- <td>{{ $data->tarif }}</td> --}}
                                                <td>Rp.{{ number_format($data->total, 3, ',', '.') }}</td>
                                                <td align="center" style="font-size: 22px">
                                                    @if ($data->status == 'pending')
                                                        <span style="color: white"
                                                            class="badge badge-secondary text-capitalize">{{ $data->status }}</span>
                                                    @elseif ($data->status == 'pick_up')
                                                        <span style="color: white"
                                                            class="badge badge-success text-capitalize">{{ $data->status }}</span>
                                                    @elseif ($data->status == 'on_delivery')
                                                        <span style="color: white"
                                                            class="badge badge-success">{{ $data->status }}</span>
                                                    @elseif ($data->status == 'arrived')
                                                        <span style="color: white"
                                                            class="badge badge-primary">{{ $data->status }}</span>
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    {{-- @if (session('user')[0]['jabatan'] == 'Manager') --}}
                                                    <a href="{{ route('pengiriman.edit', $data->id) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    {{-- @endif --}}
                                                    <form style="display: inline"
                                                        action="{{ route('pengiriman.destroy', $data->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger mr-2" type="submit"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                    <a href="{{ route('pengiriman.cetakpdf', $data->id) }}" method="POST"
                                                        class="btn btn-success mr-2">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
