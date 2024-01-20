@extends('layouts.back')

@section('content')
    <h6 class="text-end mx-4 mt-3 fw-bold text-while f-18"> الـمـقـاولـيـن الـمـتـقـدمـيـن لـلـمـنـاقـصـة</h6>
    <div class="container-fluid pt-2 px-4  mb-3">
        <div class="bg-secondary1 text-center rounded p-4">

            <div class="table-responsive">
                <table class="table text-start align-middle table-striped table-borderless table-hover mb-0 text-center">
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
                                    @if ($applicant->status === 0)
                                        <td class="fw-bold">{{ $applicant->freelancer->name }} </td>

                                        <td class="fw-bold">{{ $tender->name }}</td>

                                        <td>
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
@endsection
