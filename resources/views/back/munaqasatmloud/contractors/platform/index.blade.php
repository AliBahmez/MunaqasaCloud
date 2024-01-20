@extends('layouts.back')

@section('content')
    <h6 class="text-end mx-4 mt-3   f-18"> الـمـقـاولـيـن</h6>

    <div class="container-fluid  px-4 ">
        <ul class="nav nav-pills rounded my-3 w-100 bg-secondary1 d-flex justify-content-between p-0" id="pills-tab"
            role="tablist">
            <li class="nav-item w-50 m-0 p-0" role="presentation ">
                <button class="nav-link active w-100 fw-bold pt-10p" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">مــفــعــلـيـة</button>
            </li>
            <li class="nav-item w-50" role="presentation">
                <button class="nav-link w-100 fw-bold pt-10p" id="pills-profile-tab " data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">مـحـجـوبـيــة</button>
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

                                    <th scope="col">الإســم</th>
                                    <th scope="col">عـنـوان</th>
                                    <th scope="col">عـمـلـيـات </th>

                                </thead>
                                <tbody>
                                    @foreach ($contractors as $contractor)
                                        <tr>
                                            <td class="fw-bold">{{ $contractor->name }}</td>
                                            <td class="fw-bold">{{ $contractor->title }}</td>
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
                </div>
            </div>


            {{-- 2 --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container-fluid pt-2 p-0">
                    <div class="bg-secondary1 text-center rounded p-4">

                        <div class="table-responsive">
                            <table
                                class="table text-start align-middle table-striped table-borderless table-hover mb-0 text-center">
                                <thead>

                                    <th scope="col">الإســم</th>
                                    <th scope="col">عـنـوان</th>
                                    <th scope="col">عـمـلـيـات </th>

                                </thead>
                                <tbody>
                                    @foreach ($contractorsblock as $contractor)
                                        <tr>
                                            <td class="fw-bold">{{ $contractor->name }}</td>
                                            <td class="fw-bold">{{ $contractor->title }}</td>
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
                </div>

            </div>


        </div>

    </div>
@endsection
