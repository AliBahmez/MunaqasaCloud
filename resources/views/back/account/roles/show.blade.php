@extends('layouts.back')



@section('content')
<h6 class="text-end mx-4 mt-3  text-while f-18">  الأدوار</h6>
<nav class="mt-3 mx-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"></li>
      <li class="breadcrumb-item">الحسابات</li>
      <li class="breadcrumb-item active"><a href="{{ route('account.back.roles.index') }}">الأدوار</a></li>
    </ol>
  </nav>
  <div class=" mb-80 mb-3 w-100 text-center">
    <div class="w-100 ">

      <div class=" border-0  w-100 d-flex justify-content-center">
        <div class=" bg-secondary w-50 rounded-2 pt-3">
          <!-- Bordered Tabs -->
         
          <div class="pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h4 class="card-title ">{{ $role->label }}</h4>

              <hr>
              <h5 class="">الاذونات</h5>

              @foreach($role->permissions as $permission)
              <div class=" text-center my-3">
                <div class="label ">{{ $permission->label }}</div>
              </div>
              @endforeach

            </div>

      </div>

    </div>
  </div>
 {{-- <div class="container-fluid mb-60 px-4  mb-3">
    <div class="bg-secondary text-center rounded p-4">
        
        <div class="table-responsive">
          
            <table class="table text-start align-middle table-bordered table-hover mb-0 text-center">
                <thead>
                    <tr class="text-white fs-5">
                      <th scope="col">اسـم دور</th>
                        <th scope="col">الـصـلاحــيــات</th>
                        <th scope="col">عـمـلـيـات</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($role->permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->label }}
                </td> 
                </tr>
                    @endforeach
                     <tr>
                        <td class="fw-bold">حـذف مـقـاول</td>
                        <td class="fw-bold">الـصـلاحـيـة الأولـى</td>
                        <td class=""><a class="btn btn-sm btn-primary fw-bold px-4  py-1" href="{{route('role.delete')}}">حـذف</a>
                            <a class="btn btn-sm btn-primary  px-4 fw-bold py-1 me-3" href="{{ route('role.edit') }}">تـعـديـل</a>
                            <a class="btn btn-sm btn-primary  px-4 fw-bold py-1 me-3" href="{{route('role.view')}}">عــرض</a>
                           </td>
                    </tr> 
                   
                </tbody>
            </table>
        </div>
    </div>
</div>  --}}
@endsection