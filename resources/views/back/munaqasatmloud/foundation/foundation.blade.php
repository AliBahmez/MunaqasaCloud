@extends('layouts.back')

@section('content')
    <h6 class="text-end mx-4 mt-3  text-while f-18"> الـمـؤسـسـات</h6>
    <div class="container-fluid  px-4 ">
        <ul class="nav nav-pills rounded my-3 w-100 bg-secondary1 d-flex justify-content-between p-0" id="pills-tab"
            role="tablist">
            <li class="nav-item w-33 m-0 p-0" role="presentation ">
                <button class="nav-link active w-100 fw-bold pt-10p" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">قـيـد الأنـتــظــار</button>
            </li>
            <li class="nav-item w-33" role="presentation">
                <button class="nav-link w-100 fw-bold pt-10p" id="pills-profile-tab " data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">المــفــعــلــة</button>
            </li>
            <li class="nav-item w-33" role="presentation">
                <button class="nav-link w-100 fw-bold pt-10p" id="pills-contact-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                    aria-selected="false">الـمـحـجـوبــة</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">


            {{-- 1 --}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container-fluid pt-2 p-0">
                    <div class="bg-secondary1 text-center rounded p-4">

                        <div class="table-responsive">
                            <table
                                class="table text-start align-middle table-striped table-borderless table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col">اسـم </th>
                                        {{-- <th scope="col">عـنـوان </th> --}}
                                        <th scope="col">بـيـانـات الأتـصـال</th>
                                        <th scope="col">رقم السحل التجاري</th>
                                        <th scope="col">عـمـلـيـات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr hidden></tr>
                                    @foreach ($organizations as $org)
                                        <tr>
                                            {{-- <td class="fw-bold">{{ $org->name }}</td> --}}
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
            </div>


            {{-- 2 --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container-fluid pt-2 p-0">
                    <div class="bg-secondary1 text-center rounded p-4">

                        <div class="table-responsive">
                            <table
                                class="table text-start table-striped table-borderless align-middle table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col">اسـم </th>
                                        {{-- <th scope="col">عـنـوان </th> --}}
                                        <th scope="col">بـيـانـات الأتـصـال</th>
                                        <th scope="col">رقم السحل التجاري</th>
                                        <th scope="col">عـمـلـيـات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Effective as $eff)
                                        <tr>
                                            {{-- <td class="fw-bold">{{ $eff->name }}</td> --}}
                                            <td class="">{{ $eff->title }}</td>
                                            <td class="">{{ $eff->contact_statement }}</td>
                                            <td class="">{{ $eff->trade_document }}</td>
                                            <td class="">
                                                <a class="btn btn-sm fw-bold"
                                                    href="{{ route('foundations.show', ['foundation' => $eff->id]) }}">
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

            </div>
            {{-- 3 --}}
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="container-fluid pt-2 p-0">
                    <div class="bg-secondary1 text-center rounded p-4">

                        <div class="table-responsive">
                            <table
                                class="table text-start align-middle table-striped table-borderless table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col">اسـم </th>
                                        {{-- <th scope="col">عـنـوان </th> --}}
                                        <th scope="col">بـيـانـات الأتـصـال</th>
                                        <th scope="col">رقم السحل التجاري</th>
                                        <th scope="col">عـمـلـيـات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Blocked as $blo)
                                        <tr>
                                            {{-- <td class="fw-bold">{{ $blo->name }}</td> --}}
                                            <td class="fw-bold">{{ $blo->title }}</td>
                                            <td class="fw-bold">{{ $blo->contact_statement }}</td>
                                            <td class="fw-bold">{{ $blo->trade_document }}</td>
                                            <td class="fw-bold">
                                                <a class="btn btn-sm fw-bold"
                                                    href="{{ route('foundations.show', ['foundation' => $blo->id]) }}">
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
            </div>
        </div>

    </div>
@endsection
