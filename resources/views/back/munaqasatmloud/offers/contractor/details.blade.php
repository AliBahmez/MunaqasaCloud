@extends('layouts.back')

@section('content')
    <h6 class="text-end m-4 ">تـفـاصـيـل الـعـرض </h6>
    <div class="container-fluid mb-80 px-4">
        <div class="bg-secondary1 text-center rounded p-4 py-3 mb-4">
            <h6 class="text-end pb-1">تفاصيل الـمـنـاقـصـة</h6>
            <div class="table-responsive">
                <table class="table text-end align-middle table-striped  table-borderless table-hover mb-0 ">
                    <tbody>
                        <tr>
                            <td class="w-25">الـمـنـاقـصـة</td>
                            <td>{{ $tender[0]->name }}</td>
                        </tr>
                        <tr>
                            <td>جـهـة</td>
                            <td>{{ $tender[0]->title }}</td>
                        </tr>
                        <tr>
                            <td>الـمـقـاول</td>
                            <td>{{ $contractor->freelancer->name }}</td>
                        </tr>
                        <tr>
                            <td>تـاريـخ الـتـقـديـم</td>
                            <td>{{ $dateOffers->created_at }}</td>
                        </tr>
                        <tr>
                            <td>تـاريـخ بـدايـة الـمـنـاقـصـة</td>
                            <td>{{ $tender[0]->starting_date }}</td>
                        </tr>
                        <tr>
                            <td>تـاريـخ نـهـايـة الـمـنـاقـصـة</td>
                            <td>{{ $tender[0]->ending_date }}</td>
                        </tr>
                        <tr>
                            <td>تـاريـخ فـتـح الـمـظـاريـف</td>
                            <td>{{ $tender[0]->open_date }}</td>
                        </tr>
                        <tr>
                            <td>مـوقـع الـعـمـل</td>
                            <td>{{ $tender[0]->working_location }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>

        <div class="bg-secondary1 text-center rounded p-4 py-3">
            <h6 class="text-end pb-1">تفاصيل الـمـتـسـنـد</h6>
            <div class="table-responsive">
                <table class="table text-end align-middle table-striped table-borderless table-hover mb-0 ">

                    <thead>
                        <th class="px-3 text-white w-250">الـبـنـود </th>
                        <th class="px-3 text-white ">الـوصـف</th>
                        <th class="px-3 text-white w-250">الـسـعـر</th>
                    </thead>
                    <tbody>
                        @foreach ($tenderDocuments as $key => $documents)
                            <tr>
                                <td>{{ $documents->technical_title }}</td>
                                <td>{{ $tenderDo[$key]->technical_description }}</td>
                                <td>{{ $tenderOffers[$key] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"> الـمـجـمـوع</td>
                            <td>{{ $sumoffers }}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">
                <p></p>
                <a class="btn btn-sm btn-dark  px-3  m-2" href="javascript:history.back()">رجـوع </a>
            </div>
        </div>

    </div>
@endsection
