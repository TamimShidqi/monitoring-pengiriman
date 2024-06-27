@extends('layout.index')
@section('titles', 'Dashboard')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-bold">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (Auth::user()->role == 'admin')
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>
                                    {{ $data['akun'] }}
                                </h3>
                                <p>Akun</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('akun.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>
                                    {{ $data['sopir'] }}
                                </h3>
                                <p>Jumlah Sopir</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('sopir.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>
                                    {{ $data['mobil'] }}
                                </h3>
                                <p>Jumlah Mobil</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('mobil.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                @if (Auth::user()->role == 'admin')
                                    {{ $data['pengiriman'] }}
                                @endif
                                @if (Auth::user()->role == 'sopir')
                                    {{ count($data['pengirimanSopir']->where('sopir_id', Auth::user()->sopir->id)) }}
                                @endif
                            </h3>
                            <p> Total Pengiriman</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('pengiriman.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
            @if (Auth::user()->role == 'sopir' && $pengiriman->count() > 0)
                <table id="tablePengiriman" class="table table-bordered table-hover">
                    <thead>
                        <tr align="center">

                            <th>Perusahaan</th>
                            <th>Tujuan</th>
                            <th>Sopir</th>
                            <th>Mobil</th>
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
                                                class="badge badge-success">{{ $data->status }}</span>
                                        @elseif ($data->status == 'arrived')
                                            <span style="color: white"
                                                class="badge badge-primary">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if (Auth::user()->role === 'sopir')
                                            <a href="{{ route('pengiriman.index') }}" class="btn btn-warning mr-2">
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
            @endif
            @if (Auth::user()->role == 'admin')
            <div>
                <canvas id="pengirimanChart"></canvas>
            </div>
            @endif
            <center>
                <div class="card mt-5 shadow p-3 mb-5 bg-body rounded" style="max-width: 35rem;">
                    <h5 class="card-header font-weight-bold text-center">Visi PT Dul Jaya Sempurna</h5>
                    <div class="card-body">
                        <p class="card-text text-center">Mewujudkan perusahaan berskala nasional
                            dengan kualitas perusahaan skala internasional,
                            dan dapat di percaya serta di handalkan karena pelayanan
                            serta tanggung jawab yang tinggi
                            untuk memegang teguh kepercayaan dari pelanggan.</p>
                    </div>
                </div>
                {{-- <div class="card mt-5 shadow p-3 mb-5 bg-body rounded" style="max-width: 35rem;">
                    <h5 class="card-header font-weight-bold text-center">Misi PT Dul Jaya Sempurna</h5>
                    <div class="card-body">
                        <p class="card-text text-center">1.	Memeberikan pelayanan sepenuh hati Memenuhi keinginan konsumen dan memberikan hasil yang terbaik dengan mengutamakan kepuasan pelanggan dalam setiap pelayanannya
                            <br>2.	Memberikan jasa transportir yang berkualitas tinggi
                            <br>3.	Mempertahankan dan mengembangkan sertameningkatkan citra perusahaan
                            <br>4.	Selalu berinovasi dalam bidang jasa transportasi
                            </p>
                    </div>
                </div> --}}

            </center>

        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@push('scripts')
<script>
    var data = @json($graph);

    var ctx = document.getElementById('pengirimanChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(row => row.bulan),
            datasets: [{
                label: 'Total Pendapatan',
                data: data.map(row => row.total),
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna bar
                borderColor: 'rgba(54, 162, 235, 1)', // Warna border
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
