@extends('layout.index')
@section('titles', 'Data Mobil')
@section('content')
    <br>
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-3">Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mobil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <a style="width: 200px" class="btn btn-primary mb-3" href="{{ url('mobil/create') }}">
                        Tambah Mobil
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Mobil</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableCuti" class="table table-bordered table-hover">
                                    <thead>
                                        <tr align="center">

                                            <th>Nomor Polisi</th>
                                            <th>Merk</th>
                                            <th>Kapasitas</th>
                                            <th>Masa STNK</th>
                                            <th>Status</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mobil as $data)
                                            <tr>
                                                <td>{{ $data->nopol }}</td>
                                                <td>{{ $data->merk }}</td>
                                                <td>{{ $data->kapasitas }} Liter</td>
                                                <td>{{ $data->masa_stnk }}</td>
                                                <td align="center" style="font-size: 22px">
                                                    @if ($data->status == 'ready')
                                                        <span style="color: white"
                                                            class="badge badge-primary text-capitalize">{{ $data->status }}</span>
                                                    @elseif ($data->status == 'delivery')
                                                        <span style="color: white"
                                                            class="badge badge-success text-capitalize">{{ $data->status }}</span>
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    <a href="{{ route('mobil.edit', $data->id) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form style="display: inline"
                                                        action="{{ route('mobil.destroy', $data->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger mr-2" type="submit"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
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
