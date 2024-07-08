@extends('layout.index')
@section('titles', 'Input Sopir')
@section('content')
    <br>
    <form action="{{ url('sopir') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row mr-5 ml-5">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Input Data Sopir</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nik" class="form-control ml-2" required min="16" max="16">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="tgl_lahir" value="." class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No. Telp</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="no_hp" class="form-control ml-2" required min="11" max="13">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Masa SIM</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="masa_sim" class="form-control ml-2" required min="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                    <div align="center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
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
