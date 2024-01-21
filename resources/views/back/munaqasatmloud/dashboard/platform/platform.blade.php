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
                        <h6 class="mb-0 ">{{ $tenderCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary1 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">عدد الـمـؤسـسـات</p>
                        <h6 class="mb-0 ">{{ $tanent }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary1 rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">عدد الـمـقـاولـيـن</p>
                        <h6 class="mb-0 ">{{ $contractor }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary1 rounded d-flex align-items-center justify-content-between py-4 px-3">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2 fw-bold">المناقصات المنتهي</p>
                        <h6 class="mb-0 ">{{ $tenderfinsh }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary1  text-center rounded p-4 pt-2 ">
            <div class="d-flex align-items-center justify-content-between ">
                <h6 class="mb-0 fw-bold ">مـوسـسـات قـيـد الأنتـظـار</h6>
                <a href="{{ route('foundations.index') }}" class="fw-bold  border-white p-3">عــرض الـكـل</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-striped table-borderless table-hover mb-0 text-center">
                    <thead class="text-white">

                        <th scope="col">اسـم </th>
                        <th scope="col">بـيـانـات الأتـصـال</th>
                        <th scope="col">رقم السحل التجاري</th>
                        <th scope="col">عـمـلـيـات</th>

                    </thead>
                    <tbody>
                        <tr hidden></tr>
                        @foreach ($organizations as $org)
                            <tr>
                                <td class="fw-bold">{{ $org->title }}</td>
                                <td class="fw-bold">{{ $org->contact_statement }}</td>
                                <td class="fw-bold">{{ $org->trade_document }}</td>
                                <td class="fw-bold">
                                    <a class="btn btn-sm fw-bold"
                                        href="{{ route('foundations.show', ['foundation' => $org->id]) }}">
                                        <i class="bi bi-info-circle fw-bold f-18"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->


    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4 mb-60">
        <div class="row g-4  ">

            <div class="col-sm-12 col-md-6 col-xl-8 mb-60">
                <div class="h-100 bg-secondary1 rounded p-4 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0  ">الـمـقـاولـيـن</h6>
                        <a href="{{ route('contractor.index') }}">عــرض الـكـل</a>
                    </div>
                    <table class="table text-start table-borderless table-striped table-hover mb-0 text-center">
                        <thead class="text-white">

                            <th scope="col">الإســم</th>
                            <th scope="col">عـمـلـيـات </th>

                        </thead>
                        <tbody>
                            @foreach ($contractors as $contractor)
                                <tr>
                                    <td class="">{{ $contractor->name }}</td>
                                    <td>
                                        <a class="btn btn-sm fw-bold"
                                            href="{{ route('contractor.show', ['contractor' => $contractor->id]) }}">
                                            <i class="bi bi-info-circle fw-bold f-18"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4 mb-60">
                <div class="h-100 bg-secondary1 rounded p-4  ">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h6 class="mb-0 fw-bold">الـتـقـويـم</h6>
                    </div>
                    <div class="" id="calender"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->
@endsection
