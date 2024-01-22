@extends('layouts.back')

@section('content')
    <h6 class="text-end px-4 py-3  fw-bold f-18 ">تـفـاصـيـل الـمـنـاقـصـة </h6>
    <div class="container-fluid  px-4  mb-80">
        <div class="bg-secondary1 text-center rounded p-4 pb-3">
            <div class="table-responsive">
                <table class="table text-end align-middle table-striped table-borderless table-hover mb-0 ">

                    <thead>

                        <th class="px-3 w-250"> الـمـنـاقـصـة</th>
                        <th class="px-3  "> الـوصـف</th>

                    </thead>
                    <tr>
                        <td class="px-3  w-250">اســم </td>
                        <td class="px-3 ">{{ $tender->name }}</td>
                    </tr>
                    <tr>
                        <td class="px-3 ">الـجـهـة</td>
                        <td class="px-3 ">{{ $tender->title }}</td>
                    </tr>
                    <tr>
                        <td class="px-3 ">الـرقـم </td>
                        <td class="px-3 ">{{ $tender->number }}</td>
                    </tr>
                    <tr>
                        <td class="px-3 ">الـغـرض </td>
                        <td class="px-3">
                            {{ substr($tender->description, 0, 50) }}{{ strlen($tender->description) > 50 ? '...' : '' }}
                            <span class="more" style="display: none;">{{ $tender->description }}</span>
                            <span class="dots">...</span>
                            <small onclick="toggleDescription(this)" class="myBtn">عـرض الـمـزيـد...</small>
                        </td>

                    </tr>

                    <tr>
                        <td class="px-3 ">قـيـمـة دخـول الـمـنـاقـصـة </td>
                        <td class="px-3 ">{{ $tender->participation_price }} ريـال</td>
                    </tr>

                    <tr>
                        <td class="px-3 ">تاريخ البداية </td>
                        <td class="px-3 ">{{ $tender->starting_date }}</td>
                    </tr>
                    <tr>
                        <td class="px-3 ">تاريخ الإنـتـهـاء </td>
                        <td class="px-3 ">{{ $tender->ending_date }}</td>
                    </tr>
                    <tr>
                        <td class="px-3 ">تاريخ فتح المظاريف </td>
                        <td class="px-3 ">{{ $tender->open_date }}</td>
                    </tr>
                    <tr>
                        <td class="px-3 ">مكان العمل </td>
                        <td class="px-3 ">{{ $tender->working_location }}</td>
                    </tr>
                </table>
            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">
                @if ($tenderApplicant)
                    @if (!$tenderOffers->isNotEmpty() && $tenderApplicant->status == 1)
                        <a class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2"
                            href="{{ route('notebookfreelancer.show', $tender->id) }}">تقدم الـى الـدفـتـر</a>
                    @endif
                @else
                    <a class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2"
                        href="{{ route('tendersfree.show', $tender->id) }}">تقدم الـى الـمـنـاقـصـة</a>
                @endif
                <a class="btn btn-sm btn-dark  px-3  m-2" href="{{ route('tenders.index') }}">رجوع </a>

            </div>
        </div>

    </div>
   

@endsection
