@extends('layouts.back')



@section('content')
    <h6 class="text-end mx-4 mt-3 mb-4  f-18"> الـــعـــروض</h6>

    <div class="container-fluid  px-4 ">
        <ul class="nav nav-pills my-3 w-100 bg-secondary1 d-flex justify-content-between p-0 rounded" id="pills-tab"
            role="tablist">
            <li class="nav-item w-50 m-0 p-0" role="presentation ">
                <button class="nav-link active w-100 fw-bold pt-10p" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">فــعــالــــــة</button>
            </li>
            <li class="nav-item w-50" role="presentation">
                <button class="nav-link w-100 fw-bold pt-10p" id="pills-profile-tab " data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">مــنــتــهــيــة</button>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">

            {{-- 1 --}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container-fluid pt-2 px-0 mt-4 mb-3">
                    <div class="bg-secondary1 text-center rounded p-4">

                        <div class="table-responsive">
                            <table class="table table-striped table-borderless  align-middle mb-0  text-center">
                                <thead>
                                    <tr class="text-white fs-5">
                                        <th scope="col">الـمـنـاقـصـة</th>
                                        <th scope="col">جــهــة</th>
                                        <th scope="col">تـاريـخ الأنتهاء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tendersactive->isNotEmpty())
                                        @foreach ($tendersactive as $tender)
                                            <tr>
                                                <td class="fw-bold">{{ $tender->name }}</td>
                                                <td class="fw-bold">{{ $tender->title }}</td>

                                                <td class="fw-bold">{{ $tender->ending_date }}</td>


                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2 --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container-fluid pt-2 px-0 mt-4 mb-3">
                    <div class="bg-secondary1 text-center rounded p-4">

                        <div class="table-responsive">
                            <table class="table table-striped table-borderless  align-middle mb-0  text-center">
                                <thead>
                                    <tr class="text-white fs-5">
                                        <th scope="col">الـمـنـاقـصـة</th>
                                        <th scope="col">جــهــة</th>
                                        <th scope="col">تـاريـخ الأنتهاء</th>
                                        <th scope="col">عـمـلـيـات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tendersfinsh->isNotEmpty())
                                        @foreach ($tendersfinsh as $tender)
                                            <tr>
                                                <td class="fw-bold">{{ $tender->name }}</td>
                                                <td class="fw-bold">{{ $tender->title }}</td>
                                                <td class="fw-bold">{{ $tender->ending_date }}</td>
                                                @if ($tender->open_date < now())
                                                    <td>
                                                        <a class="btn btn-sm  fw-bold "
                                                            href="{{ route('frrelanceroffers.show', $tender->id) }}"><i
                                                                class="bi bi-info-circle fw-bold  f-18"></i></a>
                                                    </td>
                                                @else
                                                    <td>يوم فتح المظاريف</td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    {{-- **** --}}

@endsection
