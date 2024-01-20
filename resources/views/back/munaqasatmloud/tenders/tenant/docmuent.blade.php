@extends('layouts.back')

@section('content')
    <h6 class="text-end mx-4 mt-3 fw-bold text-while f-18"> الـمـسـتـنـدات</h6>
    <div class="container-fluid pt-2 px-4 mb-3">
        <div class="bg-secondary text-center rounded p-4">

            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0 text-center">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">الـمـسـتـنـد </th>
                            <th scope="col"> الـمـنـاقـصـة</th>
                            <th scope="col">عـمـلـيـات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tendersWithDocument as $tender)
                            <tr>
                                <td class="fw-bold"> {{ $tender->id }}</td>
                                <td class="fw-bold"> {{ $tender->name }}</td>

                                <td class="fw-bold ">
                                    <a class="btn btn-sm  fw-bold " href="{{ route('notebook.show', $tender->id) }}"><i
                                            class="bi bi-info-circle fw-bold  f-18"></i></a>
                                    @if ($tender->state == 0)
                                        <a class="btn btn-sm  fw-bold" href="{{ route('notebook.edit', $tender->id) }}"><i
                                                class="bi bi-pencil-fill fw-bold  f-18"></i></a>
                                        <a class="btn btn-sm fw-bold delete-btn" data-bs-toggle="modal"
                                            data-bs-target="#myModal{{ $tender->id }}" data-id="{{ $tender->id }}"
                                            data-name="{{ $tender->id }}"><i
                                                class="bi bi-trash fw-bold text-primary f-18"></i></a>
                                    @endif
                                </td>
                                <div style="margin-top: 15% !important" class="modal fade mt-5"
                                    id="myModal{{ $tender->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content  bg-secondary1">
                                            <div class="modal-header border-0 d-flex justify-content-between w-100">
                                                <h6 class="modal-title pt-2" id="exampleModalLabel"> هــل تــريــد حــذف
                                                    هـذا الـمـتـسـنـد ؟</h6>
                                            </div>
                                            <div class="modal-body border-0">
                                                <p>بالضغط على تأكيد سيتم حذف الـمـتـسـنـد نهائياً.</p>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <form action="{{ route('notebook.destroy', $tender->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn mybtn-secondary px-4">تأكيد</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary px-4"
                                                    data-bs-dismiss="modal">إلغاء</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
