<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>GreenHost - Web Hosting HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/Logo.png') }}" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('style/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('style/main.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family: Droid;
            src: url('{{ asset('font/Droid.Arabic.Kufi_DownloadSoftware.iR_.ttf') }}');
            src: url('{{ asset('font/Droid.Arabic.Kufi_DownloadSoftware.iR_.ttf') }}')format('truetype');
        }

        * {
            font-family: 'Droid', 'sans-serif';
        }
    </style>
</head>

<body class="bg-white">
    <div class="container-fluid p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        {{-- ******************************* --}}
        <div class="row w-100   ">
            @yield('form')
        </div>
        <div>
            <img style="width:250px" class="pt-5" src="{{ asset('img/Logo.png') }}" alt="">
        </div>
        <div id="contact"
            class="container-fluid bg-primary position-absolute bottom-0 w-100 text-white footer mt-5 pt-5 wow fadeIn"
            data-wow-delay="0.1s" style=" padding-top: 23% !important; ">
            <div class="container-fluid">

            </div>
        </div>
        {{-- ************************************ --}}

        <!-- Sign In Start -->

        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/lib2/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/branch.js') }}"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
