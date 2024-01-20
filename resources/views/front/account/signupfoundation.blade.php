@extends('layouts.account')

@section('form')
    <div class="position-absolute col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4"
        style="z-index: 10 !important; right: 380px !important; top:7% !important; width: 61% !important;">
        <div class=" rounded p-4 p-sm-5 mx-3" style="box-shadow: 0 0 5px rgb(229, 229, 229);background-color: #fffefe">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <p></p>
                <h4 class=""> انـشـاء حـسـاب</h4>
                <a class="a1" href="{{ route('home.front') }}"> <i class="fas fa-home fs-5"></i></a>

            </div>

            @if ($register == '1')
                {{-- <p>Not Registered!!</p> --}}
                <div class="alert alert-danger" role="alert">
                    يرجى التحقق من صحة البيانات المدخلة والتأكد من إدخالها بشكل صحيح.
                </div>
            @endif
            <form action="{{ route('FoundationRegistration.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-between">

                    <div class=" mb-3">
                        <label for="">الأسم</label>
                        <input type="text" name="title" class="form-control mt-2 py-2" id="floatingPassword" required
                            value="{{ old('title') }}">
                    </div>
                    <div class=" mb-4">
                        <label for="">بيان الأتصال</label>
                        <input type="text" name="contact_statement" class="form-control mt-2 py-2" id="floatingPassword"
                            pattern="^(3|77|78|71|73|70)\d{3,9}$" required value="{{ old('contact_statement') }}"
                            placeholder="  ">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="">اسـم المستخدم </label>
                        <input type="text" name="username" class="form-control mt-2 py-2" id="floatingInput" required
                            value="{{ old('username') }}" placeholder="">
                    </div>


                    <div class=" mb-3">
                        <label for="">الحساب البنكي</label>
                        <input type="text" name="accountnumber" class="form-control mt-2 py-2 cout" id="floatingPassword"
                            required value="{{ old('accountnumber') }}" placeholder=" ">
                    </div>
                </div>
                <div class="d-flex justify-content-between">

                    <div class="mb-3">
                        <label for="">البريد الأكـتـرونـي </label>
                        <input type="email" name="email" class="form-control mt-2 py-2" id="floatingInput" required
                            value="{{ old('email') }}" placeholder="">
                    </div>
                    <div class="mb-3 w-49">
                        <label for="trade_document">السجل التجاري</label>
                        <input type="file" name="trade_document" class="form-control my-2 py-2" id="floatingPassword"
                            required>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class=" mb-3">
                        <label for="">كلمة المرور</label>
                        <input type="password" name="password" class="form-control mt-2 py-2" id="floatingPassword" required
                            value="{{ old('password') }}" placeholder="">
                    </div>


                    <div class=" mb-3">
                        <label for="">الوصف</label>
                        <input type="text" name="description" class="form-control mt-2 py-2" id="floatingPassword"
                            required value="{{ old('description') }}" placeholder=" ">
                    </div>
                </div>
                <button type="submit" class="btn mybtn1 py-2 w-100 ">تـسـجـيـل </button>
            </form>
        </div>
    </div>
@endsection
