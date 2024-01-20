@extends('layouts.back')



@section('content')
<h6 class="text-end mx-4 mt-3  text-while f-18">  الأدوار</h6>
<nav class="mt-3 mx-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"></li>
      <li class="breadcrumb-item">الحسابات</li>
      <li class="breadcrumb-item active"><a href="{{ route('account.back.users.index') }}">الـمـسـتـخـدمـيـن</a></li>
    </ol>
  </nav>
  <div class=" mb-80 mb-3 w-100 text-center">
    <div class="w-100 ">

      <div class=" border-0  w-100 d-flex justify-content-center">
        <div class=" bg-secondary w-50 rounded-2 pt-3">
          <!-- Bordered Tabs -->
         
          <div class="pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <h6 class="card-title text-end px-2 ">اسـم الـمـسـتـخـدم :</h6>
                <p class="fw-bold">{{ $user->username }}</p>
              <hr>
              
                {{-- @dd($roles); --}}
                @foreach($roles as $role)
                <div class="text-center my-3">
              <h6 class="card-title text-end px-2 ">الأدوار  :</h6>
                    <p class="label fw-bold">{{ $role->label }}</p>
                    <hr>
                    {{-- <h5 class="">الاذونات</h5> --}}
                     <h6 class="card-title text-end px-2 ">الاذونـات  :</h6>
                    @foreach($role->permissions as $permission)
                        <div class="label">{{ $permission->label }}</div>
                    @endforeach
                </div>
            @endforeach
            

            </div>

      </div>

    </div>
  </div>
{{-- <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="" class="mb-0 fw-bold  text-white btn btn-sm btn-primary px-3 py-1">أضافة مـسـتـخـدم</a>
           
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0 text-center">
                <thead>
                    <tr class="text-white fs-5">
                       <th scope="col">اسـم مـسـتـخـدم</th>
                        <th scope="col">كـلـمـة الـمـرور</th>
                        <th scope="col"> الأدوار</th>
                        <th scope="col">عـمـلـيـات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">علي حسين</td>
                        <td class="fw-bold">1234687</td>
                        <td class="fw-bold">الــدور الأولـى</td>
                        <td class="">
                            <a class="btn btn-sm btn-primary  px-4 fw-bold py-1 " href="">عــرض</a>
                            <a class="btn btn-sm btn-primary  px-4 fw-bold mx-3 py-1 " href="">تـعـديـل</a>
                            <a class="btn btn-sm btn-primary fw-bold px-4  py-1" href="">حـذف</a>
                    </td>
                    </tr>
                    <tr>
                        <td class="fw-bold ">أحـمــد صـالـح</td>
                        <td class="fw-bold">1234687</td>
                        <td class="fw-bold">الــدور الـتـانـيـة</td>
                        <td class="">
                            <a class="btn btn-sm btn-primary  px-4 fw-bold py-1 " href="">عــرض</a>
                            <a class="btn btn-sm btn-primary  px-4 fw-bold mx-3 py-1 " href="">تـعـديـل</a>
                            <a class="btn btn-sm btn-primary fw-bold px-4  py-1" href="">حـذف</a>
                    </td>
                     <tr>
                        <td class="fw-bold">مـحـمـد خـالـد</td>
                        <td class="fw-bold">1234687</td>
                        <td class="fw-bold">الــدور الـتـالـثـة</td>
                        <td class="">
                            <a class="btn btn-sm btn-primary  px-4 fw-bold py-1 " href="">عــرض</a>
                            <a class="btn btn-sm btn-primary  px-4 fw-bold mx-3 py-1 " href="">تـعـديـل</a>
                            <a class="btn btn-sm btn-primary fw-bold px-4  py-1" href="">حـذف</a>
                    </td>
                     <tr>
                        <td class="fs-5">بـخـيـت حـمـد</td>
                        <td class="fw-bold">1234687</td>
                        <td class="fw-bold">الــدور الـرابـعـة</td>
                        <td class="">
                            <a class="btn btn-sm btn-primary  px-4 fw-bold py-1 " href="">عــرض</a>
                            <a class="btn btn-sm btn-primary  px-4 fw-bold mx-3 py-1 " href="">تـعـديـل</a>
                            <a class="btn btn-sm btn-primary fw-bold px-4  py-1" href="">حـذف</a>
                    </td>
                    <tr>
                        <td class="fs-5">عـبـدالـلـة سـعـيـد</td>
                        <td class="fw-bold">1234687</td>
                        <td class="fw-bold">الــدور الـخـامـسـة</td>
                        <td class="">
                            <a class="btn btn-sm btn-primary  px-4 fw-bold py-1 " href="">عــرض</a>
                            <a class="btn btn-sm btn-primary  px-4 fw-bold mx-3 py-1 " href="">تـعـديـل</a>
                            <a class="btn btn-sm btn-primary fw-bold px-4  py-1" href="">حـذف</a>
                    </td>
                 </tbody>
            </table>
        </div>
    </div>
</div> --}}
@endsection