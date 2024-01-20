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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0 ">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    {{-- <h4 class="m-0 cloud fw-bold">مـنـاقـصـة كـلاود</h4> --}}
                    <div class="brand-logo">
                        <img src="img/Logo-white.png" alt="">
                    </div> <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse mx-5" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#" class="nav-item nav-link ">الرئـسـيـة</a>
                        <a href="#about" class="nav-item nav-link">حــولـنـا</a>
                        <a href="#foundation" class="nav-item nav-link">الـمـؤسـسـات</a>
                        <a href="#foundation" class="nav-item nav-link">الـمـقـاولـيـن</a>
                        <a href="#contact" class="nav-item nav-link">تـواصـل مـعـنـا</a>
                    </div>
                    <a href="{{ route('account.front.signin') }}" class="btn bty py-2 px-4 ms-3"
                        id="loginButton">تـسـجـيـل دخــول</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header mb-5 ">
                <div class="container my-5 py-5 px-lg-5 ">
                    <div class="row g-5">
                        <div class="col-lg-6 pt-5 text-center text-lg-end">
                            <h1 class="display-4 text-white mb-4 animated slideInLeft">مـنـاقـصـة كـلاود
                            </h1>
                            <p class="text-white animated slideInLeft">توفير فرصة للشركات والمقاولين والموردين لتقديم
                                عروضهم والمنافسة على فرصة الفوز بعقد لتنفيذ مشروع.</p>
                        </div>
                        <div style="height: 50vh !important; width: 50% !important;"
                            class="col-lg-6 text-center w-50 text-lg-start mb-5 ">
                            <img class="img-fluid animated zoomIn"
                                src="{{ asset('img/purely-vector-illustration-white-background_915071-14532-removebg-preview.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- About Start -->
        <div id="about" class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-4">
                            <h2 class="mb-2"> مـرحـبـا بـكـم فـي مـنـاقـصـة كـلاود</h2>
                        </div>
                        <p class="mb-4">توفير فرصة للشركات والمؤسسات لتقديم عروضهم والمنافسة على الفوز بعقد لتنفيذ
                            مشروع معين، حيث يقوم الشركات بالتعاقد مع المقاولين لتنفيذ هذه المشاريع وفقًا للمواصفات
                            والشروط المحددة.

                        </p>
                        <div class="row g-3">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="bg-light rounded text-center p-4">
                                    <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ $tanent }}</h2>
                                    <p class="mb-0 text-dark">الـمـؤسـسـات</p>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="bg-light rounded text-center p-4">
                                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ $contractor }}</h2>
                                    <p class="mb-0 txet-dark">الـمـقـاولـيـن</p>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="bg-light rounded text-center p-4">
                                    <i class="fa fa-check fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ $tenderfinsh }}</h2>
                                    <p class="mb-0 text-dark">المناقصات</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img class="img-fluid wow zoomIn " style="padding-top: 16% !important" data-wow-delay="0.5s"
                            height="500px"
                            src="img/Challenges_Of_Inspection_Management_Software_Vendors-removebg-preview1.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->



        <!-- Comparison Start -->
        <div id="foundation" class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mx-auto mb-5 pb-4 wow fadeInUp"
                    data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="mb-3">خـدمـاتـنـا</h3>
                </div>
                <div class="row g-5 comparison position-relative">
                    <div class="col-lg-6 pe-lg-5">
                        <div class="section-title position-relative mx-auto mb-4 pb-4">
                            <h3 class="fw-bold mb-0"> مـؤسـسـات</h3>
                        </div>
                        {{-- fas fa-palette --}}
                        <div class="row gy-3 gx-5">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <i class="fas fa-file fa-3x text-primary mb-3"></i>
                                <h5 class="fw-bold">إدارة المناقصات</h5>
                                <p>إدارة عملية المناقصات العامة</p>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <i class="fas fa-fire fa-3x text-primary mb-3"></i>
                                <h5 class="fw-bold">اخـتـيـار الـعـروض</h5>
                                <p>إدارة عملية تقييم.</p>
                            </div>
                            <div class="col-sm-6 wow fadeIn " data-wow-delay="0.5s">
                                <i class="fas fa-globe fa-3x text-primary mb-3"></i>
                                <h5 class="fw-bold">الـخـدمـات </h5>
                                <p>مجالات متنوعة مثل الإدارة وغيرها</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5">
                        <div class="section-title position-relative mx-auto mb-4 pb-4">
                            <h3 class="fw-bold mb-0"> مقاوليـن</h3>
                        </div>
                        <div class="row gy-3 gx-5">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <i class="fa fa-server fa-3x text-secondary mb-3"></i>
                                <h5 class="fw-bold">تـقـديـم عـرض</h5>
                                <p> خدمات المتخصصة للمقاولين. </p>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <i class=" fas fa-book-open fa-3x text-secondary mb-3"></i>
                                <h5 class="fw-bold">تـقـديـم المـسـتـنـد </h5>
                                <p>تقديم عروض أسعار للبنود </p>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fas fa-globe fa-3x text-secondary mb-3"></i>
                                <h5 class="fw-bold">الـخـدمـات </h5>
                                <p>التخطيط والجدولة، والمراقبة والمراجعة.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Start -->
        <div id="contact" class="container-fluid bg-primary text-white footer mt-5 pt-5 wow fadeIn"
            data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="container-xxl py-5">
                    <div class="container px-lg-5">
                        <div class="section-title position-relative text-center mx-auto mb-5 pb-4 wow fadeInUp"
                            data-wow-delay="0.1s" style="max-width: 600px;">
                            <h3 class="mb-3 mt-3 text-white">تـواصـل لأي استفسار</h3>
                            <p class="mb-1">لا تتردد في الاتصال بنا إذا كان لديك أي أسئلة أو استفسارات. نحن هنا
                                لمساعدتك وتقديم المعلومات التي تحتاجها.</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-lg-9 col-md-6 ">
                                <div style="margin-right: 0px !important;" class="wow fadeInUp  "
                                    data-wow-delay="0.2s">
                                    <form action="{{ route('home.store') }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Your Name">
                                                    <label for="name">Your Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Your Email">
                                                    <label for="email">Your Email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="subject"
                                                        placeholder="Subject">
                                                    <label for="subject">Subject</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                                    <label for="message">Message</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn mybtn w-100 py-3" type="submit"> أرسـال
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container px-lg-5 w-100">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; جميع الحقوق <a href="#" class="px-1 fw-bold">مناقصـة كــلاود</a> محفوظة.
                        </div>
                        <div class="col-md-6  text-center text-md-end">
                            <div class="footer-menu d-flex justify-content-center">
                                <a href="#">الرئـسـيـة</a>
                                <a href="#about">حــولـنـا</a>
                                <a href="#foundation">الـمـؤسـسـات</a>
                                <a href="#foundation">الـمـقـاولـيـن</a>
                                <a href="#contact">تـواصـل مـعـنـا</a>
                                <a href=""></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg mybtn btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/lib2/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/lib2/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/branch.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(window).on("scroll", function() {
                console.log($(this).scrollTop());
                if ($(this).scrollTop() >= 30) {
                    // set to new image
                    $(".brand-logo img").attr("src", "img/Logo.png");
                } else {
                    // back to default 
                    $(".brand-logo img").attr("src", "img/Logo-white.png");
                }
            });
        });
        $(document).ready(function() {
            $(window).on("scroll", function() {
                console.log($(this).scrollTop());
                if ($(this).scrollTop() >= 30) {
                    // add a new class
                    $("#loginButton").addClass("bty1").removeClass("bty");
                } else {
                    // back to default class
                    $("#loginButton").addClass("bty").removeClass("bty1");
                }
            });
        });
    </script>
</body>

</html>
