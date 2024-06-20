@extends('layout.index')
@section('titles', 'Akun')
@section('content')
    <br>
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-3">Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- <a style="width: 200px" class="btn btn-primary mb-3" href="{{ url('akun/create') }}">
                        Tambah Akun
                    </a> --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableCuti" class="table table-bordered table-hover">
                                    <thead>
                                        <tr align="center">

                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Access</th>
                                            {{-- @if (Auth::akun()->role === 'A') --}}
                                            <th>AKSI</th>
                                            {{-- @endif --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($akun as $data)
                                            <tr>
                                                <td>{{ $data->sopir->nama }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>
                                                    {{ substr(str_repeat('*', strlen($data->password)), 0, 8) }}
                                                </td>
                                                <td class="text-capitalize">{{ $data->role }}</td>
                                                <td align="center">
                                                    <a href="{{ route('akun.edit', $data->id) }}"
                                                        class="btn btn-warning mr-2">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form style="display: inline"
                                                        action="{{ route('akun.destroy', $data->id) }}" method="POST">
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
