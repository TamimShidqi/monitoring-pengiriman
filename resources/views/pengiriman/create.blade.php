@extends('layout.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Create Pengiriman
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengiriman.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="sopir_id">Sopir:</label>
                                <select name="sopir_id" id="sopir_id" class="form-control" required>
                                    <option value="">Pilih Sopir</option>
                                    @foreach ($sopir as $sopir)
                                        <option value="{{ $sopir->id }}">{{ $sopir->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="mobil_id">Mobil:</label>
                                <select name="mobil_id" id="mobil_id" class="form-control" required>
                                    <option value="">Pilih Mobil</option>
                                    @foreach ($mobil as $mobil)
                                        <option value="{{ $mobil->id }}">{{ $mobil->nopol }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="perusahaan">Perusahaan:</label>
                                <input type="text" name="perusahaan" id="perusahaan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="date_order">Date Order:</label>
                                <input type="date" name="date_order" id="date_order" class="form-control" required
                                    min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="jenis_id">Jenis:</label>
                                <select name="jenis_id" id="jenis_id" class="form-control" required>
                                    <option value="">Pilih Jenis</option>
                                    @foreach ($jenis as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2">Liter:</label>
                                <select class="form-control" name="liter" required>
                                    <option value="" selected>Pilih Liter</option>
                                    <option value="1">1000</option>
                                    <option value="2">2000</option>
                                    <option value="3">3000</option>
                                    <option value="4">4000</option>
                                    <option value="5">5000</option>
                                    <option value="6">6000</option>
                                    <option value="7">7000</option>
                                    <option value="8">8000</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="jarak">Jarak /km:</label>
                                <input type="number" name="jarak" id="jarak" class="form-control" required
                                    step="0.1">
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label mt-2" for="tarif">Tarif:</label>
                                <input type="number" name="tarif" id="tarif" class="form-control" value="2700" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Your JavaScript code here
        });
    </script>
@endpush
