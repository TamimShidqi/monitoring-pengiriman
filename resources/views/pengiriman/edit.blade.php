@extends('layout.index')
@section('content')
    <br>
    <form action="{{ url('pengiriman/' . $pengiriman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col mr-5 ml-5">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Konfirmasi Pengiriman</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <input type="hidden" name="_method" value="PATCH">
                            <form class="form-horizontal">
                                <div align="center">
                                   <label class="mt-5" for="">Apakah Anda Yakin Untuk Menerima Pengiriman ke Perusahaan : 
                                       <br>
                                       {{ $pengiriman->perusahaan }} ?</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm d-flex justify-content-center">
                                        <fieldset class="row ml-2">
                                            <div class="mr-4 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                    id="gridRadios2" value="status" name="status"
                                                    {{ $pengiriman->status == 'pick_up' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="pick_up" value="{{ $pengiriman->status}}">
                                                        Yes
                                                    </label>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="gridRadios1" value="pending" name="status"
                                                        {{ $pengiriman->status == 'pending' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="pending" value="{{ $pengiriman->status}}">
                                                        Cancel
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Sopir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sopir_id" value="{{ $pengiriman->sopir_id }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Mobil</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="mobil_id" value="{{ $pengiriman->mobil_id }} " class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Perusahaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="perusahaan" value="{{ $pengiriman->perusahaan }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" value="{{ $pengiriman->alamat }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Tanggal Pesan</label>
                                    <div class="col-sm-2">
                                        <input type="date" name="date_order" value="{{ $pengiriman->date_order }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="status" value="{{ $pengiriman->status }}" class="form-control ml-2" required>
                                    </div>
                                </div>

                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Liter</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="liter" value="{{ $pengiriman->liter }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Jarak</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="jarak" value="{{ $pengiriman->jarak }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Tarif</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tarif" value="{{ $pengiriman->tarif }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="total" value="{{ $pengiriman->total }}" class="form-control ml-2" required>
                                    </div>
                                </div>
                                <br>
                                {{-- <div class="form-group row" hidden>
                                    <label for="exampleInputFile" class="col-sm-2 col-form-label">~Upload Foto</label>
                                    <div class="col-sm-2 input-group">
                                        <div class="custom-file">
                                            <input type="file" name="fotocalon" >
                                        </div>
                                    </div>
                                    @if (strlen($pendaftarans->fotocalon) > 0)
                                        ok
                                            <img src="{{ asset('p_fotocalons/' . $pendaftarans->fotocalon) }}" style="max-height: 250px">
                                        @endif
                                </div> --}}
                                <div align="center" class="mb-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('pengiriman') }}"
                                        class="btn btn-danger">
                                        Batal
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
