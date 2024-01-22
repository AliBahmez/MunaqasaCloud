@extends('layouts.back')

@section('content')
    <h6 class="text-end m-4 mb-3">تـفـاصـيـل الـمـنـاقـصـة </h6>
    <div class="container-fluid  px-4 mb-80">
        <div class="bg-secondary1 text-center rounded p-4 pb-1">
            <div class="table-responsive">
                <table class="table text-start table-striped table-borderless align-middle  table-hover mb-0 text-end">
                    <thead>
                        <th>الـمـنـاقـصـة</th>
                        <th> الــوصــف</th>
                    </thead>
                    <tr>
                        <th class="px-3  w-250">اســم </th>
                        <td class="px-3 ">{{ $tender->name }}</td>
                    </tr>
                    <tr>
                        <th class="px-3 w-250">عـنـوان الـمـنـاقـصـة</th>
                        <td class="px-3 ">{{ $tender->title }}</td>
                    </tr>
                    <tr>
                        <th class="px-3 ">رقـم الـمـنـاقـصـة</th>
                        <td class="px-3 ">{{ $tender->number }}</td>
                    </tr>
                    <tr>
                        <th class="px-3 ">الـغـرض مـن الـمـنـاقـصـة</th>
                        <td class="px-3">
                            <span
                                id="shortText">{{ substr($tender->description, 0, 50) }}{{ strlen($tender->description) > 50 ? '...' : '' }}</span>
                            <span id="longText" style="display: none;">{{ $tender->description }}</span>
                            <small onclick="toggleText()" id="myBtn" class="show-more">عـرض الـمـزيـد...</small>
                        </td>
                    </tr>

                    </tr>
                    <tr>
                        <th class="px-3 ">الـحــالــة </th>
                        @if ($tender->state == 0)
                            <td class="px-3 ">قـيـد الأعـداد</td>
                        @elseif ($tender->state == 1)
                            <td class="px-3 ">فعالة </td>
                        @else
                            <td class="px-3 ">منتهية </td>
                        @endif
                    </tr>
                    <tr>
                        <th class="px-3 ">قـيـمـة دخـول الـمـنـاقـصـة </th>
                        <td class="px-3 ">{{ $tender->participation_price }} ر.ي</td>
                    </tr>
                    <tr>
                        <th class="px-3 ">تاريخ البداية </th>
                        <td class="px-3 ">{{ $tender->starting_date }}</td>
                    </tr>
                    <tr>
                        <th class="px-3 ">تاريخ الإنـتـهـاء </th>
                        <td class="px-3 ">{{ $tender->ending_date }}</td>
                    </tr>
                    <tr>
                        <th class="px-3 ">تاريخ فتح المظاريف </th>
                        <td class="px-3 ">{{ $tender->open_date }}</td>
                    </tr>
                    <tr>
                        <th class="px-3 "> مكان الـمـنـاقـصـة </th>
                        <td class="px-3 ">{{ $tender->working_location }}</td>
                    </tr>

                </table>
            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">

                @if ($tender->tenderDocuments()->exists())
                    <form action="{{ route('tender.update', $tender->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @if ($tender->state == 0)
                            <input type="text" name="state" value="1" hidden>
                            <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2"
                                href="">تـفـعـيـل</button>
                        @endif
                    </form>
                @else
                    <button type="submit" class="btn mybtn-secondary fw-bold px-5 fs-6 m-2" href=""
                        disabled>تـفـعـيـل</button>
                    <p style="margin-right: -300px !important" class="text-start mt-3">
                        لتحويل المناقصة الى فعالة رجاء اضافة مستند للمناقصة
                    </p>
                @endif
                <a class="btn btn-sm btn-dark  px-3  m-2" href="javascript:history.back()">رجـــوع</a>
            </div>


        </div>
     

    </div>

@endsection
