

<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
  
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
            <div class="position-absolute col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4"
            style="z-index: 10 !important; right: 380px !important; top:7% !important; width: 61% !important;">
            <div class=" rounded  p-sm-5 mx-3" style="box-shadow: 0 0 5px rgb(229, 229, 229);background-color: #fffefe">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    
                    <h4 class=""> {{$foundation_name}}مرحبا مؤسسة</h4>
                   </div>
                <p class="mt-4 a1">نود إعلامكم بأن قد تم قبولكم في النظام. يمكنكم الآن مزاولة عملكم في نظامنا. سنكون سعداء بخدمتكم.</p>
            <a href="https://bahmuz.hadramout-bootcamps.com">متابعة الى منافصة كلاود</a>
            </div>
            </div>
        </div>
   
</body>

</html>
