@extends('admin.layouts.main')
@section('title', 'Data Fasilitas')
@section('pages', 'Fasilitas')
@section('halaman', 'Fasilitas')
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
                @foreach($homestay as $item)
                <h6 style="float: left;">Data Fasilitas {{$item->nama_homestay}}</h6>
                @endforeach
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
                      <th class="text-center">Nama Fasilitas</th>
                      <th class="text-center">Gambar</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->nama_fasilitas}}</td>
                      <td class="text-center">
                        <a href="{{asset('storage/'.$item->gambar)}}" target="_blank">
                            <img src="{{asset('storage/'.$item->gambar)}}" width="80">
                        </a>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_fasilitas}}">
                          <i class="ni ni-archive-2"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$item->id_fasilitas}}">
                          <i class="ni ni-settings-gear-65"></i>
                        </button>
                        <a href="{{route('deletefasilitas', $item->id_fasilitas)}}" class="btn btn-danger btn-sm">
                          <i class="ni ni-fat-remove"></i>
                        </a>
                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="detail{{$item->id_fasilitas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Fasilitas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-3">ID Fasilitas</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->id_fasilitas}} </div>
                                <div class="col-3">Nama Fasilitas</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->nama_fasilitas}} </div>
                                <div class="col-3">Jumlah Fasilitas</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->jumlah_fasilitas}}</div>
                                <div class="col-3">Deskripsi Fasilitas </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->desc_fasilitas}}</div>
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
                    <div class="modal fade" id="edit{{$item->id_fasilitas}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Fasilitas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="post" action="{{route('updatefasilitas', $item->id_fasilitas)}}" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                  <div class="form=group">
                                      <label>Nama Fasilitas</label>
                                      <input type="text" class="form-control @error('nama_fasilitas')is-invalid @enderror" name="nama_fasilitas" value="{{ $item->nama_fasilitas }}" autofocus>
                                      @error('nama_fasilitas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                      @foreach($homestay as $hs)
                                      <input type="hidden" value="{{$hs->id_homestay}}" name="homestay_id">
                                      @endforeach
                                  </div>  
                                  </div>
                                  <div class="col-4">
                                      <div class="form=group">
                                          <label>Jumlah Fasilitas</label>
                                          <input type="number" class="form-control @error('jumlah_fasilitas')is-invalid @enderror" name="jumlah_fasilitas" value="{{ $item->jumlah_fasilitas }}">
                                          @error('jumlah_fasilitas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>  
                                  </div>
                                  <div class="col-4">
                                      <div class="form=group">
                                          <label>Gambar Fasilitas</label>
                                          <input type="hidden" name="oldImage" value="{{ $item->gambar }}">
                                          <input type="file" accept="image/*" class="form-control @error('gambar')is-invalid @enderror" name="gambar">
                                          @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>  
                                  </div>
                                  <div class="col-12">
                                      <div class="form=group">
                                          <label>Deskripsi Fasilitas</label>
                                          <input type="text" class="form-control @error('desc_fasilitas')is-invalid @enderror" rows="5" name="desc_fasilitas" value="{{ $item->desc_fasilitas }}">
                                          @error('desc_fasilitas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Fasilitas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('tambahfasilitas')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Fasilitas</label>
                    <input type="text" required="" class="form-control @error('nama_fasilitas')is-invalid @enderror" name="nama_fasilitas" autofocus>
                    @error('nama_fasilitas')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @foreach($homestay as $item)
                    <input type="hidden" value="{{$item->id_homestay}}" name="homestay_id">
                    @endforeach
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Jumlah Fasilitas</label>
                    <input type="number" required="" class="form-control @error('jumlah_fasilitas')is-invalid @enderror" name="jumlah_fasilitas">
                    @error('jumlah_fasilitas')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Gambar Fasilitas</label>
                    <input type="file" required="" accept="image/*" class="form-control @error('gambar')is-invalid @enderror" name="gambar">
                    @error('gambar')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-12">
                <div class="form=group">
                    <label>Deskripsi Fasilitas</label>
                    <textarea class="form-control @error('desc_fasilitas')is-invalid @enderror" required="" rows="5" name="desc_fasilitas"></textarea>
                    @error('desc_fasilitas')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
@endsection