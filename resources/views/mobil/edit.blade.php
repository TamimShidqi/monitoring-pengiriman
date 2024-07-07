@extends('layout.index')
@section('titles', 'Update STNK Mobil')
@section('content')
<br>
<form action="{{ url('mobil/' . $mobil->id) }}" method="POST" enctype="multipart/form-data">
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
                            <h3 class="card-title">Update STNK Mobil {{$mobil->merk}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="id" value="{{$mobil->id}}" id="id" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label" for="email">Nomor Polisi</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $mobil->nopol }}" name="nopol" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label" for="password">Merk</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $mobil->merk }}" name="merk" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label" for="kapasitas">Kapasitas</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="{{ $mobil->kapasitas }}" name="kapasitas" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row d-flex justify-content-center">
                                    <label class="col-sm-2 col-form-label" for="masa_stnk">Masa STNK</label>
                                    <div class="col-sm-2">
                                        <input type="date" value="{{ $mobil->masa_stnk }}" name="masa_stnk" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label mt-2">Status</label>
                                    <div class="col-sm-10">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-2 form-group">
                                                    <select class="form-control" id="status" name="status" required readonly>
                                                        <option value="{{ $mobil->status }}" hidden>{{ $mobil->status }}</option>
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
