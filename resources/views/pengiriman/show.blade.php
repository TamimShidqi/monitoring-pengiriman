@extends('layout.index')

@section('content')
    <div class="container">
        <h2>Detail Pengiriman</h2>
        <p>Nama Pengirim: {{ $pengiriman->sopir_id  }}</p>
        <p>Alamat Pengirim: {{ $pengiriman->mobil_id  }}</p>
        <p>Nama Penerima: {{ $pengiriman->perusahaan }}</p>
        <p>Alamat Penerima: {{ $pengiriman->alamat }}</p>
        <p>Status: {{ $pengiriman->status }}</p>
    </div>
@endsection
