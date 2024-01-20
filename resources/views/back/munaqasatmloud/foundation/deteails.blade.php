@extends('layouts.back')

@section('content')
    <h6 class="text-end m-4 fw-bold  ">تـفـاصـيـل الـمـؤسـسـة </h6>
    <div class="container-fluid  px-4">
        <div class="text-center rounded   pb-3">
            <div class="table-responsive bg-secondary1 p-4">
                <table class="table text-end  table-striped table-borderless  align-middle  table-hover mb-0 ">
                    <thead>
                        <tr>
                            <th class="text-white px-2 w-25">الـمـؤسـسـة</th>
                            <th class="text-white px-2">الـوصـف</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr hidden></tr>
                        <tr>
                            <td class="px-3 ">اســم </td>
                            <td class="px-3">{{ $organization->title }}</td>
                        </tr>
                        <tr>
                            <td class="px-3 ">الـحـالـة</td>
                            @if ($organization->state == 0)
                                <td class="px-3">قـيـد الأنـتـظـار</td>
                            @elseif ($organization->state == 1)
                                <td class="px-3">فـعـالـة</td>
                            @elseif ($organization->state == -1)
                                <td class="px-3">مـحـجـوبـة</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="px-3 ">بـيـانـات الأتـصـال</td>
                            <td class="px-3">{{ $organization->contact_statement }}</td>
                        </tr>
                        <tr>
                            <td class="px-3 "> السجل التجاري</td>

                            <td class="px-3"><a target="_blank" href="http://127.0.0.1:8000/uploads/{{ $organization->trade_document }}">
                                    {{ $organization->trade_document }} </a></td>

                        </tr>
                        <tr>
                            <td class="px-3 ">الـوصــف</td>
                            <td class="px-3">{{ $organization->description }}</td>
                        </tr>

                    </tbody>

                </table>
            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">
                <form action="{{ route('foundations.update', $organization->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @if ($organization->state == 0)
                        <input type="text" name="state" id="" value="1" hidden>
                        <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2">تـأكـيـد</button>

                        {{-- <button type="submit" class="btn btn-sm btn-primary fw-bold  px-5 fs-6 m-2" href="">حــجــب</button> --}}
                    @elseif($organization->state == 1)
                        <input type="text" name="state" id="" value="-1" hidden>
                        <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2"
                            href="">حــجــب</button>
                    @elseif($organization->state == '-1')
                        <input type="text" name="state" id="" value="1" hidden>
                        <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2"
                            href="">تـفـعـيـل</button>
                    @endif

                </form>


                <a class="btn btn-sm btn-dark  px-3  m-2" href="javascript:history.back()">رجـوع </a>
            </div>
        </div>

    </div>
@endsection
