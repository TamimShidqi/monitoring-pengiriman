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
                        <div class="col mr-5 ml-5">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Konfirmasi Pengiriman</h3>
                                </div>
                                <input type="hidden" name="_method" value="PATCH">
                                <video id="video" width="480" height="480" autoplay></video>
                                <canvas class="col-sm-2" id="canvas" width="480" height="360"></canvas>
                                <input type="hidden" name="status" value="on_delivery">
                                <button id="snap" class="btn btn-primary">Capture</button>
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
                                <input type="hidden" name="_method" value="PATCH">
                                <video id="video" width="480" height="480" autoplay></video>
                                <canvas class="col-sm-3" id="canvas" width="480" height="360"></canvas>
                                <input type="hidden" name="status" value="arrived">
                                <button id="snap" class="btn btn-primary">Capture</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </form>
@endsection

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
        const snapButton = document.getElementById('snap');
        snapButton.addEventListener('click', capture);

        function capture() {
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            localStorage.setItem('image', canvas.toDataURL());
        }
    </script>
@endpush
