@extends('layout.index')
@section('content')
    <br>
    <form action="{{ url('pengiriman/' . $pengiriman->id) }}" method="POST" enctype="multipart/form-data">
        @csrfx  
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
                                    <label class="mt-5" for="">Apakah Anda Yakin Untuk Menerima Pengiriman ke
                                        Perusahaan :
                                        <br>
                                        {{ $pengiriman->perusahaan }} ?</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm d-flex justify-content-center">
                                        <fieldset class="row ml-2">
                                            <div class="mr-4 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="gridRadios1" value="pick_up"
                                                        {{ $pengiriman->status == 'pick_up' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Terima
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                        id="gridRadios2" value="pending"
                                                        {{ $pengiriman->status == 'pending' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Cancel
                                                    </label>
                                                </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Sopir</label>
                            <div class="col-sm-10">
                                <input type="text" name="sopir_id" value="{{ $pengiriman->sopir_id }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Mobil</label>
                            <div class="col-sm-10">
                                <input type="text" name="mobil_id" value="{{ $pengiriman->mobil_id }} "
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Perusahaan</label>
                            <div class="col-sm-10">
                                <input type="text" name="perusahaan" value="{{ $pengiriman->perusahaan }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" value="{{ $pengiriman->alamat }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Tanggal Pesan</label>
                            <div class="col-sm-2">
                                <input type="date" name="date_order" value="{{ $pengiriman->date_order }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" name="status" value="{{ $pengiriman->status }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Liter</label>
                            <div class="col-sm-10">
                                <input type="text" name="liter" value="{{ $pengiriman->liter }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Jarak</label>
                            <div class="col-sm-10">
                                <input type="text" name="jarak" value="{{ $pengiriman->jarak }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Tarif</label>
                            <div class="col-sm-10">
                                <input type="text" name="tarif" value="{{ $pengiriman->tarif }}"
                                    class="form-control ml-2" required>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-10">
                                <input type="text" name="total" value="{{ $pengiriman->total }}"
                                    class="form-control ml-2" required>
                            </div>
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
    </form>
    @endsection
    {{-- <video id="video" width="640" height="480" autoplay></video> --}}
    {{-- <button id="snap">Capture</button> --}}
    {{-- <canvas id="canvas" width="640" height="480"></canvas> --}}

@push('scripts')
    <script>
        const video = document.getElementById('video');

        // Dapatkan akses ke kamera
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                video: true
            }).then(function(stream) {
                video.srcObject = stream;
                video.play();
            }).catch(function(error) {
                console.log("Ada masalah mengakses kamera: ", error);
            });
        }
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        const snapButton = document.getElementById('snap');

        snapButton.addEventListener('click', function() {
            context.drawImage(video, 0, 0, 640, 480);
        });
    </script>
@endpush
