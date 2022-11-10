@extends('admin.layouts.main')
@section('title', 'Data User')
@section('pages', 'User')
@section('halaman', 'User')
@section('content')
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  @include('admin.layouts.sidebar')
  <main class="main-content position-relative border-radius-lg ">
    @include('admin.layouts.navbar')
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data User</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-striped" id="table1">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th class="text-center">Nama User</th>
                      <th class="text-center">KTP</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{$item->name}}</td>
                      <td class="text-center">
                        <a href="{{asset('storage/'.$item->datauser->gambar_ktp)}}" target="_blank">
                            <img src="{{asset('storage/'.$item->datauser->gambar_ktp)}}" width="80">
                        </a>
                      </td>
                      <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$item->id}}">
                          <i class="ni ni-archive-2"></i>
                        </button>
                        <a href="" class="btn btn-danger btn-sm">
                          <i class="ni ni-fat-remove"></i>
                        </a>
                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="detail{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-3">ID User</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->id}} </div>
                                <div class="col-3">Nama User</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->name}} </div>
                                <div class="col-3">Email User</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->email}}</div>
                                <div class="col-3">Jenis Kelamin </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->jenis_kelamin}}</div>
                                <div class="col-3">KTP </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->ktp}}</div>
                                <div class="col-3">Alamat </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$item->alamat_user}}</div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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