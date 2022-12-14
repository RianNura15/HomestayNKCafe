@extends('pelanggan.layouts.main')
@section('title', 'Detail Homestay')
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


        <!-- Category Start -->
        <div class="container-xxl py-5">
            @foreach($homestay as $item)
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">{{$item->nama_homestay}}</h1>
                    <p>FASILITAS</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                @foreach($kt as $item)
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{asset('pelanggan/img/icon-apartment.png')}}" alt="Icon">
                                </div>
                                <h6>{{$item->nama_fasilitas}}</h6>
                                <span>{{$item->jumlah_fasilitas}} </span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                @foreach($km as $item)
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{asset('pelanggan/img/icon-villa.png')}}" alt="Icon">
                                </div>
                                <h6>{{$item->nama_fasilitas}}</h6>
                                <span>{{$item->jumlah_fasilitas}} </span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                @foreach($dp as $item)
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{asset('pelanggan/img/icon-house.png')}}" alt="Icon">
                                </div>
                                <h6>{{$item->nama_fasilitas}}</h6>
                                <span>{{$item->jumlah_fasilitas}} </span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                @foreach($rt as $item)
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{asset('pelanggan/img/icon-housing.png')}}" alt="Icon">
                                </div>
                                <h6>{{$item->nama_fasilitas}}</h6>
                                <span>{{$item->jumlah_fasilitas}} </span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                @foreach($rm as $item)
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{asset('pelanggan/img/icon-neighborhood.png')}}" alt="Icon">
                                </div>
                                <h6>{{$item->nama_fasilitas}}</h6>
                                <span>{{$item->jumlah_fasilitas}} </span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                @foreach($rk as $item)
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{asset('pelanggan/img/icon-condominium.png')}}" alt="Icon">
                                </div>
                                <h6>{{$item->nama_fasilitas}}</h6>
                                <span>{{$item->jumlah_fasilitas}} </span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                @foreach($tb as $item)
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{asset('pelanggan/img/icon-luxury.png')}}" alt="Icon">
                                </div>
                                <h6>{{$item->nama_fasilitas}}</h6>
                                <span>{{$item->jumlah_fasilitas}} </span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Category End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                @foreach($homestay as $item)
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="{{asset('storage/'.$item->gambar)}}">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">{{$item->nama_homestay}}</h1>
                        <p class="mb-4">{{$item->desc_homestay}}</p>
                        <p><i class="fa fa-check text-primary me-3"></i>3 menit dari Apartment Begawan & Kampus UMM</p>
                        <p><i class="fa fa-check text-primary me-3"></i>5 menit dari kampus UNISMA</p>
                        <p><i class="fa fa-check text-primary me-3"></i>10 menit dari kampus UB & kampus UIN</p>
                        @auth
                        @if(auth()->user()->status == 'Aktif')
                        <a class="btn btn-primary py-3 px-5 mt-3" href="{{route('transaksi', $item->id_homestay)}}">Booking {{$item->nama_homestay}}</a>
                        @elseif(auth()->user()->status !== 'Aktif')
                        <a class="btn btn-primary py-3 px-5 mt-3" href="">Booking {{$item->nama_homestay}}</a>
                        @endif
                        @else
                        <a class="btn btn-primary py-3 px-5 mt-3" href="{{route('loginpelanggan')}}">Booking {{$item->nama_homestay}}</a>
                        @endauth
                        <a class="btn btn-primary py-3 px-5 mt-3" href="{{route('cekbooking', $item->id_homestay)}}">Cek Booking {{$item->nama_homestay}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- About End -->


        <!-- Property List Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Detail Homestay</h1>
                            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
                        </div>
                    </div>
                    
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @foreach($fasilitas as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""><img class="img-fluid" src="{{asset('storage/'.$item->gambar)}}" style="width: 600px; height: 400px;" alt=""></a>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">{{$item->nama_fasilitas}}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{asset('pelanggan/img/testimonial-2.jpg')}}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{asset('pelanggan/img/testimonial-3.jpg')}}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        

        @include('pelanggan.layouts.footer')


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection
    