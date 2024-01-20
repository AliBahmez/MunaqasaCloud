@extends('layouts.back')



@section('content')
    <h6 class="text-end mx-4 mt-3 fw-bold text-while f-18"> الـعـروض</h6>
    <div class="container-fluid  px-4 ">
        <ul class="nav rounded nav-pills my-3 w-100 bg-secondary1 d-flex justify-content-between p-0" id="pills-tab"
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
                            <table
                                class="table text-start table-striped table-borderless align-middle  table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-white fs-5">
                                        <th scope="col">الـمـنـاقـصـة</th>
                                        <th scope="col">الـمـقـاول</th>
                                        <th scope="col">تـاريـخ الـتـقـديـم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($organization)
                                        @foreach ($organization->tenders as $tender)
                                            @foreach ($tender->tenderApplicants as $applicant)
                                                @foreach ($applicant->tenderOffers as $offer)
                                                    <tr>
                                                        <td class="fw-bold">{{ $tender->name }}</td>
                                                        <td class="fw-bold">{{ $applicant->freelancer->name }}</td>
                                                        <td class="fw-bold">{{ $offer->created_at }}</td>
                                                    </tr>
                                                @break
                                            @endforeach
                                         @endforeach
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
                    <table
                        class="table text-start table-striped table-borderless align-middle  table-hover mb-0 text-center">
                        <thead>
                            <tr class="text-white fs-5">
                                <th scope="col">الـمـنـاقـصـة</th>
                                <th scope="col">الـمـقـاول</th>
                                <th scope="col">تـاريـخ الـتـقـديـم</th>
                                <th scope="col">عـمـلـيـات </th>
                            </tr>
                        </thead>
                        <tbody>

                            </tr>
                            @if ($organizationfinish)
                            @foreach ($organizationfinish->tenders as $tender)
                                @foreach ($tender->tenderApplicants as $applicant)
                                    @foreach ($applicant->tenderOffers as $offer)
                                        <tr>
                                            <td class="fw-bold">{{ $tender->name }}</td>
                                            <td class="fw-bold">{{ $applicant->freelancer->name }}</td>
                                            <td class="fw-bold">{{ $offer->created_at }}</td>
                                            <td>
                                               
                                                <a class="btn btn-sm fw-bold" href="{{ route('tenant.offers.showoffers', ['tenderId' => $tender->id, 'freelancerId' => $applicant->freelancer->id]) }}">
                                                    <i class="bi bi-info-circle fw-bold f-18"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                       
                                        @break
                                    @endforeach
                                @endforeach
                            @endforeach
                        @else
                            <tr>
                                <td class="fw-bold">No tenders found</td>
                            </tr>
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
