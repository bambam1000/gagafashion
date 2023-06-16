<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('page_title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.jpg" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}} " rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/about.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/contact.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/detail.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/cart.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: eBusiness
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->



    <header class="header" id="header">
        <nav class="nav container">
            <div class="logo">
                <a href="{{ route('home')}}">
                    <img src="{{ asset('assets/img/logo.jpg')}}" alt="logo">
                </a>
            </div>

            <div class="nav_menu" id="nav_menu">
                <ul class="nav_list">
                    <li class="nav_item {{ Request::is('home') ? 'active' : '' }}">
                        <a href="{{route('home')}}" class="nav_link">
                            <i class='bx bx-home'></i>
                            <span class="nav_name">Accueil </span>
                        </a>
                    </li>

                    <li class="nav_item {{ Request::is('about') ? 'active' : '' }}">
                        <a href="{{route('about')}}" class="nav_link">
                            <i class='bx bx-user'></i>
                            <span class="nav_name">A propos</span>
                        </a>
                    </li>

                    <li class="nav_item {{ Request::is('accueil') ? 'active' : '' }}">
                        <a href="https://afriquechique.blogspot.com" target="_blank" class="nav_link">
                            <i class='bx bxl-blogger'></i>
                            <span class="nav_name">Blog </span>
                        </a>
                    </li>

                    <li class="nav_item {{ Request::is('contact') ? 'active' : '' }}">
                        <a href="{{route('contact')}}" class="nav_link">
                            <i class='bx bxs-contact'></i>
                            <span class="nav_name">Contact </span>
                        </a>
                    </li>


                </ul>
            </div>



            <div class="nav_menu1" id="nav_menu">
                <ul class="nav_list nav1">
                    @if (Route::has('login'))

                    @auth
                    <li class="nav_item {{ Request::is('showcart') ? 'active' : '' }}">
                        <a href="{{url('showcart')}}" class="nav_link">

                            <span class="nav_name"><i class="fas fa-shopping-cart" style="margin-right: 5px;"> </i> Cart[{{$count}} ] </span>
                        </a>
                    </li>

                    <li class="nav_item login">
                        <x-app-layout>

                        </x-app-layout>
                    </li>


                    @else
                    <li class=" nav_item {{ Request::is('login') ? 'active' : '' }} ">
                        <a href="{{ route('login') }}" class="nav_link">

                            <span class="nav_name">Connexion </span>
                        </a>
                    </li>

                    @if (Route::has('register'))
                    <li class="nav_item {{ Request::is('register') ? 'active' : '' }}">
                        <a href="{{ route('register') }}" class="nav_link">

                            <span class="nav_name">Inscription </span>
                        </a>
                    </li>
                    @endif
                    @endauth

                    @endif

                </ul>
            </div>
        </nav>
    </header>


    @yield('content')



    <!-- ======= Footer ======= -->

    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>



            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">GAGAFASHION</a>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#maListeDeroulante').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue !== '') {
                    window.location.href = selectedValue;
                }
            });
        });
    </script>

    <script>
        function goBack() {
            history.back(-1);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.nav_item').on('click', function() {
                $('.nav_item').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

</body>

</html>