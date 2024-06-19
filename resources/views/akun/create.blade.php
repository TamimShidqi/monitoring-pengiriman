@extends('layout.index')
@section('titles', 'Input Akun')
@section('content')
    <br>
    <form action="{{ url('akun') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row mr-5 ml-5">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Input Data Akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div>
                                            <label for="sopir_id">Pilih Data Sopir :</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" name="sopir_id" id="id" hidden>
                                            <input type="text" id="nik" class="form-control"
                                                placeholder="Pilih Data Sopir" autofocus>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal"
                                                    data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
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
        <div class="modal fade" id="modal-item">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Select Data Sopir</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr align="center">
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No telp</th>
                                    <th>Masa SIM</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sopir as $data)
                                    {{-- @if (session('user')[0]['jabatan'] == 'Manager' and Session::get('user')[0]['lokasi'] == $data->lokasi) --}}
                                        <tr>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->tgl_lahir}}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td>{{ $data->masa_sim }}</td>
                                            <td align="center">
                                                <button data-dismiss="modal" class="btn btn-xs btn-info" id="select"
                                                    data-id="{{ $data->id }}"
                                                    data-nik="{{ $data->nik }}"
                                                    data-nama="{{ $data->nama }}"
                                                    data-tgl_lahir="{{ $data->tgl_lahir }}"
                                                    data-no_hp="{{ $data->no_hp }}"
                                                    data-masa_sim="{{ $data->masa_sim }}">
                                                    <i class="fa fa-check"></i>Select
                                                </button>
                                            </td>
                                        </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                var id = $(this).data('id');
                var nik = $(this).data('nik');
                var nama = $(this).data('nama');
                var tgl_lahir = $(this).data('tgl_lahir');
                var no_hp = $(this).data('no_hp');
                var masa_sim = $(this).data('masa_sim');

                $('#id').val(id);
                $('#pegawai_id').val(id);
                $('#nik').val(nik);
                $('#nama').val(nama);
                $('#jabatan').val(jabatan);

                $('#modal-item').modal('hidden');
            })
        })
    </script>
    <script>
        $(function() {
            $('#table1').DataTable()
        })
    </script>
@endpush