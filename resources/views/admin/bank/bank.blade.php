@extends('admin.layouts.main')
@section('title', 'Data Bank')
@section('pages', 'Bank')
@section('halaman', 'Bank')
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
              <h6 style="float: left;">Data Bank</h6>
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
                      <th class="text-center">Nama Bank</th>
                      <th class="text-center">Nama Pemilik</th>
                      <th class="text-center">No. Rekening</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->nama_bank}}</td>
                      <td class="text-center">{{$item->nama_pemilik}}</td>
                      <td class="text-center">{{$item->no_rek}}</td>
                      <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$item->id_bank}}">
                          Edit
                        </button>
                        <a href="{{route('deletebank', $item->id_bank)}}" class="btn btn-danger btn-sm">
                          Hapus
                        </a>
                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="edit{{$item->id_bank}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Bank</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="post" action="{{route('updatebank', $item->id_bank)}}" enctype="multipart/form-data">
                            @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form=group">
                                        <label>Nama Bank</label>
                                        <input type="text" class="form-control" name="nama_bank" value="{{$item->nama_bank}}">
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>Nama Pemilik</label>
                                        <input type="text" class="form-control" name="nama_pemilik" value="{{$item->nama_pemilik}}">
                                    </div>  
                                </div>
                                <div class="col-4">
                                    <div class="form=group">
                                        <label>No. Rekening</label>
                                        <input type="number" class="form-control" name="no_rek" value="{{$item->no_rek}}">
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
      <form method="post" action="{{route('tambahbank')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Bank</label>
                    <input type="text" required="" class="form-control" name="nama_bank" autofocus>
                </div>  
            </div>
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Pemilik</label>
                    <input type="text" required="" class="form-control" name="nama_pemilik">
                </div>  
            </div>
            <div class="col-6">
                <div class="form=group">
                    <label>No. Rekening</label>
                    <input type="number" required="" class="form-control" name="no_rek">
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