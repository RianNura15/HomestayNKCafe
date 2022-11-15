@extends('pengelola.layouts.main')
@section('title', 'Data Karyawan')
@section('pages', 'Karyawan')
@section('halaman', 'Karyawan')
@section('content')
  <div class="min-height-300 bg-nk position-absolute w-100"></div>
  @include('pengelola.layouts.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    @include('pengelola.layouts.navbar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header">
              <h6 style="float: left;">Data Karyawan</h6>
              <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah
              </button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama Karyawan</th>
                      <th class="text-center">KTP</th>
                      <th class="text-center">No. Telepon</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->nama_karyawan}}</td>
                      <td class="text-center">
                        <a href="{{asset('storage/'.$item->gambar_ktp)}}" target="_blank">
                            <img src="{{asset('storage/'.$item->gambar_ktp)}}" width="80">
                        </a>
                      </td>
                      <td class="text-center">{{$item->no_telp}}</td>
                      <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_karyawan}}">
                          Detail
                        </button>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$item->id_karyawan}}">
                          Edit
                        </button>
                        <a href="{{route('deletekaryawan', $item->id_karyawan)}}" class="btn btn-danger btn-sm">
                          Hapus
                        </a>
                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="detail{{$item->id_karyawan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Karyawan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-3">Nama Karyawan</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->nama_karyawan}}</div>
                                <div class="col-3">Jenis Kelamin </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->jenis_kelamin}}</div>
                                <div class="col-3">Agama </div>
                                <div class="col-1">: </div>
                                <div class="col-8">{{$item->agama}}</div>
                                <div class="col-3">No. Telepon</div>
                                <div class="col-1">: </div>
                                <div class="col-8">{{$item->no_telp}}</div>
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
                    <div class="modal fade" id="edit{{$item->id_karyawan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Homestay</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="post" action="{{route('updatekaryawan', $item->id_karyawan)}}" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form=group">
                                        <label>Nama Karyawan</label>
                                        <input type="text" class="form-control @error('nama_karyawan')is-invalid @enderror" name="nama_karyawan" value="{{$item->nama_karyawan}}">
                                        @error('nama_karyawan')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin" value="{{$item->jenis_kelamin}}">
                                        @error('jenis_kelamin')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>Agama</label>
                                        <input type="text" class="form-control @error('agama')is-invalid @enderror" name="agama" value="{{$item->agama}}">
                                        @error('agama')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>KTP</label>
                                        <input type="hidden" name="oldImage" value="{{ $item->gambar_ktp }}">
                                        <input type="file" accept="image/*" class="form-control @error('gambar_ktp')is-invalid @enderror" name="gambar_ktp">
                                        @error('gambar_ktp')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  
                                </div>
                                <div class="col-12">
                                    <div class="form=group">
                                        <label>No. Telepon</label>
                                        <input type="text" class="form-control @error('no_telp')is-invalid @enderror" rows="5" name="no_telp" value="{{$item->no_telp}}">
                                        @error('no_telp')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Karyawan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="{{route('tambahkaryawan')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Karyawan</label>
                    <input type="text" required="" class="form-control @error('nama_karyawan')is-invalid @enderror" name="nama_karyawan" autofocus>
                    @error('nama_karyawan')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Jenis Kelamin</label>
                    <input type="text" required="" class="form-control @error('jenis_kelamin')is-invalid @enderror" name="jenis_kelamin">
                    @error('jenis_kelamin')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Agama</label>
                    <input type="text" required="" class="form-control @error('agama')is-invalid @enderror" name="agama">
                    @error('agama')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>KTP</label>
                    <input type="file" required="" accept="image/*" class="form-control @error('gambar_ktp')is-invalid @enderror" name="gambar_ktp">
                    @error('gambar_ktp')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>No. Telepon</label>
                    <input type="text" required="" class="form-control @error('no_telp')is-invalid @enderror" name="no_telp">
                    @error('no_telp')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Email</label>
                    <input type="email" required="" class="form-control @error('email')is-invalid @enderror" name="email">
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Password</label>
                    <input type="password" required="" class="form-control @error('password')is-invalid @enderror" name="password">
                    @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>  
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection