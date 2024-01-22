@extends('layouts.back')

@section('content')
    <h6 class="text-end px-4 py-3  fw-bold f-18">تـفـاصـيـل تـقـديـم عـلـى الـمـنـاقـصـة </h6>

    <div class=" hreo  ">
        <div class="w-75 bg-secondary1 text-center rounded p-4  mb-80">
            <div class="text-end">
                <h6>مـلاحـظـة : </h6>
                <p class="pb-3">يجب عليك اولاً تحويل قيمة دخول الى المناقصة الى حسابنا في العمقي <span
                        class="fw-bold px-1">{{ $accountnumber }}</span>
                    من ثم ارفاق الصوره السند الى هنا
                </p>
            </div>
            <form action="{{ route('tendersfree.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="input-file" id="drop-area" class="container-fluid bg-s">
                    <input type="file" name="voucher" accept="image/*" id="input-file" hidden required>
                    <input type="text" name="id" value="{{ $id }}" hidden>
                    <div id="img-view">
                        <img src="{{ asset('img/508-icon.png') }}" alt="">
                        <p class="">اسـحـب وأفـلـت الـصـورة هـنـا <br>أو
                            <span style="color: #0074B7"> انـقـر هـنـا لـتـحـمـيـل صـورة</span>
                        </p>
                    </div>
                </label>
                <div class="mt-3 p-0 d-flex justify-content-between">
                    <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2" href=""> ارســال
                    </button>
            </form>
            <a class="btn btn-sm btn-dark  px-3  m-2" href="javascript:history.back()">رجـوع </a>
        </div>
    </div>
    </div>


   
@endsection
