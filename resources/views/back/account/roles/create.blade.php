@extends('layouts.back')



@section('content')
<nav class="mt-3 mx-4">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"></li>
    <li class="breadcrumb-item">الحسابات</li>
    <li class="breadcrumb-item active"><a href="{{ route('account.back.roles.index') }}">الأدوار</a></li>
  </ol>
</nav>
<div class="container-fluid m-0 mb-80">
    <div class="row align-items-center justify-content-center " style="min-height: 60vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 " style="width: 45% !important">
            <div class="bg-secondary rounded  py-4 px-5 mt-0 mx-3">
                <div class="text-center mb-4"> 
                       <h6 class=" fs-5">اضــافــة دور</h6>
                    </div>
                    <form method="POST" action="{{ route('account.back.roles.store') }}" class="" method="POST">
                      @csrf
               
                    <input name="name" type="text" class="form-control myform-control py-2 m-0" id="floatingInput" placeholder="الأســم ">
                    <input name="label" type="text" class="form-control myform-control my-2 py-2 m-0" id="floatingInput" placeholder="الـعـنـوان ">
                    @foreach($permissions as $permission)
                    {{-- @dd($permissions); --}}
                    <div class="d-flex align-items-center justify-content-between form-check my-3">
                      <label  class="form-check-label" for="changesMade"> {{ $permission->label }}</label>
                       <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                         </div>
                         @endforeach
                    
                 <button type="submit" class="btn btn-primary px-3 w-100 mt-3   fs-5">اضــافــة </button>
                    </form> 
                </div>
        </div>
    </div>
</div>
@endsection