@extends('layouts.back')



@section('content')
<div class="container-fluid m-0 ">
    <div class="row align-items-center justify-content-center " style="height: 73.5vh; ">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 w-60 " >
            <div  class="bg-secondary rounded p-2 p-sm-5 h-150  mx-3">
                <h6 class="mb-3">هــل تــريــد حــذف "اسـم الـمـنـاقـصـة" </h6>
                 <div class="float-start ">
                    <a class="btn btn-sm btn-primary fw-bold px-4 me-3" href="{{route('tenders.offerstender')}}">تــاكــيــد</a>
                    <a class="btn btn-sm btn-dark fw-bold px-4 me-3" href="{{route('tenders.offerstender')}}">إلــغــاء</a>

                 </div>
               </div>
        </div>
    </div>
</div>
@endsection