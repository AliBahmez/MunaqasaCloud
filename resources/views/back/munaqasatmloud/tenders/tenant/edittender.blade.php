@extends('layouts.back')



@section('content')
    <div class="container-fluid  m-0 mb-80">
        <div class="row align-items-center justify-content-center ">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 p-0 " style="width: 60% !important ; ">
                <div class="bg-secondary1 rounded  p-sm-2 mt-4  " style="padding: 20px 50px !important ">
                    <div class="text-center mb-4 ">
                        <h6 class=" fs-5">تـعـديـل مـنـاقـصـة</h6>
                    </div>
                    <form action="{{ route('tender.update', $tender->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="my-3">
                            <label class="fw-bold " for="">اسـم الـمـنـاقـصـة</label>
                            <input type="text" name="name" class="form-control myform-control py-2 m-0 my-2"
                                id="floatingInput" value="{{ old('name', $tender->name) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">عـنـوان الـمـنـاقـصـة</label>
                            <input type="text" name="title" class="form-control myform-control py-2 m-0 my-2"
                                id="floatingInput" value="{{ old('title', $tender->title) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">قـيـمـة الـدخـول الـمـنـاقـصـة</label>
                            <input type="text" name="participation_price" class="form-control myform-control py-2 my-2"
                                id="floatingInput" value="{{ old('participation_price', $tender->participation_price) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold" for=""> الـحـالـة </label>
                            <input type="text" name="state" class="form-control myform-control py-2 my-2 bg-secondary"
                                disabled id="floatingInput" value="{{ old('state', $tender->state) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">تـاريـخ الـبـديـة</label>
                            <input type="date" name="starting_date" class="form-control myform-control my-2 py-2 m-0"
                                id="floatingInput"
                                value="{{ old('starting_date', \Carbon\Carbon::parse($tender->starting_date)->format('Y-m-d')) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">تـاريـخ الأنـتـهـاء</label>
                            <input type="date" name="ending_date" class="form-control myform-control my-2 py-2 m-0"
                                id="floatingInput"
                                value="{{ old('ending_date', \Carbon\Carbon::parse($tender->ending_date)->format('Y-m-d')) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold" for="">تـاريـخ فـتـح الـمـظـاريـف</label>
                            <input type="date" name="open_date" class="form-control myform-control my-2 py-2 m-0"
                                id="floatingInput"
                                value="{{ old('open_date', \Carbon\Carbon::parse($tender->open_date)->format('Y-m-d')) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">مـكـان الـمـنـاقـصـة</label>
                            <input type="text" name="working_location" class="form-control myform-control my-2 py-2 m-0"
                                id="floatingInput" value="{{ old('working_location', $tender->working_location) }}">
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">وصــف الـمـنـاقـصـة</label>
                            <textarea name="description" class="form-control myform-control my-3 py-2 m-0" id="" cols="30"
                                rows="5">{{ old('description', $tender->description) }}</textarea>
                        </div>
                        <button type="submit" class="btn mybtn-secondary  px-3 w-100 mt-2 fs-5">تـعـديـل </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
