@extends('pelanggan.layouts.main')
@section('title', 'Profil')
@section('content')
    <div class="container-xxl bg-white p-0">
        @include('pelanggan.layouts.spinner')


        @include('pelanggan.layouts.navbar')


        @include('pelanggan.layouts.header')


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                </div>
            </div>
        </div>
        <!-- Search End -->

        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">PROFIL</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                @auth
                @if(auth()->user()->level == 'Pelanggan')
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                @if($profil->datauser->gambar_ktp)
                                <img class="img-fluid rounded w-100" src="{{asset('storage/'.$profil->datauser->gambar_ktp)}}" alt="">
                                @else
                                <img class="img-fluid rounded w-100" src="{{asset('pelanggan/img/call-to-action.jpg')}}" alt="">
                                @endif
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <form action="{{route('editprofil')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Your Name" name="name" value="{{$profil->name}}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label for="name">Nama</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Your Email" name="email" value="{{$profil->email}}">
                                            <label for="email">Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('jenis_kelamin')is-invalid @enderror" id="jenis_kelamin" placeholder="Jenis Kelamin" name="jenis_kelamin" value="{{$profil->datauser->jenis_kelamin}}">
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('no_telp')is-invalid @enderror" id="no_telp" placeholder="No. Telepon" name="no_telp" value="{{$profil->datauser->no_telp}}">
                                            @error('no_telp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label for="no_telp">No. Telepon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('alamat_user')is-invalid @enderror" id="alamat_user" placeholder="Alamat" name="alamat_user" value="{{$profil->datauser->alamat_user}}">
                                            @error('alamat_user')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <label for="alamat_user">Alamat</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="hidden" name="oldImage" value="{{ $profil->datauser->gambar_ktp }}">
                                            <input type="file" class="form-control @error('gambar_ktp')is-invalid @enderror" id="gambar_ktp" name="gambar_ktp" accept="image/*">
                                            @error('gambar_ktp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endauth
            </div>
        </div>
        <!-- Call to Action End -->

        @include('pelanggan.layouts.footer')


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection