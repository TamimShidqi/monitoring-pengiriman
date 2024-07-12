@extends('layout.index')
@section('titles', 'Data Jenis Minyak')
@section('content')
    <br>
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-3">Jenis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Jenis</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <a style="width: 200px" class="btn btn-primary mb-3" href="{{ url('jenis/create') }}">
                        Tambah Jenis
                    </a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Minyak</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableJenis" class="table table-bordered table-hover">
                                    <thead>
                                        <tr align="center">

                                            <th>Nama</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenis as $data)
                                            <tr>
                                                <td>{{ $data->nama }}</td>
                                                <td align="center">
                                                    <a href="{{ route('jenis.edit', $data->id) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form style="display: inline"
                                                        action="{{ route('jenis.destroy', $data->id) }}" method="POST">
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
