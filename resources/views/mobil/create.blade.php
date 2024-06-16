@extends('layout.index')

@section('content')
    <br>
    <form action="{{ url('mobil') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row mr-5 ml-5">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Input Data Mobil</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nomor Polisi</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nopol" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Merk</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="merk" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label mt-2">Status</label>
                                        <div class="col-sm-10">
                                            <form>
                                                <div class="row ">
                                                    <div class="col-sm-2 form-group">
                                                        <select class="form-control ml-2" name="status" required>
                                                            <option value="ready">Ready</option>
                                                            <option value="delivery">On Delivery</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label mt-2">Kapasitas</label>
                                        <div class="col-sm-10">
                                            <form>
                                                <div class="row ">
                                                    <div class="col-sm-2 form-group">
                                                        <select class="form-control ml-2" name="kapasitas" required>
                                                            <option value="8000l">8000 Liter</option>
                                                            <option value="16000l">16000 Liter</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Masa STNK</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="masa_stnk" class="form-control ml-2" required>
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
