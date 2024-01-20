@extends('layouts.back')

@section('content')
<section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>500</h1>
        <h2>خطأ في النظام</h2>
        <a class="btn" href="{{ route('dashboard.user') }}">الرجوع للرئيسية</a>
        <img src="{{ asset('assets/img/not-found.svg') }}" class="img-fluid py-5" alt="Page Not Found">
      </section>
@endsection