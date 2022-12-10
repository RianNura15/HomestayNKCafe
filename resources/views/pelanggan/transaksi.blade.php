@extends('pelanggan.layouts.main')
@section('title', 'Booking Homestay')
@section('content')
    <div class="container-xxl bg-white p-0">
        @include('pelanggan.layouts.spinner')


        @include('pelanggan.layouts.navbar')


        @include('pelanggan.layouts.header')


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                
            </div>
        </div>
        <!-- Search End -->

        
        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                @foreach($data as $item)
                    <h1 class="mb-3">Booking {{$item->nama_homestay}}</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                @endforeach
                </div>
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                @foreach($data as $item)
                                <img class="img-fluid rounded w-100" src="{{asset('storage/'.$item->gambar)}}" style="width: 300px; height: 400px;" alt="">
                                @endforeach
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <form action="{{route('booking')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            @foreach($data as $item)
                                            <input type="hidden" name="homestay_id" value="{{$item->id_homestay}}">
                                            <input type="hidden" name="hargasewa" value="{{$item->harga}}">
                                            @endforeach
                                            <input type="date" class="form-control" id="tanggal_mulai" placeholder="Tanggal Mulai" name="tanggal_mulai" value="" required>
                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="tanggal_selesai" placeholder="Tanggal Selesai" name="tanggal_selesai" value="" required>
                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select border-0 py-3" name="bank_id" required>
                                            <option selected>Pilih Tujuan Pembayaran</option>
                                            @foreach($bank as $item)
                                            <option value="{{$item->id_bank}}" required>{{$item->nama_bank}} - {{$item->no_rek}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit" onclick="return confirm('Apakah Anda Sudah yakin?')">Booking</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->


        @include('pelanggan.layouts.footer')


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection