@extends('layouts.back')



@section('content')
<div  class="container-fluid  m-0 mb-80">
    <div class="row align-items-center justify-content-center ">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 p-0 " style="width: 40% !important ; ">
            <div class="bg-secondary rounded  p-sm-2 mt-4  " style="padding: 20px 50px !important ">
                <div class="text-center mb-4 "> 
                    <h6 class=" fs-5">اضــافــة مـسـتـخـدم</h6>
                 </div> 
                 <form method="POST" action="{{ route('account.back.users.store') }}" class="">
                    @csrf
                    <input name="username" type="text" class="form-control myform-control py-2 m-0 my-3" id="floatingInput" placeholder="اسـم الـمـسـتـخـدم" required>
                    <input name="email" type="email" class="form-control myform-control py-2 m-0 my-3" id="floatingInput" placeholder="البريد الأكـتـرونـي " required>
                    <input name="password" type="password" class="form-control myform-control py-2 m-0" id="floatingInput" placeholder="كـلـمـة الـمـرور" required>
                
                    @foreach($roles as $role)
                        <div class="d-flex align-items-center justify-content-between form-check my-3">
                            <label class="form-check-label" for="changesMade">{{ $role->label }}</label>
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}">
                        </div>
                    @endforeach
                
                    <button type="submit" class="btn btn-primary px-3 w-100 my-2 fs-5">اضــافــة </button>
                </form>
                
                
                        </div>
        </div>
    </div>
</div>
@endsection