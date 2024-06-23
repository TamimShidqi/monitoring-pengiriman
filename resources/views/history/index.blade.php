@extends('layout.index')

@section('content')
<div class="container">
    <h1>Riwayat Pengiriman</h1>
    {{-- <a href="{{ route('pengiriman.cetakpdf', $data->id) }}" method="POST"
        class="btn btn-success mr-2">
        <i class="fas fa-print"></i>
    </a> --}}
    <table id="tablePengiriman" class="table table-bordered table-hover">
        <thead>
            <tr align="center">

                <th>Perusahaan</th>
                <th>Tujuan</th>
                <th>Sopir</th>
                <th>Mobil</th>
                <th>Tanggal Transaksi</th>
                <th>Liter</th>
                <th>Jarak</th>
                <th>Tarif</th>
                <th>Total</th>
                <th>updated_at</th>
                {{-- <th>Status</th> --}}
                {{-- <th>AKSI</th> --}}
            </tr>
        </thead>
        @foreach ($history as $data)
        <tbody>
            <tr>
                <td>{{ $data->perusahaan }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->sopir->nama }}</td>
                <td>{{ $data->mobil->nopol }}</td>
                <td>{{ $data->date_order }}</td>
                <td>{{ $data->liter }}</td>
                <td>{{ $data->jarak }}</td>
                <td>{{ $data->tarif }}</td>
                <td>Rp.{{ number_format($data->total, 3, ',', '.') }}</td>
                <td>{{ $data->updated_at}}</td>
                {{-- <td align="center" style="font-size: 22px">
                            @if ($data->status == 'pending')
                                <span style="color: white"
                                    class="badge badge-secondary text-capitalize">{{ $data->status }}</span>
                            @elseif ($data->status == 'pick_up')
                                <span style="color: white"
                                    class="badge badge-success text-capitalize">{{ $data->status }}</span>
                            @elseif ($data->status == 'on_delivery')
                                <span style="color: white"
                                    class="badge badge-success">{{ $data->status }}</span>
                            @elseif ($data->status == 'arrived')
                                <span style="color: white"
                                    class="badge badge-primary">{{ $data->status }}</span>
                            @endif
                        </td> --}}
                        {{-- <td align="center">
                            <a href="{{ route('pengiriman.edit', $data->id) }}"
                                class="btn btn-warning mr-2">
                                <i class="far fa-edit"></i>
                            </a>
                            <form style="display: inline"
                                action="{{ route('pengiriman.destroy', $data->id) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger mr-2" type="submit"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                            <a href="{{ route('pengiriman.cetakpdf', $data->id) }}" method="POST"
                                class="btn btn-success mr-2">
                                <i class="fas fa-print"></i>
                            </a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
