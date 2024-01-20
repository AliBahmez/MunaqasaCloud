@extends('layouts.back')



@section('content')
<div class="container-fluid m-0 ">
    <div class="row align-items-center justify-content-center " style="height: 73.5vh; ">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 w-60 " >
            <div  class="bg-secondary rounded px-3 py-4  h-150  mx-3">
                <h4 class="mb-4">تأكيد الحذف</h4>
                <p class="text-center mb-4-3">هل أنت متأكد أنك تريد حذف هذه السجل</p>
                 <div class="float-start d-flex ">
                    <form method="post" action="{{ route('account.back.roles.destroy', $role->id) }}">
                        @csrf
                        @method('DELETE')
                     
            
                        <!-- Delete Button -->
                        <button type="submit" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#deleteModal">
                          حذف
                        </button>
                      </form>
                    <a class="btn btn-sm btn-dark fw-bold px-4 me-3" href="javascript:history.back()">إلــغــاء</a>

                 </div>
               </div>
        </div>
    </div>
</div>
@endsection