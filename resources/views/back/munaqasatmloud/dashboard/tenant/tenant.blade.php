@extends('layouts.back')



@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4" dir="ltr">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary1 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">عـدد الـمـنـاقـصـات</p>
                        <h6 class="mb-0">{{ $tenderCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary1 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3 ">
                        <p class="mb-2 fw-bold"> قـيـد الأعــداد</p>
                        <h6 class="mb-0">{{ $tenderstart }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary1 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-2">
                        <p class="mb-2 fw-bold">المناقصات الفعالة </p>
                        <h6 class="mb-0">{{ $tenderactive }}</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary1 rounded d-flex align-items-center justify-content-between py-4 px-3">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">المناقصات المنتهي</p>
                        <h6 class="mb-0">{{ $tenderfinsh }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary1 text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between pb-2 ">
                <h6 class="mb-0 fw-bold">الـمـنـاقـصـات قـيـد الأنتـظـار</h6>
                <a href="{{ route('tender.index') }}" class="fw-bold">عــرض الـكـل</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start table-striped table-borderless align-middle  table-hover mb-0 text-center">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"> الـمـنـاقـصـة</th>

                            <th scope="col">الـمـعـد </th>
                            <th scope="col" class="w-25">عـمـلـيـات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tender as $under)
                            <tr>
                                <td class="fw-bold"> {{ $under->name }}</td>
                                <td class="fw-bold"> {{ $under->title }}</td>
                                <td class="fw-bold ">
                                    @if ($under->tenderDocuments()->exists())
                                        <a class="btn btn-sm  fw-bold" href="{{ route('notebook.show', $under->id) }}"><i
                                                class="fas fa-file-contract fw-bold  f-18"></i></a>
                                    @else
                                        <a class="btn btn-sm  fw-bold" href="{{ route('createnote', $under->id) }}"><i
                                                class="fa fa-address-book fw-bold  f-18"></i></a>
                                    @endif
                                    <a class="btn btn-sm  fw-bold"
                                        href="{{ route('tender.show', ['tender' => $under->id]) }}"><i
                                            class="bi bi-info-circle fw-bold  f-18"></i></a>
                                    <a class="btn btn-sm  fw-bold"
                                        href="{{ route('tender.edit', ['tender' => $under->id]) }}"><i
                                            class="bi bi-pencil-fill fw-bold  f-18"></i></a>
                                    <a class="btn btn-sm fw-bold delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#myModal{{ $under->id }}" data-id="{{ $under->id }}"
                                        data-name="{{ $under->id }}"><i
                                            class="fas fa-trash-alt fw-bold text-primary f-18"></i></a>
                                    {{-- <i class="fas fa-trash-alt"></i> --}}
                                </td>
                            </tr>
                            <div style="margin-top: 15% !important" class="modal fade mt-5" id="myModal{{ $under->id }}"
                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    {{-- <img src="{{asset('img/581836630bf47a39992af79248125883-removebg-preview.png')}}" width="70px" alt=""> --}}
                                    <div class="modal-content  bg-secondary">
                                        <div class="modal-header border-0 d-flex justify-content-between w-100">
                                            <h6 class="modal-title pt-2" id="exampleModalLabel"> هــل تــريــد حــذف هـذا
                                                الـمـنـاقـصـة {{ $under->name }}؟</h6>
                                            {{-- <button type="button" class="btn-close mx-5 btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                                        </div>
                                        <div class="modal-body border-0">
                                            <p>بالضغط على تأكيد سيتم حذف العنصر نهائياً.</p>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <form action="{{ route('tender.destroy', $under->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary px-4">تأكيد</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary px-4"
                                                data-bs-dismiss="modal">إلغاء</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->


    <!-- Widgets Start -->
    <div style="margin-bottom: 70px !important" class="container-fluid pt-4 px-4 ">
        <div class="row g-4 mb-80">

            <div class="col-sm-12 col-md-6 col-xl-8">
                <div class="h-100 bg-secondary1 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-0 ">
                        <h6 class="mb-0 fw-bold">الـمـقـاولـيـن</h6>
                        <a href="" class="fw-bold">عــرض الـكـل</a>
                    </div>
                    <div class="container-fluid pt-2 px-0  mb-3">
                        <div class="bg-secondary1 text-center rounded ">

                            <div class="table-responsive">
                                <table
                                    class="table table-striped table-borderless align-middle  table-hover mb-0 text-center">
                                    <thead>
                                        <tr class="text-white fs-5">
                                            <th scope="col">الـمـقـاول</th>
                                            <th scope="col">المناقصة</th>
                                            <th scope="col">عـمـلـيـات </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($TenderSubmit->tenders as $tender)
                                            @foreach ($tender->tenderApplicants as $applicant)
                                                <tr>
                                                    {{-- <td class="fw-bold">{{ $applicant->freelancer->name ? $applicant->freelancer->name : "لايوجد مقاول" }}</td> --}}
                                                    @if ($applicant->status === 0)
                                                        <td class="fw-bold">{{ $applicant->freelancer->name }} </td>

                                                        <td class="fw-bold">{{ $tender->name }}</td>
                                                       <td>
                                                            {{ $applicant->id }}
                                                            <a class="btn btn-sm fw-bold"
                                                                href="{{ route('contractors.show', $applicant->id) }}"><i
                                                                    class="bi bi-info-circle fw-bold f-18"></i></a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endforeach
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary1 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0 p-2 fw-bold">الـتـقـويـم</h6>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->
@endsection
