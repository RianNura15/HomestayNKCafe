@extends('pelanggan.layouts.main')
@section('title', 'Riwayat Sewa')
@section('content')
    <div class="container-xxl bg-white p-0">
        @include('pelanggan.layouts.spinner')


        @include('pelanggan.layouts.navbar')


        @include('pelanggan.layouts.header')


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                
            </div>
        </div>
        <!-- Search End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">RIWAYAT SEWA</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Homestay</th>
                                <th class="text-center">Tanggal Sewa</th>
                                <th class="text-center">Expired</th>
                                <th class="text-center">Mulai Sewa</th>
                                <th class="text-center">Selesai Sewa</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Bukti Pembayaran</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sewa as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$item->homestay->nama_homestay}}</td>
                                    <td class="text-center">{{$item->tanggal_sewa}}</td>
                                    <td class="text-center">
                                        @if($item->keterangan == '-')
                                        {{ \Carbon\Carbon::parse($item->expired)->locale('id')->diffForHumans() }}
                                        @elseif($item->keterangan == 'Pending')
                                        <span class="badge bg-warning">Menunggu</span>
                                        @elseif($item->keterangan == 'Aktif' || $item->keterangan == 'Mulai' || $item->keterangan == 'Selesai')
                                        <span class="badge bg-success">Clear</span>
                                        @elseif($item->keterangan == 'Expired')
                                        <span class="badge bg-danger">Expired</span>
                                        @elseif($item->keterangan == 'Di Batalkan')
                                        <span class="badge bg-danger">Batal</span>
                                        @endif
                                    </td>
                                    
                                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }}</td>

                                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}</td>

                                    <td class="text-center">Rp. {{number_format($item->total,0,",",".")}}</td>

                                    <td class="text-center">
                                        @if($item->buktipembayaran == '-')
                                        <span class="badge bg-danger">Belum Dibayar</span>
                                        @else
                                        <a href="{{asset('storage/'.$item->buktipembayaran)}}" target="_blank">
                                            <img src="{{asset('storage/'.$item->buktipembayaran)}}" width="80">
                                        </a>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($item->keterangan == 'Pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @elseif($item->keterangan == 'Expired')
                                        <span class="badge bg-danger">Expired</span>
                                        @elseif($item->keterangan == 'Aktif')
                                        <span class="badge bg-info">Aktif</span>
                                        @elseif($item->keterangan == 'Mulai')
                                        <span class="badge bg-success">Mulai</span>
                                        @elseif($item->keterangan == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                        @elseif($item->keterangan == 'Di Batalkan')
                                        <span class="badge bg-danger">Di Batalkan</span>
                                        @elseif($item->keterangan == '-' || $item->setuju == '0')
                                        <span class="badge bg-warning">Menunggu Admin</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_sewa}}">
                                        Detail
                                        </button>
                                        @if($item->keterangan !== 'Di Batalkan' && $item->keterangan !== 'Expired' && $item->setuju == '1')
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#upload{{$item->id_sewa}}">
                                        Bayar
                                        </button>
                                        @endif
                                        @if($item->buktipembayaran == '-' && $item->keterangan == '-')
                                        <form class="form form-vertical" method="GET" action="{{route('batalpelanggan', $item->id_sewa)}}">
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Akan Dibatalkan?')">Batal</button>
                                        </form>
                                        @endif
                                        @if($item->keterangan=="Aktif" || $item->keterangan=='Selesai' || $item->keterangan=='Mulai')
                                        <a href="{{route('buktitransaksi',$item->id_sewa)}}" target="_blank" class="btn btn-sm btn-warning">
                                        struk
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="detail{{$item->id_sewa}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 60px;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Transaksi TRS-{{$item->id_sewa}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-3">Homestay </div>
                                            <div class="col-1">: </div>
                                            <div class="col-8"> {{$item->homestay->nama_homestay}} </div>
                                            <div class="col-3">Tanggal Sewa</div>
                                            <div class="col-1">: </div>
                                            <div class="col-8"> {{$item->tanggal_sewa}} </div>
                                            <div class="col-3">Mulai Sewa </div>
                                            <div class="col-1">: </div>
                                            <div class="col-8"> {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }}</div>
                                            <div class="col-3">Selesai Sewa </div>
                                            <div class="col-1">: </div>
                                            <div class="col-8"> {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}</div>
                                            <div class="col-3">Total Hari </div>
                                            <div class="col-1">: </div>
                                            <div class="col-8"> {{$item->totalhari}} Hari</div>
                                            <div class="col-3">Total </div>
                                            <div class="col-1">: </div>
                                            <div class="col-8"> Rp. {{number_format($item->total,0,",",".")}} </div>
                                            <div class="col-3">Keterangan </div>
                                            <div class="col-1">: </div>
                                            <div class="col-8"> {{$item->desc_homestay}}
                                                @if($item->keterangan == 'Sedang di Cek')
                                                <span class="badge bg-warning">Sedang di Cek</span>
                                                @elseif($item->keterangan == 'Expired')
                                                <span class="badge bg-danger">Expired</span>
                                                @elseif($item->keterangan == 'Aktif')
                                                <span class="badge bg-info">Aktif</span>
                                                @elseif($item->keterangan == 'Mulai')
                                                <span class="badge bg-success">Mulai</span>
                                                @elseif($item->keterangan == 'Selesai')
                                                <span class="badge bg-success">Selesai</span>
                                                @elseif($item->keterangan == '-' || $item->setuju == '0')
                                                <span class="badge bg-warning">Menunggu Admin</span>
                                                @endif
                                            </div>
                                            <div class="col-3">Konfirmasi </div>
                                            <div class="col-1">: </div>
                                            <div class="col-8">
                                                @if($item->konfirmasi=="Belum di Konfirmasi")
                                                <span class="badge bg-warning">{{$item->konfirmasi}}</span>
                                                @endif
                                                @if($item->konfirmasi=="Sudah di Konfirmasi")
                                                <span class="badge bg-success">{{$item->konfirmasi}}</span>
                                                @endif
                                                @if($item->konfirmasi=="Batal")
                                                <span class="badge bg-danger">{{$item->konfirmasi}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="upload{{$item->id_sewa}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 60px;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="{{route('buktipembayaran')}}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Upload Bukti Pembayaran</label>
                                                <input type="hidden" name="oldImage" value="{{ $item->buktipembayaran }}">
                                                <input type="hidden" value="{{$item->id_sewa}}" name="id_sewa">
                                                <input type="file" accept="image/*" class="form-control" name="buktipembayaran">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        @include('pelanggan.layouts.footer')


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection