@extends('layout.index')
@section('content')
    <br>
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-3">Sopir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sopir</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <a style="width: 200px" class="btn btn-primary mb-3" href="{{ url('sopir/create') }}">
                        Tambah Sopir
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Sopir</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableCuti" class="table table-bordered table-hover">
                                    <thead>
                                        <tr align="center">

                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Masa SIM</th>
                                            <th>Status</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sopir as $data)
                                            <tr>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->nik }}</td>
                                                <td>{{ $data->tgl_lahir }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->no_hp }}</td>
                                                <td>{{ $data->masa_sim }}</td>
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
                                                    <a href="{{ route('sopir.edit', $data->id) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form style="display: inline"
                                                        action="{{ route('sopir.destroy', $data->id) }}" method="POST">
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
