@extends('layouts.back')



@section('content')
<h6 class="text-end mx-4 mt-3 fw-bold text-while f-18">  الـرسـائـل</h6>
<div class="container-fluid pt-2 px-4  mb-3">
    <div class="bg-secondary text-center rounded p-4">
       
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0 text-center">
                <thead>
                    <tr class="text-white ">
                         <th scope="col">اسـم </th>
                        <th scope="col">الـمـوضـوع</th>
                        <th scope="col">عـمـلـيـات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold"></td>
                        <td class="fw-bold"></td>
                        <td class="">
                             <a class="btn btn-sm  fw-bold " href="{{route('platform.messages.offers')}}"><i class="bi bi-info-circle fw-bold  f-18"></i></a>
                            
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection