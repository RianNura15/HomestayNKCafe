@extends('admin.layouts.main')
@section('title', 'Data Perlengkapan')
@section('pages', 'Perlengkapan')
@section('halaman', 'Perlengkapan')
@section('content')
  <div class="min-height-300 bg-nk position-absolute w-100"></div>
  @include('admin.layouts.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    @include('admin.layouts.navbar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
              <div class="card-header">
                <h6 style="float: left;">Data Perlengkapan</h6>
                <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#tambah">
                  Tambah
                </button>
              </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama Perlengkapan</th>
                      <th class="text-center">Gambar</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->nama_perlengkapan}}</td>
                      <td class="text-center">
                        <a href="{{asset('storage/'.$item->gambar)}}" target="_blank">
                            <img src="{{asset('storage/'.$item->gambar)}}" width="80">
                        </a>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_perlengkapan}}">
                          <i class="ni ni-archive-2"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$item->id_perlengkapan}}">
                          <i class="ni ni-settings-gear-65"></i>
                        </button>
                        <a href="{{route('deleteperlengkapan', $item->id_perlengkapan)}}" class="btn btn-danger btn-sm">
                          <i class="ni ni-fat-remove"></i>
                        </a>
                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="detail{{$item->id_perlengkapan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Perlengkapan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-3">ID Perlengkapan</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->id_perlengkapan}} </div>
                                <div class="col-3">Nama Perlengkapan</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->nama_perlengkapan}} </div>
                                <div class="col-3">Jumlah Perlengkapan</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->jumlah_perlengkapan}}</div>
                                <div class="col-3">Tempat Perlengkapan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->tempat}}</div>
                                <div class="col-3">Deskripsi Perlengkapan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->desc_perlengkapan}}</div>
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
                    <div class="modal fade" id="edit{{$item->id_perlengkapan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Perlengkapan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="post" action="{{route('updateperlengkapan', $item->id_perlengkapan)}}" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                  <div class="form=group">
                                      <label>Nama Perlengkapan</label>
                                      <input type="text" class="form-control" name="nama_perlengkapan" value="{{ $item->nama_perlengkapan }}" autofocus>
                                      @foreach($homestay as $hs)
                                      <input type="hidden" value="{{$hs->id_homestay}}" name="homestay_id">
                                      @endforeach
                                  </div>  
                                  </div>
                                  <div class="col-4">
                                      <div class="form=group">
                                          <label>Jumlah Perlengkapan</label>
                                          <input type="number" class="form-control" name="jumlah_fasilitas" value="{{ $item->jumlah_perlengkapan}}">
                                      </div>  
                                  </div>
                                  <div class="col-4">
                                      <div class="form=group">
                                          <label>Tempat Perlengkapan</label>
                                          <input type="text" class="form-control" name="tempat" value="{{ $item->tempat}}">
                                      </div>  
                                  </div>
                                  <div class="col-4">
                                      <div class="form=group">
                                          <label>Gambar Perlengkapan</label>
                                          <input type="hidden" name="oldImage" value="{{ $item->gambar }}">
                                          <input type="file" accept="image/*" class="form-control" name="gambar">
                                      </div>  
                                  </div>
                                  <div class="col-12">
                                      <div class="form=group">
                                          <label>Deskripsi Perlengkapan</label>
                                          <input type="text" class="form-control" rows="5" name="desc_perlengkapan" value="{{ $item->desc_perlengkapan }}">
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
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Perlengkapan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('tambahperlengkapan')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Perlengkapan</label>
                    <input type="text" required="" class="form-control" name="nama_perlengkapan" autofocus>
                    @foreach($homestay as $item)
                    <input type="hidden" value="{{$item->id_homestay}}" name="homestay_id">
                    @endforeach
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Jumlah Perlengkapan</label>
                    <input type="number" required="" class="form-control" name="jumlah_perlengkapan">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Tempat Perlengkapan</label>
                    <input type="text" required="" class="form-control" name="tempat">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Gambar Perlengkapan</label>
                    <input type="file" required="" accept="image/*" class="form-control" name="gambar">
                </div>  
            </div>
            <div class="col-12">
                <div class="form=group">
                    <label>Deskripsi Perlengkapan</label>
                    <textarea class="form-control" required="" rows="5" name="desc_perlengkapan"></textarea>
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