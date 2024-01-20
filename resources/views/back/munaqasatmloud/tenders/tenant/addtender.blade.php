@extends('layouts.back')



@section('content')
    <div style="margin-bottom:70px !important " class="container-fluid  m-0 ">
        <div class="row align-items-center justify-content-center mb-80">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 p-0 " style="width: 60% !important ; ">
                <div class="bg-secondary1 rounded  p-sm-2 mt-4  " style="padding: 20px 50px !important ">
                    <div class="text-center mb-2 ">
                        <h6 class=" fs-5">اضــافــة مـنـاقـصـة</h6>
                    </div>
                    <form action="{{ route('tender.store') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label class="fw-bold " for="">اسـم الـمـنـاقـصـة</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control myform-control py-2 m-0 my-2" id="floatingInput" required>
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">المؤسسة </label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control myform-control py-2 m-0 my-2" id="floatingInput"required>
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">قـيـمـة الـدخـول الـمـنـاقـصـة</label>
                            <input type="text" name="participation_price" value="{{ old('participation_price') }}"
                                class="form-control myform-control py-2 my-2" id="floatingInput" required>
                        </div>

                        <div class="my-3">
                            <label class="fw-bold " for="">تـاريـخ الـبـديـة</label>
                            <input type="date" name="starting_date" value="{{ old('starting_date') }}"
                                class="form-control myform-control my-2 py-2 m-0" id="floatingInput" required>
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">تـاريـخ الأنـتـهـاء</label>
                            <input type="date" name="ending_date" value="{{ old('ending_date') }}"
                                class="form-control myform-control my-2 py-2 m-0" id="floatingInput" required>
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">تـاريـخ فـتـح الـمـظـاريـف</label>
                            <input type="date" name="open_date" value="{{ old('open_date') }}"
                                class="form-control myform-control my-2 py-2 m-0" id="floatingInput" required>
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">مـكـان الـمـنـاقـصـة</label>
                            <input type="text" name="working_location" value="{{ old('working_location') }}"
                                class="form-control myform-control my-2 py-2 m-0" id="floatingInput"required>
                        </div>
                        <div class="my-3">
                            <label class="fw-bold " for="">وصــف الـمـنـاقـصـة</label>
                            <textarea name="description" class="form-control myform-control my-3 py-2 m-0" name="" id=""
                                cols="30" rows="5" required>{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn text-white px-3 w-100 mt-2 fs-5 mybtn-secondary">اضـافـة </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
