@extends('layout.index')
@section('titles', 'Edit Jenis Minyak')
@section('content')
<br>
<form action="{{ url('jenis/' . $jenis->id) }}" method="POST" enctype="multipart/form-data">
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
                            <h3 class="card-title">Edit Jenis Minyak {{$jenis->nama}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Jenis</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="nama" value="{{$jenis->nama}}" id="nama" class="form-control">
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
