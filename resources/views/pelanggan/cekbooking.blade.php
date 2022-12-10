@extends('pelanggan.layouts.main')
@section('title', 'Cek Booking')
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
                @foreach($homestay as $item)
                    <h1 class="mb-3">Cek Booking {{$item->nama_homestay}}</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                @endforeach
                </div>
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <h6 class="mb-3" style="float: center;">Daftar Booked</h6>
                        <div class="form-group p-5" style="">
                            <form class="input-group" action="">
                            <input type="date" class="form-control" name="search" value="{{$search}}">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            </form>
                        </div>
                        <div class="row g-3">
                            @foreach($cek as $item)
                            <div class="col-md-4">
                                <div class="bg-light rounded p-3">
                                        <h6 class="heading text-center">{{$item->homestay->nama_homestay}}</h6>
                                        <p>
                                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d F Y') }} - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d F Y') }}
                                        </p>
                                        @if($item->keterangan=='Mulai')
                                        <p style="margin-top: 10px; color: green;"><b>Sedang Berlangsung</b></p>
                                        @endif
                                </div>
                            </div>
                            @endforeach
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