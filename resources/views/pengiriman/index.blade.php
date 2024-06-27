@extends('layout.index')
@section('titles', 'Pengiriman')
@section('content')
    <br>
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-3">Pengiriman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Pengiriman</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (Auth::user()->role == 'admin')
                        <a style="width: 200px" class="btn btn-primary mb-3" href="{{ url('pengiriman/create') }}">
                            Tambah Pengiriman
                        </a>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pengiriman</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablePengiriman" class="table table-bordered table-hover">
                                    <thead>
                                        <tr align="center">

                                            <th>Perusahaan</th>
                                            <th>Tujuan</th>
                                            <th>Sopir</th>
                                            <th>Mobil</th>
                                            <th>Jenis</th>
                                            {{-- <th>Tanggal Transaksi</th> --}}
                                            {{-- <th>Liter</th> --}}
                                            {{-- <th>Jarak</th> --}}
                                            {{-- <th>Tarif</th> --}}
                                            @if (Auth::user()->role == 'admin')
                                                <th>Total</th>
                                            @endif
                                            <th>Status</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengiriman as $data)
                                            @if (Auth::user()->role === 'admin' or Auth::user()->sopir->id == $data->sopir->id)
                                                <tr>
                                                    <td>{{ $data->perusahaan }}</td>
                                                    <td>{{ $data->alamat }}</td>
                                                    <td>{{ $data->sopir->nama }}</td>
                                                    <td>{{ $data->mobil->nopol }}</td>
                                                    <td class="text-capitalize">{{ $data->jenis }}</td>
                                                    {{-- <td>{{ $data->date_order }}</td> --}}
                                                    {{-- <td>{{ $data->liter }}</td> --}}
                                                    {{-- <td>{{ $data->jarak }}</td> --}}
                                                    {{-- <td>{{ $data->tarif }}</td> --}}
                                                    @if (Auth::user()->role == 'admin')
                                                        <td>Rp.{{ number_format($data->total, 3, ',', '.') }}</td>
                                                    @endif
                                                    <td align="center" style="font-size: 22px">
                                                        @if ($data->status == 'pending')
                                                            <span style="color: white"
                                                                class="badge badge-secondary text-capitalize">{{ $data->status }}</span>
                                                        @elseif ($data->status == 'pick_up')
                                                            <span style="color: white"
                                                                class="badge badge-success text-capitalize">{{ $data->status }}</span>
                                                        @elseif ($data->status == 'on_delivery')
                                                            <span style="color: white"
                                                                class="badge badge-success text-capitalize">{{ $data->status }}</span>
                                                        @elseif ($data->status == 'arrived')
                                                        <span style="color: white" class="badge badge-primary text-capitalize" data-toggle="modal" data-target="#statusModal{{ $data->id }}">{{ $data->status }}</span>
                                                        @if (Auth::user()->role === 'admin')
                                                        <div class="modal fade" id="statusModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel{{ $data->id }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <h5 class="modal-title" id="statusModalLabel{{ $data->id }}">Bukti Foto</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img style="width: 360px" src="{{ $data->foto ? asset('fotos/' . $data->foto) : asset('assets/') }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>


                                                                {{-- <button type="button" class="btn btn-link"
                                                                    data-toggle="modal"
                                                                    data-target="#fotoModal{{ $data->id }}"
                                                                    data-foto-path="{{ asset($data->foto) }}">
                                                                    <i class="fas fa-image"></i>
                                                                </button>

                                                                <div class="modal fade" id="fotoModal{{ $data->id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="fotoModalLabel{{ $data->id }}"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered"
                                                                        role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="fotoModalLabel{{ $data->id }}">
                                                                                    Foto Pengiriman</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body"
                                                                                onclick="closeModal('fotoModal{{ $data->foto }}')">
                                                                                <img id="fotoModalImage{{ $data->foto }}"
                                                                                    class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td align="center">
                                                        @if (Auth::user()->role === 'sopir')
                                                            <a href="{{ route('pengiriman.edit', $data->id) }}"
                                                                class="btn btn-warning mr-2">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                        @endif
                                                        @if (Auth::user()->role === 'admin')
                                                            <a href="{{ url('pengiriman/pdf', $data->id) }}" method="POST"
                                                                class="btn btn-success mr-2">
                                                                <i class="fas fa-print"></i>
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            function closeModal(modalId) {
                $('#' + modalId).modal('hide');
            }

            $('[data-toggle="modal"]').click(function() {
                var fotoPath = $(this).data('foto-path');
                var modalId = $(this).data('target');
                $(modalId).find('img').attr('src', fotoPath);
            });
        });
    </script>
@endpush
