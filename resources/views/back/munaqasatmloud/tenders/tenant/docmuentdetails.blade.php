@extends('layouts.back')

@section('content')
    <div class="d-flex justify-content-between">
        <h6 class="text-end m-4 fw-blod">تـفـاصـيـل الـمـسـتـنـد </h6>
        @if ($tender->state == 0)
            <a class="btn btn-sm mybtn-secondary px-2 py-1 mx-5 mb-3 mt-4 p-0 fw-bold delete-btn" data-bs-toggle="modal"
                data-bs-target="#myModal12"><i class="fas fa-plus fw-bold text-white f-18"></i></a>
        @endif
    </div>
    <div style="margin-top: 3% !important; width: 100% !important;" class="modal fade  mt-5" id="myModal12" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog w-100 ">
            <div style="width: 140% !important" class="modal-content  bg-secondary1">
                <div class="bg-secondary1 border-0 text-center rounded p-4 pb-3 w-100 ">
                    <h4 class="pt-2">دفـتـر الـمـنـاقـصـة</h4>
                    <div class="table-responsive mt-5 ">
                        <div class="d-flex justify-content-between   text-center fw-bold text-white">
                            <p class="fw-bold px-3 m-0 text-end me-5 ">أدخل البنود ومواصفات عن المناقصة </p>
                        </div>

                        <form class="d-flex justify-content-center" action="{{ route('notebook.store') }}" method="POST">
                            @csrf

                            <div id="inputContainer" class="mx-5 p-0 w-100">
                                <div class="my-1 me-1 py-1">
                                    <input type="text" hidden value="{{ $docmuents[0]->tender_id }}" name="item"
                                        id="">
                                    <input class="my-1 me-1 py-1 w-100 p-2 myform-control  rounded-1" type="text"
                                        name="technical_title[]" placeholder="أدخل الـبـنـد" required>
                                    <textarea class=" my-1 me-1 py-1 w-100 p-2 myform-control  rounded-1" name="technical_description[]" id=""
                                        cols="10" rows="3" placeholder="اكـتـب وصـف عـن الـبـنـد" required></textarea>
                                </div>
                            </div>


                    </div>
                    <div class=" p-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-3 fs-6 m-2 mx-5 w-99"
                            href=""> اضـافـة </button>
                        </form>

                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
    </div>

    <div class="container-fluid mb-80  px-4">
        <div class="bg-secondary1 text-center rounded p-4 pb-3">
            <div class="table-responsive">

                {{--  --}}
                <table class="table  w-100 table-striped table-borderless align-middle  table-hover mb-0 text-center "  >
                    <thead>
                       
                            <th class="w-30" >الــبــنــود </th>
                            <th class="w-55">الــوصــف</th>
                            @if ($tender->state == 0)
                                <th >عــمــلــيــات</th>
                            @endif
                       
                    </thead>
                    <tbody>
                        @foreach ($docmuents as $docmuent)
                            <tr>
                                <td class="px-3">{{ $docmuent->technical_title }}</td>
                                <td class="px-3 " >{{ $docmuent->technical_description }}</td>
                                @if ($tender->state == 0)
                                    <td class="fw-bold ">
                                        {{-- <a class="btn btn-sm  fw-bold " href="{{ route('notebook.show',  $docmuent->id) }}"><i class="bi bi-info-circle fw-bold  f-18"></i></a> --}}

                                        <a class="btn btn-sm  fw-bold" href="{{ route('notebook.edit', $docmuent->id) }}"><i
                                                class="bi bi-pencil-fill fw-bold  f-18"></i></a>
                                        <a class="btn btn-sm fw-bold delete-btn" data-bs-toggle="modal"
                                            data-bs-target="#myModal{{ $docmuent->id }}" data-id="{{ $docmuent->id }}"
                                            data-name="{{ $docmuent->id }}"><i
                                                class="bi bi-trash fw-bold text-primary f-18"></i></a>
                                    </td>
                                @endif
                                <div style="margin-top: 15% !important" class="modal fade mt-5"
                                    id="myModal{{ $docmuent->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content  bg-secondary1">
                                            <div class="modal-header border-0 d-flex justify-content-between w-100">
                                                <h6 class="modal-title pt-2" id="exampleModalLabel"> هــل تــريــد حــذف
                                                    هـذا الـمـتـسـنـد ؟</h6>
                                            </div>
                                            <div class="modal-body border-0">
                                                <p>بالضغط على تأكيد سيتم حذف الـمـتـسـنـد نهائياً.</p>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <form action="{{ route('notebook.destroy', $docmuent->id) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn mybtn-secondary px-4">تأكيد</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary px-4"
                                                    data-bs-dismiss="modal">إلغاء</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{--  --}}
            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">

                <p></p>

                <a class="btn btn-sm btn-dark  px-4 fw-bold  m-2" href="{{ route('tender.index') }} ">رجـوع </a>
            </div>
        </div>

    </div>
@endsection
