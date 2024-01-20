@extends('layouts.back')

@section('content')
    <div style="margin-right: 12% !important; margin-bottom: 65px !important" class="container-fluid mt-5 px-4 me-5">
        <div class="bg-secondary1 text-center rounded p-4 pb-3 w-75 mb-80">
            <p></p>
            <h4 class="pt-2">دفـتـر الـمـنـاقـصـة</h4>
            <div class="table-responsive mt-5 ">
                <div class="d-flex justify-content-between   text-center fw-bold text-white">
                    {{-- <p class="fw-bold p-2 m-0 text-end  ">اختر المناقصة</p> --}}
                    <p class="fw-bold py-2 m-0 text-end me-6 ">أدخل البنود ومواصفات عن المناقصة </p>
                    <a class="btn btn-sm mybtn-secondary fw-bold px-4 ms-5 fs-6 m-2" href="javascript:void(0);"
                        onclick="addInputs()">اضــافــة</a>

                </div>
                <form class="d-flex justify-content-center" action="{{ route('notebook.store') }}" method="POST">
                    @csrf

                    <div id="inputContainer" class="mx-5 p-0 w-100">
                        <div class="my-1 me-1 py-1">
                            <input type="text" hidden value="{{ $id }}" name="item" id="">
                            <input class="my-1 me-1 py-1 w-100 p-2 rounded-1 myform-control" type="text"
                                name="technical_title[]" placeholder="أدخل الـبـنـد" required>
                            <textarea class=" my-1 me-1 py-1 w-100 p-2 rounded-1 myform-control" name="technical_description[]" id=""
                                cols="10" rows="3" placeholder="اكـتـب وصـف عـن الـبـنـد" required></textarea>
                        </div>
                    </div>


            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">
                <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2 me-5" href=""> ارسـال
                </button>
                </form>

                <a class="btn btn-sm btn-dark  px-4 fw-bold  m-2 ms-5" href="javascript:history.back()">رجـــــوع</a>
            </div>
        </div>
    </div>

    <script>
        function addInputs() {
            var inputContainer = document.getElementById('inputContainer');

            var div = document.createElement('div');
            div.className = 'my-1 me-1 py-1';

            var input = document.createElement('input');
            input.className = 'my-1 me-1 py-1 w-100 p-2 rounded-1 myform-control';
            input.type = 'text';
            input.name = 'technical_title[]';
            input.placeholder = 'أدخل الـبـنـد';
            div.appendChild(input);

            var textarea = document.createElement('textarea');
            textarea.className = 'my-1 me-1 py-1 w-100 p-2 rounded-1 myform-control';
            textarea.name = 'technical_description[]';
            textarea.placeholder = 'اكـتـب وصـف عـن الـبـنـد';
            textarea.rows = '3'
            div.appendChild(textarea);

            inputContainer.appendChild(div);
        }
    </script>
@endsection
