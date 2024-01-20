@extends('layouts.account')
@section('form')
    @if ($request == '1')
        <div class="position-absolute col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4"
            style="z-index: 10 !important; right: 380px !important; top:7% !important; width: 61% !important;">
            <div class=" rounded  p-sm-5 mx-3" style="box-shadow: 0 0 5px rgb(229, 229, 229);background-color: #fffefe">
                <div class="d-flex align-items-center justify-content-between mb-2">

                    <h4 class=""> تم تسجيلك بنجاح</h4>
                    <a class="a1" href="{{ route('home.front') }}"> <i class="fas fa-home fs-5"></i></a>
                </div>
                <div class="text-center d-flex justify-content-center">

                    <img height="200vh" src="{{ asset('img/OIP__1_-removebg-preview (1).png') }}" alt="">
                </div>
                <p class="mt-4 a1">سيتم التحقق من حسابك، وفي حالة الموافقة، سيتم إرسال إشعار لك عبر البريد الإلكتروني الخاص
                    بك.</p>
            </div>
        </div>
    @endif
    @if ($request == '-1')
        <div class="position-absolute col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4"
            style="z-index: 10 !important; right: 380px !important; top:7% !important; width: 61% !important;">
            <div class=" rounded  p-sm-5 mx-3" style="box-shadow: 0 0 5px rgb(229, 229, 229);background-color: #fffefe">
                <div class="d-flex align-items-center justify-content-between mb-2">

                    <h4 class=""> تـم حـجـب هـذا الـحـسـاب</h4>
                    <a class="a1" href="{{ route('home.front') }}"> <i class="fas fa-home fs-5"></i></a>
                </div>
                <div class="text-center d-flex justify-content-center">

                    <img height="200vh" src="{{ asset('img/OIP__2_-removebg-preview.png') }}" alt="">
                </div>
                <p class="mt-4 a1">تواصل مع الإدارة عن طريق نموذج الإدخال المتوفر في<a class="a2"
                        href="{{ route('home.front') }}"> الصفحة الرئيسية</a>.</p>
            </div>
        </div>
    @endif
@endsection
