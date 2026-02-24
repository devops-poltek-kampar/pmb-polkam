<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PMB Politeknik Kampar</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('/assets/images/polkam.png') }}" rel="icon">
    <link href="{{ asset('/assets-website/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets-website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets-website/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets-website/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets-website/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets-website/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('/assets-website/css/main.css') }}" rel="stylesheet">

    <style>
        #hero {
            background: linear-gradient(to right, #ff820d, #ffd900);
        }

        #header {
            background: linear-gradient(to right, #ff820d, #ffd900);
        }
    </style>


    @stack('css')

</head>

<body class="index-page">

    <header id="header" class="header sticky-top">
        <div class="container-fluid container-xl position-relative">

            <div class="top-row d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.webp" alt=""> -->
                    <h1 class="sitename text-white">PMB Polkam</h1>
                </a>

                <div class="d-flex align-items-center">

                    <div class="social-links">
                        <a href="#" class="facebook text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="twitter text-white"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="instagram text-white"><i class="bi bi-instagram"></i></a>
                    </div>

                    {{-- <form class="search-form ms-4">
                        <input type="text" placeholder="Search..." class="form-control bg-white">
                        <button type="submit" class="btn"><i class="bi bi-search"></i></button>
                    </form> --}}

                </div>
            </div>

        </div>

        <div class="nav-wrap">
            <div class="container d-flex justify-content-center position-relative">
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ url('/') }}" class="">Beranda</a></li>
                        <li><a href="{{ url('/profile') }}" class="">Profil</a></li>
                        <li><a href="{{ url('/info-pmb') }}" class="">Info PMB</a></li>
                        <li><a href="{{ url('/berita') }}" class="">Berita</a></li>
                        <li><a href="{{ url('/jadwal-biaya') }}" class="">Jadwal & Biaya</a></li>
                        <li><a href="{{ url('/tutorial') }}" class="">Tutorial</a></li>
                        <li><a href="{{ url('/unduh-berkas') }}" class="">Unduh Berkas</a></li>
                        <li><a href="{{ url('/login') }}" class="">Login</a></li>
                        {{-- <li><a href="#portfolio">Portfolio</a></li> --}}
                        {{-- <li><a href="#team">Team</a></li> --}}
                        {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#" class="text-white">Dropdown 1</a></li>
                                <li class="dropdown"><a href="#" class="text-white"><span>Deep Dropdown</span> <i
                                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                                    <ul>
                                        <li><a href="#" class="text-white">Deep Dropdown 1</a></li>
                                        <li><a href="#" class="text-white">Deep Dropdown 2</a></li>
                                        <li><a href="#" class="text-white">Deep Dropdown 3</a></li>
                                        <li><a href="#" class="text-white">Deep Dropdown 4</a></li>
                                        <li><a href="#" class="text-white">Deep Dropdown 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="text-white">Dropdown 2</a></li>
                                <li><a href="#" class="text-white">Dropdown 3</a></li>
                                <li><a href="#" class="text-white">Dropdown 4</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li><a href="#contact" class="text-white">Contact</a></li> --}}
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div>

    </header>

    <main class="main">

        @yield('content')

    </main>

    <footer id="footer" class="footer position-relative">

        <div class="container">
            <div class="row gy-5">

                <div class="col-lg-4">
                    <div class="footer-brand">
                        <a href="index.html" class="logo d-flex align-items-center mb-3">
                            <span class="sitename">PMB POLKAM</span>
                        </a>
                        <p class="tagline">Innovating the digital landscape with elegant solutions and timeless
                            design.</p>

                        <div class="social-links mt-4">
                            <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" aria-label="Tiktok"><i class="bi bi-tiktok"></i></a>
                            <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" aria-label="Dribbble"><i class="bi bi-dribbble"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="footer-links-grid">
                        {{-- <div class="row">
                            <div class="col-6 col-md-4">
                                <h5>Company</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Our Team</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Newsroom</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4">
                                <h5>Services</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">Web Development</a></li>
                                    <li><a href="#">UI/UX Design</a></li>
                                    <li><a href="#">Digital Strategy</a></li>
                                    <li><a href="#">Branding</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4">
                                <h5>Support</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms of Service</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer-cta">
                        <h5>Let's Connect</h5>
                        <a href="#" class="btn btn-outline">Telusuri</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-content">
                            <p class="mb-0">© <span class="sitename">PMB POLITEKNIK KAMPAR</span>. </p>
                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you've purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                                Powered by <a href="https://bootstrapmade.com/">UPT ICT POLITEKNIK KAMPAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    {{-- <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div> --}}

    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets-website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets-website/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/assets-website/js/main.js') }}"></script>

</body>

</html>
