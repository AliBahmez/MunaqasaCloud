@extends('layouts.back')

@section('content')
    <h6 class="text-end px-4 py-3 text-white fw-bold f-18">فـاتـورة لـلـدخـول الـى الـمـنـاقـصـة </h6>

    <div class=" hreo   mb-60 ">
        <div style="margin-bottom: 70px !important" class="w-75 bg-secondary1 text-center rounded p-4 ">
            <div class="text-end">
                <h6>مـلاحـظـة : </h6>
                <p class="pb-3"> من الضروري فحص الفاتورة بعناية قبل التأكيد. عند التأكيد، لا يمكن إلغاء دخول المقاول في
                    المناقصة .

                </p>
            </div>
            @if ($applicant)
                <div class="d-flex justify-content-between mx-4">
                    <div class="mt-4 text-end">
                        <h6>اسم الـمـنـاقـصـة </h6>
                        <p class="me-2 mb-4">{{ $applicant->tender->name }}</p>
                        <h6>اسـم الـمـقـاول</h6>
                        <p class="me-2 mb-4"> {{ $applicant->freelancer->name }}</p>
                        <h6>تـاريـخ الـتـقـديـم</h6>
                        <p class="me-2">{{ $applicant->created_at }} </p>
                    </div>
                    <label for="input-file" id="drop-area2" class="p-2">
                        <img width="100%" height="280vh" style="background-size: cover !important; border-radius: 20px"
                            class="" src="{{ asset('Upload/' . $applicant->voucher) }}" alt="Uploaded Image">


                    </label>
                </div>
            @endif
            <h6 class="text-end mt-4 mx-2">هل ترغب في قبول الـمـقـاول لـدخول المناقصة؟</h6>
            <div class="mt-3 p-0 d-flex justify-content-between">
                <form action="{{ route('contractors.update', $applicant->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="number" name="status" id="" value="1" hidden>
                    <button type="submit" class="btn btn-sm mybtn-secondary  fw-bold px-5 fs-6 m-2" href="">
                        تـأكـيـد </button>
                </form>
                <a class="btn btn-sm btn-dark  px-3  m-2" data-bs-toggle="modal"
                    data-bs-target="#myModal{{ $applicant->id }}" data-id="{{ $applicant->id }}"
                    data-name="{{ $applicant->id }}" href="">رفـض</a>
                <div style="margin-top: 15% !important" class="modal fade mt-5" id="myModal{{ $applicant->id }}"
                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content  bg-secondary1">
                            <div class="modal-header border-0 d-flex justify-content-between w-100">
                                <h6 class="modal-title pt-2" id="exampleModalLabel"> هــل تــريــد رفـض الـمـقـاول مـن دخـول
                                    الـمـنـاقـصـة؟</h6>
                            </div>
                            <div class="modal-body border-0">
                                <p>بالضغط على تأكيد سيتم رفـض الـمـقـاول نهائياً.</p>
                            </div>
                            <div class="modal-footer border-0">
                                <form action="{{ route('contractors.destroy', $applicant->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn mybtn-secondary  px-4">تأكيد</button>
                                </form>
                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
