@extends('layouts.back')

@section('content')
    <h6 class="text-end m-4 mb-0  f-18 fw-bold"> تـفـاصـيـل الـمـقـاول</h6>
    <div class="container-fluid pt-4 px-4">
        <div class=" text-center rounded p-4 bg-white pb-3">
            <div class="table-responsive bg-secondary1">
                <table class="table text-end  table-striped table-borderless  align-middle  table-hover mb-0 ">
                    <thead>
                        <th>المقاول</th>
                        <th>الوصـف</th>
                    </thead>
                    <tbody>
                        <tr></tr>
                        <tr>
                            <th class="px-3  w-250">الإســم</th>
                            <td class="px-3 ">{{ $contractor->name }} </td>
                        </tr>
                        <tr>
                            <th class="px-3 "> الـعـنـوان </th>
                            <td class="px-3 ">{{ $contractor->title }}</td>
                        </tr>
                        <tr>
                            <th class="px-3 ">الــوصــف</th>
                            <td class="px-3 "> {{ $contractor->description }} </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">
                <form action="{{ route('contractor.update', $contractor->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @if ($contractor->state == 1)
                        <input type="text" name="state" id="" value="-1" hidden>
                        <button type="submit" class="btn btn-sm mybtn-secondary fw-bold   px-3  m-2">حــجــب</button>
                    @elseif($contractor->state == -1)
                        <input type="text" name="state" id="" value="1" hidden>
                        <button type="submit" class="btn btn-sm mybtn-secondary fw-bold   px-3  m-2">تـفـعـيـل</button>
                    @endif
                </form>
                <a class="btn btn-sm btn-dark  px-3  m-2" href="javascript:history.back()">رجــوع</a>
            </div>
        </div>

    </div>
@endsection
