@extends('pengelola.layouts.main')
@section('title', 'Laporan')
@section('pages', 'Laporan')
@section('halaman', 'Laporan')
@section('content')
  <div class="min-height-300 bg-nk position-absolute w-100"></div>
  @include('pengelola.layouts.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    @include('pengelola.layouts.navbar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <section id="multiple-column-form" style="margin-left: 20px; margin-top: 20px;">
                <form method="GET" target="_blank" enctype="multipart/form-data" action="{{route('cetaklaporanpengelola')}}">
              <div class="col-md-3 col-12">
                <div class="form-group">
                  <label for="label">Tanggal Awal</label>
                  <input type="date" class="form-control" name="tanggal_mulai" required>
                </div>
              </div>
              <div class="col-md-3 col-12">
                <div class="form-group">
                  <label for="label">Tanggal Akhir</label>
                  <input type="date" class="form-control" name="tanggal_selesai" required>
                </div>
              </div>
                <div class="col-md-3 col-12">
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary mt-2 form-control submit">Submit</button>
                </div>
              </div>
              </form>
            </section>
            <div class="page-title" style="text-align: center;">
                <div class="row">
                    <div class="col-12 col-md-12 order-md-1 mb-3 order-last">
                        <h3>Subtotal = Rp. {{number_format($total,0,",",".")}}</h3>
                    </div>
                </div>
            </div>
            <div class="card-header pb-0">
              <h6>Laporan Sewa</h6>
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
                      <th class="text-center">Mulai Sewa</th>
                      <th class="text-center">Selesai Sewa</th>
                      <th class="text-center">Total</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->data_sewa->name}}</td>
                      <td class="text-center">{{$item->data_sewa->nama_homestay}}</td>
                      <td class="text-center">{{$item->tanggal}}</td>
                      <td class="text-center">{{$item->data_sewa->tanggal_mulai}}</td>
                      <td class="text-center">{{$item->data_sewa->tanggal_selesai}}</td>
                      <td class="text-center">{{$item->total}}</td>
                      <td class="text-center">{{$item->status}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('pengelola.layouts.footer')
    </div>
  </main>
  @include('pengelola.layouts.setting')
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