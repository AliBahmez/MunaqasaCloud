@extends('layouts.back')

@section('content')
    <h6 class="text-end mx-4 mt-3 fw-bold text-while f-18 "> الـمـنـاقـصـات</h6>
    <div class="container-fluid  px-4 mb-60">
        <ul class="nav nav-pills rounded my-3 w-100 bg-secondary1 d-flex justify-content-between p-0" id="pills-tab"
            role="tablist">
            <li class="nav-item w-33 m-0 p-0" role="presentation ">
                <button class="nav-link active w-100 fw-bold pt-10p" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">قـيـد الأعــداد</button>
            </li>
            <li class="nav-item w-33" role="presentation">
                <button class="nav-link w-100 fw-bold pt-10p" id="pills-profile-tab " data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">فــعــالــــــة</button>
            </li>
            <li class="nav-item w-33" role="presentation">
                <button class="nav-link w-100 fw-bold pt-10p" id="pills-contact-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                    aria-selected="false">مــنــتــهــيــة</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">


            {{-- 1 --}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container-fluid py-2 p-0 ">
                    <div class="bg-secondary1 text-center rounded pb-4 px-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p></p>
                            <a class="btn btn-sm border border-secondary fw-bold px-4 py-2 m-2"
                                href="{{ route('tender.create') }}">أضــافــة مـنـاقـصـة</a>
                        </div>
                        <div class="table-responsive">
                            <table
                                class="table text-start table-striped table-borderless align-middle  table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col"> الـمـنـاقـصـة</th>

                                        <th scope="col">الـمـعـد </th>
                                        <th scope="col">عـمـلـيـات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($UnderPreparation as $under)
                                        <tr>
                                            <td class="fw-bold"> {{ $under->name }}</td>
                                            <td class="fw-bold"> {{ $under->title }}</td>
                                            <td class="fw-bold ">
                                                <a class="btn btn-sm  fw-bold"
                                                href="{{ route('tender.show', ['tender' => $under->id]) }}"><i
                                                    class="bi bi-info-circle fw-bold  f-18"></i></a>
                                                @if ($under->tenderDocuments()->exists())
                                                    <a class="btn btn-sm  fw-bold"
                                                        href="{{ route('notebook.show', $under->id) }}"><i
                                                            class="fas fa-file-contract fw-bold  f-18"></i></a>
                                                @else
                                                    <a class="btn btn-sm  fw-bold"
                                                        href="{{ route('createnote', $under->id) }}"><i
                                                            class="fa fa-address-book fw-bold  f-18"></i></a>
                                                @endif
                                               
                                                <a class="btn btn-sm  fw-bold"
                                                    href="{{ route('tender.edit', ['tender' => $under->id]) }}"><i
                                                        class="bi bi-pencil-fill fw-bold  f-18"></i></a>
                                                <a class="btn btn-sm fw-bold delete-btn" data-bs-toggle="modal"
                                                    data-bs-target="#myModal{{ $under->id }}"
                                                    data-id="{{ $under->id }}" data-name="{{ $under->id }}"><i
                                                        class="fas fa-trash-alt fw-bold text-primary f-18"></i></a>
                                            </td>
                                        </tr>
                                        <div style="margin-top: 15% !important" class="modal fade mt-5"
                                            id="myModal{{ $under->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog ">
                                                <div class="modal-content  bg-secondary1">
                                                    <div class="modal-header border-0 d-flex justify-content-between w-100">
                                                        <h6 class="modal-title pt-2" id="exampleModalLabel"> هــل تــريــد
                                                            حــذف هـذا الـمـنـاقـصـة {{ $under->name }}؟</h6>
                                                    </div>
                                                    <div class="modal-body border-0">
                                                        <p>بالضغط على تأكيد سيتم حذف العنصر نهائياً.</p>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <form action="{{ route('tender.destroy', $under->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn mybtn-secondary px-4">تأكيد</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary px-4"
                                                            data-bs-dismiss="modal">إلغاء</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <script>
                $(document).ready(function() {
                    $('.delete-btn').click(function() {
                        var modalId = $(this).data('bs-target');
                        $(modalId).modal('show');
                    });
                });
            </script>

            {{-- 2 --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container-fluid py-2 p-0 ">
                    <div class="bg-secondary1 text-center rounded p-0 p-3">

                        <div class="table-responsive">
                            <table
                                class="table text-start table-striped table-borderless align-middle  table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col"> الـمـنـاقـصـة</th>
                                        <th scope="col">الـمـعـد </th>
                                        <th scope="col">عـمـلـيـات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Effective as $Effe)
                                        <tr>
                                            <td class="fw-bold"> {{ $Effe->name }}</td>

                                            <td class="fw-bold"> {{ $Effe->title }}</td>
                                            <td class="fw-bold ">
                                                <a class="btn btn-sm  fw-bold"
                                                    href="{{ route('notebook.show', $Effe->id) }}"><i
                                                        class="fas fa-file-contract fw-bold  f-18"></i></a>
                                                <a class="btn btn-sm  fw-bold "
                                                    href="{{ route('tender.show', ['tender' => $Effe->id]) }}"><i
                                                        class="bi bi-info-circle fw-bold  f-18"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 3 --}}
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="container-fluid py-2 p-0 ">
                    <div class="bg-secondary1 text-center rounded p-3 ">

                        <div class="table-responsive">
                            <table
                                class="table text-start table-striped table-borderless align-middle  table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col"> الـمـنـاقـصـة</th>
                                        <th scope="col">الـمـعـد </th>
                                        <th scope="col">عـمـلـيـات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Finished as $Finish)
                                        <tr>
                                            <td class="fw-bold"> {{ $Finish->name }}</td>

                                            <td class="fw-bold"> {{ $Finish->title }}</td>
                                            <td class="fw-bold ">
                                                <a class="btn btn-sm  fw-bold"
                                                    href="{{ route('notebook.show', $Finish->id) }}"><i
                                                        class="fas fa-file-contract fw-bold  f-18"></i></a>
                                                <a class="btn btn-sm  fw-bold "
                                                    href="{{ route('tender.show', ['tender' => $Finish->id]) }}"><i
                                                        class="bi bi-info-circle fw-bold  f-18"></i></a>
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
