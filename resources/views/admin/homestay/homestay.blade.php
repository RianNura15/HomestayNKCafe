@extends('admin.layouts.main')
@section('title', 'Data Homestay')
@section('pages', 'Homestay')
@section('halaman', 'Homestay')
@section('content')
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  @include('admin.layouts.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    @include('admin.layouts.navbar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <div class="card-header pb-0" style="float: left;">
                  <h6>Data Homestay</h6>
                  <button type="button" class="btn btn-primary" style="margin-top: 20px; margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah
                  </button>
                </div>
                <div class="card-header pb-0" style="float: right;">
                  <div class="input-group">
                    <form action="" method="GET">
                      <input type="text" class="rounded border-1 pt-1 pb-1" style="float: left; margin-right: 10px; margin-top:13px;" placeholder="Cari" name="search">
                      <button class="btn btn-primary" style="float: right; margin-top:10px;" type="submit">Cari</button>
                    </form>
                  </div>
                </div>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Homestay</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->nama_homestay}}</td>
                      <td class="text-center">Rp. {{number_format($item->harga,0,",",".")}}</td>
                      <td class="text-center">
                        <a href="{{asset('storage/'.$item->gambar)}}" target="_blank">
                            <img src="{{asset('storage/'.$item->gambar)}}" width="80">
                        </a>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_homestay}}">
                          <i class="ni ni-archive-2"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$item->id_homestay}}">
                          <i class="ni ni-settings-gear-65"></i>
                        </button>
                        <a href="{{route('deletehomestay', $item->id_homestay)}}" class="btn btn-danger btn-sm">
                          <i class="ni ni-fat-remove"></i>
                        </a>
                        <a href="{{route('perlengkapan', $item->id_homestay)}}" class="btn btn-success btn-sm">
                          <i class="ni ni-briefcase-24"></i>
                        </a>
                        <a href="{{route('fasilitas', $item->id_homestay)}}" class="btn btn-primary btn-sm">
                          <i class="ni ni-istanbul"></i>
                        </a>
                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="detail{{$item->id_homestay}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Homestay</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-3">ID Homestay </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->id_homestay}} </div>
                                <div class="col-3">Nama Homestay</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->nama_homestay}} </div>
                                <div class="col-3">Jenis Homestay </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->jenis_homestay}}</div>
                                <div class="col-3">Harga </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> Rp {{number_format($item->harga,0,",",".")}} </div>
                                <div class="col-3">Deskripsi Homestay </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->desc_homestay}}</div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="edit{{$item->id_homestay}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Homestay</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="post" action="{{route('updatehomestay', $item->id_homestay)}}" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form=group">
                                        <label>Nama Homestay</label>
                                        <input type="text" class="form-control" name="nama_homestay" value="{{$item->nama_homestay}}">
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>Jenis Homestay</label>
                                        <input type="text" class="form-control" name="jenis_homestay" value="{{$item->jenis_homestay}}">
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>Harga Homestay</label>
                                        <input type="number" class="form-control" name="harga" value="{{$item->harga}}">
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>Gambar Homestay</label>
                                        <input type="hidden" name="oldImage" value="{{ $item->gambar }}">
                                        <input type="file" accept="image/*" class="form-control" name="gambar">
                                    </div>  
                                </div>
                                <div class="col-12">
                                    <div class="form=group">
                                        <label>Deskripsi Homestay</label>
                                        <input type="text" class="form-control" rows="5" name="desc_homestay" value="{{$item->desc_homestay}}">
                                    </div>  
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
      </div>
      @include('admin.layouts.footer')
    </div>
  </main>
  @include('admin.layouts.setting')

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Homestay</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('tambahhomestay')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Homestay</label>
                    <input type="text" required="" class="form-control" name="nama_homestay" autofocus>
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Jenis Homestay</label>
                    <input type="text" required="" class="form-control" name="jenis_homestay">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Harga Homestay</label>
                    <input type="number" required="" class="form-control" name="harga">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Gambar Homestay</label>
                    <input type="file" required="" accept="image/*" class="form-control" name="gambar">
                </div>  
            </div>
            <div class="col-12">
                <div class="form=group">
                    <label>Deskripsi Homestay</label>
                    <textarea class="form-control" required="" rows="5" name="desc_homestay"></textarea>
                </div>  
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

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