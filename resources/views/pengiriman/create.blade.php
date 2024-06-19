@extends('layout.index')
@section('titles', 'Input Pengiriman')
@section('content')
    <br>
    <form action="{{ url('pengiriman') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row mr-5 ml-5">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Input Data Pengiriman</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="sopir_id">Pilih Sopir</label>
                                        <select class="form-control ml-2" name="sopir_id" id="sopir_id"
                                            class="form-control" required>
                                            <option value="">Pilih Data Sopir</option>
                                            @foreach ($sopir as $s)
                                                <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="sopir_id">Pilih Mobil</label>
                                        <select class="form-control ml-2" name="mobil_id" id="mobil_id"
                                            class="form-control" required>
                                            <option value="">Pilih Data Mobil</option>
                                            @foreach ($mobil as $m)
                                                <option value="{{ $m->id }}">{{ $m->merk }} {{ $m->kapasitas }}
                                                    Liter</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Perusahaan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="perusahaan" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Date Order</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="date_order" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Qty. (Liter)</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="liter" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jarak (km)</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="jarak" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tarif (Rp.)</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="tarif" class="form-control ml-2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden>
                                        <label class="col-sm-2 col-form-label">Total</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="total" class="form-control ml-2" required>
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
