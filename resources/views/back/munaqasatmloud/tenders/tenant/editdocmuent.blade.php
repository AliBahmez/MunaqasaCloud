@extends('layouts.back')

@section('content')
    <div style="margin-right: 12% !important; margin-bottom: 65px !important" class="container-fluid mt-5 px-4 me-5">
        <div class="bg-secondary1 text-center rounded p-4 pb-3 w-75 mb-80">
            <p></p>
            <h4 class="pt-2">تـعـديـل الـمـتـسـنـد </h4>

            <div class="table-responsive mt-4">
                <div class="d-flex justify-content-between   text-center fw-bold text-white">
                    <p class="fw-bold py-2 m-0 text-end me-6 ">عـدل البنود ومواصفات عن المناقصة </p>

                </div>
                <form class="d-flex justify-content-center" action="{{ route('notebook.update', $docmuents->id) }}"
                    method="POST">
                    @method('PUT')
                    @csrf

                    <div id="inputContainer" class="m-0 p-0 w-75">

                        <div class="my-1 me-1 py-1">
                            <input type="text" name="tender_id" hidden value="{{ $docmuents->tender_id }}">
                            <input value="{{ $docmuents->technical_title }}"
                                class="my-1 me-1 py-1 myform-control w-100 p-2 rounded-1" type="text"
                                name="technical_title" placeholder="أدخل الـبـنـد" required>
                            <textarea class="myform-control my-1 me-1 py-1 w-100 p-2 rounded-1" name="technical_description" id=""
                                cols="10" rows="3" placeholder="اكـتـب وصـف عـن الـبـنـد" required>{{ $docmuents->technical_description }}
                        </textarea>
                        </div>
                    </div>


            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">
                <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-4 me-3 fs-6 m-2"> تـعـديـل </button>
                </form>
                <a class="btn btn-sm btn-dark  px-4  m-2 ms-3" href="javascript:history.back()  ">رجــــوع</a>
            </div>
        </div>
    </div>
    <script>
        function addInputs() {
            var inputContainer = document.getElementById('inputContainer');

            var div = document.createElement('div');
            div.className = 'my-1 me-1 py-1';

            var input = document.createElement('input');
            input.className = 'my-1 me-1 py-1 w-100 p-2 rounded-1';
            input.type = 'text';
            input.name = 'technical_title[]';
            input.placeholder = 'أدخل الـبـنـد';
            div.appendChild(input);

            var textarea = document.createElement('textarea');
            textarea.className = 'my-1 me-1 py-1 w-100 p-2 rounded-1';
            textarea.name = 'technical_description[]';
            textarea.placeholder = 'اكـتـب وصـف عـن الـبـنـد';
            textarea.rows = '3'
            div.appendChild(textarea);

            inputContainer.appendChild(div);
        }
    </script>
@endsection
