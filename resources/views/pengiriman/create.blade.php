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
                                <label for="sopir_id">Sopir:</label>
                                <select name="sopir_id" id="sopir_id" class="form-control" required>
                                    <option value="">Select Sopir</option>
                                    @foreach($sopir as $sopir)
                                        <option value="{{ $sopir->id }}">{{ $sopir->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mobil_id">Mobil:</label>
                                <select name="mobil_id" id="mobil_id" class="form-control" required>
                                    <option value="">Select Mobil</option>
                                    @foreach($mobil as $mobil)
                                        <option value="{{ $mobil->id }}">{{ $mobil->kapasitas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan:</label>
                                <input type="text" name="perusahaan" id="perusahaan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date_order">Date Order:</label>
                                <input type="date" name="date_order" id="date_order" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="liter">Liter:</label>
                                <input type="number" name="liter" id="liter" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jarak">Jarak:</label>
                                <input type="number" name="jarak" id="jarak" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tarif">Tarif:</label>
                                <input type="number" name="tarif" id="tarif" class="form-control" required>
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
