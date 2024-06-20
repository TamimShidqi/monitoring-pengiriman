@extends('layout.index')
@section('titles', 'Edit Akun')
@section('content')
<br>
<form action="{{ url('akun/' . $akun->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PATCH">

    <section class="content">
        <div class="container-fluid">
            <div class="row mr-5 ml-5">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit akun {{$akun->sopir->nama}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Nama Akun</label>
                                    <div class="col-sm-10" >
                                        <select name="sopir_id" class="form-control">
                                            <option class="form-control" hidden value="{{$akun->sopir_id}}">{{$akun->sopir->nama}}</option>
                                            <option class="form-control" disabled>~Pilih Nama Sopir~</option>
                                            @foreach ($sopir as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-2">
                                        <input type="text " name="sopir_id" value="{{$akun->id}}" id="sopir_id" class="form-control text-capitalize"
                                            id="exampleInputPassword1" readonly>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                                    <div class="col-sm-2">
                                        <input type="email" value="{{ $akun->email }}" name="email" class="form-control" id="exampleInputPassword1" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                                    <div class="col-sm-2">
                                        <input type="password" value="{{ $akun->password }}" name="password" class="form-control" id="exampleInputPassword1" >
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label mt-2">Role</label>
                                    <div class="col-sm-10">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-2 form-group">
                                                    <select class="form-control" id="role" name="role" required>
                                                        <option value="{{ $akun->role }}" hidden>
                                                            {{ $akun->role }}</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="sopir">Sopir</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                <div align="center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
