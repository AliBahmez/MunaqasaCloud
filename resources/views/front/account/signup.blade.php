@extends('layouts.account')

@section('form')
    <div class="position-absolute col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4"
        style="z-index: 10 !important; right: 380px !important; top:7% !important; width: 61% !important;">
        <div class=" rounded  p-sm-5 mx-3" style="box-shadow: 0 0 5px rgb(229, 229, 229);background-color: #fffefe">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <p></p>
                <h4 class=""> انـشـاء حـسـاب</h4>
                <a class="a1" href="{{ route('home.front') }}"> <i class="fas fa-home fs-5"></i></a>
            </div>
            <form action="{{ route('freelancer.store') }}" method="POST">
                @csrf
                @if ($register == '1')
                    <div class="alert alert-danger" role="alert">
                        يرجى التحقق من صحة البيانات المدخلة والتأكد من إدخالها بشكل صحيح.
                    </div>
                @endif
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="my-4">
                            <input type="text" name="username" class="form-control my-1 py-2" id="floatingInput" required
                                placeholder="اسـم المستخدم ">
                        </div>
                        <div class="my-4">
                            <input type="email" name="email" class="form-control my-1 py-2" id="floatingInput" required
                                placeholder="البريد الأكـتـرونـي ">
                        </div>
                        <div class=" mb-4">
                            <input type="password" name="password" class="form-control py-2" id="floatingPassword" required
                                placeholder="كلمة المرور">
                        </div>
                    </div>


                    <div>
                        <div class=" my-4">
                            <input type="text" name="name" class="form-control py-2" id="floatingPassword" required
                                placeholder="  الأسم">
                        </div>
                        <div class=" mb-4">
                            <input type="text" name="title" class="form-control py-2" id="floatingPassword" required
                                placeholder="  العنوان">
                        </div>
                        <div class=" mb-4">
                            <input type="text" name="description" class="form-control py-2" id="floatingPassword"
                                required placeholder=" الوصف">
                        </div>

                    </div>

                </div>
                <button type="submit" class="btn mybtn1 py-2 w-100 ">تـسـجـيـل </button>
            </form>
        </div>
    </div>
@endsection
