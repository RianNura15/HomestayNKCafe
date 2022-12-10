@extends('admin.layouts.main')
@section('title', 'Cek Data Sewa')
@section('pages', 'Cek Data Sewa')
@section('halaman', 'Cek Data Sewa')
@section('content')
<div class="min-height-300 bg-nk position-absolute w-100"></div>
@include('admin.layouts.sidebar')
<main class="main-content position-relative border-radius-lg ">
@include('admin.layouts.navbar')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-7" style="float: left; margin-left: 10px; margin-top: 10px;">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        @foreach($data as $item)
                                        @csrf
                                        <form class="form form-vertical" method="GET" action="{{route('konfirmasi',$item->id_sewa)}}">
                                            <input type="hidden" name="sewa_id" value="{{$item->id_sewa}}">
                                            <input type="hidden" name="total" value="{{$item->total}}">
                                            <input type="hidden" name="tanggal" value="{{$item->tanggal_sewa}}">
                                            @if($item->buktipembayaran!=="-" && $item->keterangan=='Pending')
                                            <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" onclick="return confirm('Yakin Mengkonfirmasi transaksi dengan kode TRS-{{$item->id_sewa}}?')"> <i class="icon dripicons-document-edit" onclick="return confirm('Yakin Data Sudah Benar?')"></i> Konfirmasi</button>
                                            @endif
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        @foreach($data as $item)
                                        @csrf
                                        <form class="form form-vertical" method="GET" action="{{route('bataladmin', $item->id_sewa)}}">
                                            @if($item->keterangan !== 'Di Batalkan')
                                            <button class="btn btn-sm btn-outline-danger form-control rounded-pill mt-4" onclick="return confirm('Yakin Akan Dibatalkan?')"> <i class="icon dripicons-document-edit"></i> Batalkan</button>
                                            @endif
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        @foreach($data as $item)
                                        @csrf
                                        <form class="form form-vertical" method="GET" action="{{route('setuju',$item->id_sewa)}}">
                                            @if($item->setuju=='0' && $item->keterangan!=='Di Batalkan' && $item->keterangan!=='Expired')
                                            <button class="btn btn-sm btn-outline-success form-control rounded-pill mt-4" onclick="return confirm('Yakin Menyetujui?')"> <i class="icon dripicons-document-edit"></i> Setujui</button>
                                            @endif
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                @foreach($data as $item)
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">No Transaksi</label>
                                        <p>TRS-{{$item->id_sewa}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Nama</label>
                                        <p>{{$item->user->name}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Email</label>
                                        <p>{{$item->user->email}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">No Telepon/WA</label>
                                        <p>
                                            @if(substr($item->user->no_telp,0,1)=='0')
                                            <a href="https://wa.me/62{{substr($item->user->no_telp,1)}}" target="_blank">
                                                62 {{substr($item->user->no_telp,1)}}
                                            </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Jenis Kelaminn</label>
                                        <p>{{$item->user->jenis_kelamin}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Alamat</label>
                                        <p>{{$item->user->alamat_user}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <div class="col-12 col-lg-4" style="float: right; margin-bottom: 500px; margin-top: -390px; margin-right: 60px;">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Bukti Pembayaran</h4>
                        <hr>
                        <div class="form-body">
                            <div class="row">
                                @foreach($data as $item)
                                @if($item->buktipembayaran=="-")
                                <button class="btn btn-lg btn-danger">Belum Upload <br> Bukti Transfer</button>
                                @endif
                                @if($item->buktipembayaran!=="-")
                                <a href="{{asset('storage/'.$item->buktipembayaran)}}" target="_blank">
                                    <img src="{{asset('storage/'.$item->buktipembayaran)}}" width="320">
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>
        
    </section>
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