@extends('layout.index')
@section('content')
    <br>
    <form action="{{ url('pengiriman/' . $pengiriman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($pengiriman->status == 'pending')
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
                                        <label class="mt-5" for="">Konfirmasi untuk melakukan Pengiriman ke
                                            Perusahaan :
                                            <br>
                                            {{ $pengiriman->perusahaan }} ?</label>
                                    </div>
                                    <input type="hidden" name="sopir_id" value="{{ $pengiriman->sopir_id }}">
                                    <input type="hidden" name="mobil_id" value="{{ $pengiriman->mobil_id }}">
                                    <input type="hidden" name="perusahaan" value="{{ $pengiriman->perusahaan }}">
                                    <input type="hidden" name="alamat" value="{{ $pengiriman->alamat }}">
                                    <input type="hidden" name="date_order" value="{{ $pengiriman->date_order }}">
                                    <input type="hidden" name="jenis_id" value="{{ $pengiriman->jenis_id }}">
                                    <input type="hidden" name="liter" value="{{ $pengiriman->liter }}">
                                    <input type="hidden" name="jarak" value="{{ $pengiriman->jarak }}">
                                    <input type="hidden" name="tarif" value="{{ $pengiriman->tarif }}">
                                    <input type="hidden" name="total" value="{{ $pengiriman->total }}">
                                    <div class="form-group row">
                                        <div class="col-sm d-flex justify-content-center">
                                            <fieldset class="row ml-2">
                                                <div class="mr-4 ">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="statusTerima" value="pick_up"
                                                            {{ $pengiriman->status == 'pick_up' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="statusTerima">
                                                            Terima
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="statusCancel" value="pending"
                                                            {{ $pengiriman->status == 'pending' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="statusCancel">
                                                            Cancel
                                                        </label>
                                                    </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div align="center" class="mb-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('pengiriman') }}" class="btn btn-danger">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if ($pengiriman->status == 'pick_up')
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col mr-5 ml-5">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Konfirmasi Status Pengiriman</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <input type="hidden" name="_method" value="PATCH">
                                <form class="form-horizontal">
                                    <div align="center">
                                        <label class="mt-5" for="">Konfirmasi untuk Mengirim ke
                                            Perusahaan :
                                            <br>
                                            {{ $pengiriman->perusahaan }} ?</label>
                                    </div>
                                    <input type="hidden" name="sopir_id" value="{{ $pengiriman->sopir_id }}">
                                    <input type="hidden" name="mobil_id" value="{{ $pengiriman->mobil_id }}">
                                    <input type="hidden" name="perusahaan" value="{{ $pengiriman->perusahaan }}">
                                    <input type="hidden" name="alamat" value="{{ $pengiriman->alamat }}">
                                    <input type="hidden" name="date_order" value="{{ $pengiriman->date_order }}">
                                    <input type="hidden" name="jenis_id" value="{{ $pengiriman->jenis_id }}">
                                    <input type="hidden" name="liter" value="{{ $pengiriman->liter }}">
                                    <input type="hidden" name="jarak" value="{{ $pengiriman->jarak }}">
                                    <input type="hidden" name="tarif" value="{{ $pengiriman->tarif }}">
                                    <input type="hidden" name="total" value="{{ $pengiriman->total }}">
                                    <div class="form-group row">
                                        <div class="col-sm d-flex justify-content-center">
                                            <fieldset class="row ml-2">
                                                <div class="mr-4 ">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="statusTerima" value="on_delivery"
                                                            {{ $pengiriman->status == 'on_delivery' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="statusTerima">
                                                            Kirim
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="statusCancel" value="pick_up"
                                                            {{ $pengiriman->status == 'pick_up' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="statusCancel">
                                                            Cancel
                                                        </label>
                                                    </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div align="center" class="mb-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('pengiriman') }}" class="btn btn-danger">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if ($pengiriman->status == 'on_delivery')
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col mr-5 ml-5">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Konfirmasi Pengiriman</h3>
                                </div>
                                <div align="center">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="sopir_id" value="{{ $pengiriman->sopir_id }}">
                                    <input type="hidden" name="mobil_id" value="{{ $pengiriman->mobil_id }}">
                                    <input type="hidden" name="perusahaan" value="{{ $pengiriman->perusahaan }}">
                                    <input type="hidden" name="alamat" value="{{ $pengiriman->alamat }}">
                                    <input type="hidden" name="date_order" value="{{ $pengiriman->date_order }}">
                                    <input type="hidden" name="jenis_id" value="{{ $pengiriman->jenis_id }}">
                                    <input type="hidden" name="liter" value="{{ $pengiriman->liter }}">
                                    <input type="hidden" name="jarak" value="{{ $pengiriman->jarak }}">
                                    <input type="hidden" name="tarif" value="{{ $pengiriman->tarif }}">
                                    <input type="hidden" name="total" value="{{ $pengiriman->total }}">
                                    <input type="hidden" name="status" value="arrived" required>
                                    <input type="file" name="foto">
                                </div>
                            </div>
                            <br>
                            <div align="center" class="mb-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('pengiriman') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </form>
@endsection
