
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aidmeuk</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap@5.3.0_dist_css_bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cdn.datatables.net_1.13.5_css_jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css" />
    
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/popup.css')}}"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css"> --}}
</head>

<body>

    

    @include('frontend.inc.header')
    
    @yield('content')

    @include('frontend.inc.footer') 



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="{{ asset('assets/js/bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/iconify.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script src="{{ asset('assets/js/code.jquery.com_jquery-2.2.0.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/slick.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/cdn.datatables.net_1.13.5_js_jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="https://raw.githubusercontent.com/graingert/WOW/master/src/WOW.js" type="text/javascript"></script>

    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script>
        // page schroll top
        function pagetop() {
            window.scrollTo({
                top: 100,
                behavior: 'smooth',
            });
        }
    </script>

    <script type="text/javascript">
        new WOW().init();
        $(document).ready(function () {
            // partners
            $('.partners').slick({
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 5,
                slidesToScroll: 1,
                draggable: true,
                swipeToSlide: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,

                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            dots: true,
                            centerMode: true,
                            centerPadding: '0px',
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            arrows: false,
                            dots: true,
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            dots: true,
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                ]
            });

        });




    </script>

    @yield('script')

</body>

</html>

