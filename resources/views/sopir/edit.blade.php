@extends('layout.index')
@section('titles', 'Edit Data Sopir')
@section('content')
    <br>
    <form action="{{ url('sopir/' . $sopir->id) }}" method="POST" enctype="multipart/form-data">
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
                                <h3 class="card-title">Form Edit Data {{ $sopir->nama }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row" hidden>
                                        <label class="col-sm-2 col-form-label">ID</label>
                                        <div class="col-sm-2">
                                            <input type="text " name="id" value="{{ $sopir->id }}" id="id"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                                        <div class="col-sm-2">
                                            <input type="text" value="{{ $sopir->nama }}" name="nama"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="nik">NIK</label>
                                        <div class="col-sm-2">
                                            <input type="number" value="{{ $sopir->nik }}" name="nik"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="tgl_lahir">Tanggal Lahir</label>
                                        <div class="col-sm-2">
                                            <input type="date" value="{{ $sopir->tgl_lahir }}" name="tgl_lahir"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                                        <div class="col-sm-2">
                                            <input type="text" value="{{ $sopir->alamat }}" name="alamat"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                                        <div class="col-sm-2">
                                            <input type="email" value="{{ $sopir->email }}" name="email"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="no_hp">No. Telp</label>
                                        <div class="col-sm-2">
                                            <input type="number" value="{{ $sopir->no_hp }}" name="no_hp"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="tgl_lahir">Masa SIM</label>
                                        <div class="col-sm-2">
                                            <input type="date" value="{{ $sopir->masa_sim }}" name="masa_sim"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden>
                                        <label class="col-sm-2 col-form-label mt-2">Status</label>
                                        <div class="col-sm-2">
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="{{ $sopir->status }}" hidden>
                                                        {{ $sopir->status }}</option>
                                                    <option value="ready">Ready</option>
                                                    <option value="delivery">Delivery</option>
                                                </select>
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
