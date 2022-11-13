<!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{route('landingpage')}}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{asset('pelanggan/img/logo.png')}}" alt="Icon" style="width: 40px; height: 40px;">
                    </div>
                    <h1 class="m-0 text-primary">NK Cafe Malang</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{route('landingpage')}}" class="nav-item nav-link">Home</a>
                        <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                        <a href="{{route('contactus')}}" class="nav-item nav-link">Contact</a>
                        @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->name}}</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="property-list.html" class="dropdown-item">Profil</a>
                                <a class="dropdown-item" href="{{route('logoutpelanggan')}}" onclick="
                                event.preventDefault(); document.getElementById('formLogout').submit();">Logout</a>
                                <form id="formLogout" action="{{route('logoutpelanggan')}}" method="get" >@csrf</form>
                            </div>
                        </div>
                        @else
                        <a href="{{route('registerpelanggan')}}" class="nav-item nav-link">Daftar</a>
                        <a href="{{route('loginpelanggan')}}" class="nav-item nav-link">Login</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->