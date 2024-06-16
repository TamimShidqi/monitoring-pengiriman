@extends('layout.index')

@section('content')
    <br>
    <form action="{{ url('pegawai/' . $pegawai->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col mr-5 ml-5">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Data Pegawai</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <input type="hidden" name="_method" value="PATCH">
                            <form class="form-horizontal">
                                <div class="card-body">
                                    {{-- <div>
                                        <input type="hidden" name="pendaftaran_id" id="daftar_id"
                                            value="{{ $pegawai->pendaftaran->id }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $pegawai->pendaftaran->NIK }}"
                                                class="form-control ml-2" readonly>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="NIK" value="{{ $pegawai->NIK }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" value="{{ $pegawai->nama }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gelar</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="gelar" value="{{ $pegawai->gelar }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tempat_lahir" value="{{ $pegawai->tempat_lahir }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-2">
                                            <input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <fieldset class="row ml-2">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="gridRadios1" value="Laki Laki"
                                                            {{ $pegawai->jenis_kelamin == 'Laki Laki' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Laki Laki"
                                                            value="{{ $pegawai->jenis_kelamin }}">
                                                            Laki Laki
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="gridRadios2" value="Perempuan"
                                                            {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Perempuan"
                                                            value="{{ $pegawai->jenis_kelamin }}">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                                        <div class="col-sm-10">
                                            <fieldset class="row ml-2">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status_perkawinan" id="gridRadios1" value="Sudah Menikah"
                                                            {{ $pegawai->status_perkawinan == 'Sudah Menikah' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Sudah Menikah"
                                                            value="{{ $pegawai->status_perkawinan }}">
                                                            Sudah Menikah
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="status_perkawinan" id="gridRadios2" value="Belum Menikah"
                                                            {{ $pegawai->status_perkawinan == 'Belum Menikah' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Belum Menikah"
                                                            value="{{ $pegawai->status_perkawinan }}">
                                                            Belum Menikah
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label mt-2">Agama</label>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-2 form-group">
                                                        <select class="form-control" id="agama" name="agama" required>
                                                            <option value="{{ $pegawai->agama }}" hidden>
                                                                {{ $pegawai->agama }}</option>
                                                            <option>~ Pilih Agama ~</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="kristen">Kristen</option>
                                                            <option value="Khatolik">Khatolik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Perkawinan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="status_perkawinan"
                                                value="{{ $pegawai->status_perkawinan }}" class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control ml-2" value="{{ $pegawai->alamat }}"
                                                name="alamat" rows="3">{{ $pegawai->alamat }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No. Telp</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_telp" value="{{ $pegawai->no_telp }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="pendidikan" value="{{ $pegawai->pendidikan }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">No. Akte</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Nakte" value="{{ $pegawai->Nakte }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="goldarah" value="{{ $pegawai->goldarah }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="{{ $pegawai->email }}"
                                                class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">tanggal Mulai Bekerja</label>
                                        <div class="col-sm-2">
                                            <input type="date" name="tanggal_mulai_bekerja"
                                                value="{{ $pegawai->tanggal_mulai_bekerja }}" class="form-control ml-2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status Kepegawaian</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="status_kepegawaian"
                                                value="{{ $pegawai->status_kepegawaian }}" class="form-control ml-2">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="jabatan_id">Jabatan :</label>
                                        <div class="col-sm-2 ml-2">
                                            <select name="jabatan_id" id="jabatan_id" class="form-control">
                                                <option hidden value="{{ $pegawai->jabatan_id }}">
                                                    {{ $pegawai->jabatan->jabatan }}</option>
                                                <option disabled>-- Pilih Jabatan --</option>
                                                @foreach ($jabatan as $item)
                                                    @if ($pegawai['jabatan_id'] == $item->id)
                                                        {
                                                        <option disabled value="{{ $pegawai['jabatan_id'] }}">
                                                            {{ $pegawai->jabatan->jabatan }} <- ( Already Selected
                                                                )</option>
                                                                }
                                                            @else
                                                        <option value="{{ $item->id }}"
                                                            {{ $pegawai['jabatan_id'] == $item->id }}>
                                                            {{ $item->jabatan }} </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Penempatan Cabang</label>
                                        <div class="col-sm-10">
                                            <fieldset class="row ml-2">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="lokasi" id="gridRadios1" value="Palembang"
                                                            {{ $pegawai->lokasi == 'Palembang' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Palembang" value="{{ $pegawai->lokasi }}">
                                                            Palembang
                                                        </label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="radio"
                                                            name="lokasi" id="gridRadios2" value="Lampung"
                                                            {{ $pegawai->lokasi == 'Lampung' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="Lampung" value="{{ $pegawai->lokasi }}">
                                                            Lampung
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">~Masukkan Foto Pegawai</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="foto">
                                            </div>
                                        </div>
                                        @if (strlen($pegawai->foto) > 0)
                                            <img src="{{ asset('a_fotos/' . $pegawai->foto) }}"
                                                style="max-height: 250px">
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-2 col-form-label">~Masukkan CV</label>
                                        <div class="col-sm-2 input-group">
                                            <div class="custom-file">
                                                <input type="file" name="cv">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-2 col-form-label">~Masukkan
                                            Ijazah</label>
                                        <div class="col-sm-2 input-group">
                                            <div class="custom-file">
                                                <input type="file" name="ijazah">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-2 col-form-label">~Upload Berkas
                                            Transkip Nilai ( Jika ada )</label>
                                        <div class="col-sm-2 input-group">
                                            <div class="custom-file">
                                                <input type="file" name="transkip">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-2 col-form-label">~Masukkan Surat
                                            Lamaran</label>
                                        <div class="col-sm-2 input-group">
                                            <div class="custom-file">
                                                <input type="file" name="lamaran">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile" class="col-sm-2 col-form-label">~Masukkan KTP</label>
                                        <div class="col-sm-2 input-group">
                                            <div class="custom-file">
                                                <input type="file" name="ktp">
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
