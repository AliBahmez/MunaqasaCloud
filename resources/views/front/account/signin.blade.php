@extends('layouts.account')



@section('form')
    <div class=" position-absolute col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4"
        style="z-index: 10 !important; right: 420px !important; top:7% !important; width: 37% !important;">
        <div class=" rounded p-4 p-sm-5 my-4 mx-3 bg-white" style="box-shadow: 0 0 5px rgb(229, 229, 229)">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <p></p>
                <h4>تـسـجـيـل الـدخـول</h4>
                <a class="a1" href="{{ route('home.front') }}"> <i class="fas fa-home fs-5"></i></a>

            </div>
            <form method="POST" action="{{ route('account.front.signin.submit') }}"
                class="row row-eq-height lockscreen  mt-0 mb-0">
                @csrf
                @if ($register == '2')
                    <div class="alert alert-danger" role="alert">
                        يرجى التحقق من صحة البيانات المدخلة والتأكد من إدخالها بشكل صحيح.
                    </div>
                @endif

                {{-- <p>Registered!!</p> --}}

                <div class="my-4">
                    <input type="text" value="{{ old('username') }}" name="username" id="username" required
                        class="form-control my-1 py-2" id="floatingInput" placeholder="اسـم المستخدم">
                </div>
                <div class=" mb-4">
                    <input type="password" value="{{ old('password') }}" name="password" class="form-control py-2"
                        id="floatingPassword" placeholder="كلمة المرور">
                </div>
                <div class="form-group">
                </div>

                <button type="submit" class="btn mybtn1 py-2 w-100 mb-4">تـسـجـيـل الـدخـول</button>
                <div class="d-flex justify-content-center">
                    <p class="text-center mb-0">ليس لديك حساب؟
                        {{-- <a href="{{ route('account.front.signup') }}">انشاء حساب</a> --}}
                    </p>
                    <!-- Example single danger button -->
                    <div class="btn-group mx-1">
                        <a style="color: #0074B7 !important" type="button" class=" dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            انشاء حساب
                        </a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="{{ route('account.front.signupfoundation') }}">مـؤسـسـة</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('account.front.signup') }}">مـقـاول </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
