<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>مـنـاقـصـة كـلاد</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/Logo.png') }}" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

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

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                {{-- <a href="" class="navbar-brand mx-4 mb-3"> --}}
                <h4 class=" mx-4 mt-2 text-white">
                    <i class="fas fa-cloud ms-2 text-white" aria-hidden="true"></i>مـنـاقـصـة كـــلاود
              {{-- <img height="55vh" class="me-4" width="150px" src="{{asset('img/Logo-white.png')}}" alt=""> --}}
                </h4>

                {{-- </a> --}}
                
                <div class="navbar-nav  w-100">
                    @php
                        $tenant = Account::getTenantName();
                    @endphp
                    @if ($tenant === 'platform')
                        {{-- |||||||||||||||||||||||||||||||||||||||| --}}
                        {{-- Start Platform Section --}}


                        <ul class="w-100 m-0  p-0 list-unstyled">
                            <li class=" mb-4 mt-4 mx-3">
                                <h5 class="text-white  mx-4 fw-bold">الــمــنــصــة </h5>

                                
                            </li>
                            @php
                                $permissions = ['account__manage_accounts', 'account__manage_users', 'account__list_users'];
                                $hasPermission = Account::hasPermissions($permissions);
                            @endphp
                            @if ($hasPermission)
                                <li>
                                    <a href="{{ route('dashboard.user') }}" class="nav-item nav-link  fw-bold {{ request()->is('user/dashboard') ? 'active' : '' }}"><i
                                            class="bi bi-grid ms-2 "></i>لـوحـة الـتـحـكـم</a>
                                </li>
                                {{-- <li>
                                    <div class="nav-item dropdown">
                                        <a href="index.html" class="nav-item nav-link dropdown-toggle fw-bold "
                                            data-bs-toggle="dropdown"><i class="fas fa-key ms-2"></i>الـحـسـابـات</a>
                                        <div
                                            class="dropdown-menu bg-transparent border-0 p-0 m-0 dropdown-menu-start text-end me-4 ">
                                            <a href="{{ route('account.back.roles.index') }}"
                                                class="nav-item nav-link w-75 ">
                                                <i class="fa fa-laptop ms-1"></i>
                                                الأدوار
                                            </a>
                                            <a href="{{ route('account.back.users.index') }}"
                                                class="nav-item nav-link w-75">
                                                <i class="fa fa-laptop ms-1"></i>
                                                المستخدمين
                                            </a>

                                        </div>
                                    </div>
                                </li> --}}
                            @endif
                          



                            <li>
                                <a href="{{ route('foundations.index') }}" class="nav-item nav-link fw-bold {{ request()->is('platform/foundations') ? 'active' : '' }}">
                                    <i class="fas fa-university ms-2"></i>الـمـؤسـسـات
                                </a>


                            </li>
                            <li>
                                <a href="{{ route('contractor.index') }}" class="nav-item nav-link fw-bold {{ request()->is('platform/contractor') ? 'active' : '' }}">
                                    <i class="fas fa-hard-hat ms-2"></i> المقاولين
                                </a>
                            </li>
                           

                        </ul>
                    @endif
                    {{-- @elseif($x == 2) --}}
                    @php
                        $tenantId = Account::getTenantId();
                        $organization = App\Models\MunaqasatCloud\MunaqasatCloudOrganization::find($tenantId);
                    @endphp
                    @if ($organization != null)
                        <ul class="w-100 m-0 p-0 list-unstyled">
                            <li class=" mx-2 my-4">
                                <h5 class="text-white mx-4  fw-bold">حساب الـمـؤسـسـة</h5>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.foundation') }}"
                                    class="nav-item nav-link  fw-bold {{ request()->is('foundation/dashboard') ? 'active' : '' }}"><i
                                        class="bi bi-grid ms-2 "></i>لـوحـة الـتـحـكـم</a>
                            </li>
                            @php
                                $permissions = ['account__manage_accounts', 'account__manage_users', 'account__list_users'];
                                $hasPermission = Account::hasPermissions($permissions);
                            @endphp
                            @if ($hasPermission)
                                <li>
                                    <div class="nav-item dropdown">
                                        <a href="index.html" class="nav-item nav-link dropdown-toggle fw-bold "
                                            data-bs-toggle="dropdown"><i class="fa fa-laptop ms-2"></i>الـحـسـابـات</a>
                                        <div
                                            class="dropdown-menu bg-transparent border-0 p-0 m-0 dropdown-menu-start text-end me-4">
                                            <a href="{{ route('roles') }}" class="nav-item nav-link  w-75">
                                                <i class="fa fa-laptop ms-1"></i>
                                                الأدوار
                                            </a>
                                            <a href="{{ route('users') }}" class="nav-item nav-link w-75">
                                                <i class="fa fa-laptop ms-1"></i>
                                                المستخدمين
                                            </a>

                                        </div>
                                    </div>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('tender.index') }}"
                                    class="nav-item nav-link  fw-bold {{ request()->is('tenant/tender') ? 'active' : '' }}"><i
                                        class="fas fa-file-contract ms-2"></i>الـمـنـاقـصـات</a>


                            </li>
                            <li>
                                <a href="{{ route('contractors.index') }}"
                                    class="nav-item nav-link  fw-bold {{ request()->is('tenant/contractors') ? 'active' : '' }}"><i
                                        class="fas fa-hard-hat ms-2"></i>الـمـقـاولـيـن</a>
                            </li>

                            <li>
                                <a href="{{ route('offers.index') }}"
                                    class="nav-item nav-link  fw-bold {{ request()->is('tenant/offers') ? 'active' : '' }}"><i
                                        class="fas fa-tags ms-2"></i>الــعــروض</a>
                            </li>
                            
                           
                              
                    @endif
                    @php
                        $tenantId = Account::getTenantId();
                        $freelancer = App\Models\MunaqasatCloud\MunaqasatCloudFreelancer::find($tenantId);
                    @endphp
                    @if ($freelancer != null)
                        <li >
                            <h5 class=" text-white my-4 mx-4 fw-bold"> حساب مـقـاول</h5>
                        </li>

                        <li>
                            <a href="{{ route('dashboard.contractor') }}"
                                class="nav-item nav-link fw-bold {{ request()->is('contractor/dashboard') ? 'active' : '' }}">
                                <i class="bi bi-grid ms-2"></i> لـوحـة الـتـحـكـم
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tenders.index') }}"
                                class="nav-item nav-link fw-bold {{ request()->is('freelancer/tenders') ? 'active' : '' }}">
                                <i class="fas fa-hard-hat ms-2"></i> الـمـنـاقـصـات
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frrelanceroffers.index') }}"
                                class="nav-item nav-link fw-bold {{ request()->is('freelancer/frrelanceroffers') ? 'active' : '' }}">
                                <i class="fas fa-tags ms-2"></i> الــعــروض
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mytenders.index') }}"
                                class="nav-item nav-link fw-bold {{ request()->is('freelancer/mytenders') ? 'active' : '' }}">
                                <i class="fas fa-hard-hat ms-2"></i> مـنـاقـصـاتـي
                            </a>
                        </li>

                        </ul>
                    @endif
                     </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content position-relative">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0">
                        <i class="fa fa-user-edit"></i>
                    </h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars "></i>
                </a>
                <form class="d-none d-md-flex  form-header">
                    <input class="form-control bg-white border-0 w-100" type="search" placeholder="بــحــث ...">
                </form>
                <div class="navbar-nav align-items-center ms-auto mynav">
                    <div class="nav-item dropdown">

                    </div>
                  

                    @php
                        $tenantId = Account::getTenantId();
                        //  $tenantname = Account::getTenantName();
                        if ($tenant === 'platform') {
                            $tenantname = 'admin';
                        } elseif ($organization != null) {
                            $tenantname = App\Models\MunaqasatCloud\MunaqasatCloudOrganization::where('id', $tenantId)->value('title');
                        } elseif ($freelancer != null) {
                            $tenantname = App\Models\MunaqasatCloud\MunaqasatCloudFreelancer::where('id', $tenantId)->value('name');
                        }
                    @endphp
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('img/user.jpg') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex px-1 fw-bold"> {{ $tenantname }} </span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end bg-secondary1  border-0 rounded-0 rounded-bottom m-0">
                            <form method="post" action="{{ route('account.back.signout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center"
                                    href="#">
                                    <i class="bi bi-box-arrow-right ms-2"></i>
                                    <span>تسجيل الخروج</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('content')



            <!-- Footer Start -->
            <div class="container-fluid  px-4  mb-2 position-absolute bottom-0">
                <div class="bg-secondary rounded-top p-4 ">
                    <div class=" text-center text-white">
                        &copy; جميع الحقوق <a href="#" style="color: #003B73 !important"
                            class="px-1 fw-bold">مناقصـة كــلاود</a> محفوظة.

                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        //   ****
        function toggleText() {
            var shortText = document.getElementById('shortText');
            var longText = document.getElementById('longText');
            var btnText = document.getElementById('myBtn');

            if (longText.style.display === 'none') {
                longText.style.display = 'inline';
                shortText.style.display = 'none';
                btnText.textContent = 'عـرض اقل...';
            } else {
                longText.style.display = 'none';
                shortText.style.display = 'inline';
                btnText.textContent = 'عـرض الـمـزيـد...';
            }
        }

       

        function animateProgress() {
            var progressToFill = progress / 100;
            endAngle = (2 * Math.PI) * progressToFill + startAngle;

            drawProgress();

            if (progress < 55) {
                progress++;
                requestAnimationFrame(animateProgress);
            }
        }

        animateProgress();
        });
    </script>
</body>

</html>
