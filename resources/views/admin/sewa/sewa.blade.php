@extends('admin.layouts.main')
@section('title', 'Data Sewa')
@section('pages', 'Sewa')
@section('halaman', 'Sewa')
@section('content')
  <div class="min-height-300 bg-nk position-absolute w-100"></div>
  @include('admin.layouts.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    @include('admin.layouts.navbar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Sewa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">User</th>
                      <th class="text-center">Homestay</th>
                      <th class="text-center">Tanggal Sewa</th>
                      <th class="text-center">Expired</th>
                      <th class="text-center">Mulai Sewa</th>
                      <th class="text-center">Selesai Sewa</th>
                      <th class="text-center">keterangan</th>
                      <th class="text-center">Bukti Pembayaran</th>
                      <th class="text-center">Total</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->user->name}}</td>
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
                      <td class="text-center">
                        @if($item->keterangan == 'Pending')
                        <span class="badge bg-warning">Lakukan <br> Pengecekan</span>
                        @elseif($item->keterangan == 'Expired')
                        <span class="badge bg-danger">Expired</span>
                        @elseif($item->keterangan == 'Aktif')
                        <span class="badge bg-info">Aktif</span>
                        @elseif($item->keterangan == 'Mulai')
                        <span class="badge bg-success">Mulai</span>
                        @elseif($item->keterangan == 'Selesai')
                        <span class="badge bg-success">Selesai</span>
                        @elseif($item->keterangan == '-' || $item->setuju == '0')
                        <span class="badge bg-warning">Menunggu <br> Persetujuan</span>
                        @endif
                      </td>
                      <td class="text-center">
                        @if($item->buktipembayaran == '-')
                        <span class="badge bg-danger">Belum Dibayar</span>
                        @else
                        <a href="{{asset('storage/'.$item->buktipembayaran)}}" target="_blank">
                            <img src="{{asset('storage/'.$item->buktipembayaran)}}" width="80">
                        </a>
                        @endif
                      </td>
                      <td class="text-center">Rp. {{number_format($item->total,0,",",".")}}</td>
                      <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_fasilitas}}">
                          Detail
                        </button>
                        <a href="{{route('cekdatasewa', $item->id_sewa)}}" class="btn btn-success btn-sm text-white">
                          Cek
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('admin.layouts.footer')
    </div>
  </main>
  @include('admin.layouts.setting')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
@endsection