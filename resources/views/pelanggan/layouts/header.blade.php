<!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Homestay yang<span class="text-primary"> Nyaman</span> untuk menginap bersama keluarga</h1>
                    <p class="animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet
                        sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        @foreach($data as $item)
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{asset('storage/'.$item->gambar)}}" style="width: 700px; height: 700px">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->