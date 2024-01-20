@extends('layouts.back')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4 pb-3">
        <h6 class="text-end mb-4 text-primary">الـمـعـلـومـات الـرسـالـة</h6>
        <div class="table-responsive">
            <table class="table text-end  align-middle table-bordered table-hover mb-0 ">
               
               <tr >
                <th  class="px-3 text-white w-250">اســم </th>
                <td class="px-3 ">  </td>
               </tr>
               <tr>
                <th class="px-3 text-white">الـمـوضـوع </th>
                <td class="px-3 "></td>
               </tr>
              
               <tr>
                <th class="px-3 text-white">الـرسـالـة    </th>
                <td class="px-3 ">تهدف هذه المناقصة إلى اختيار <span id="dots"></span><span id="more">
                    متعاقد لتطوير موقع الويب الجديد ونظام إدارة المحتوى للمؤسسة  متعاقد لتطوير موقع الويب الجديد ونظام إدارة المحتوى للمؤسسة متعاقد لتطوير موقع الويب الجديد ونظام إدارة المحتوى للمؤسسة متعاقد لتطوير موقع الويب الجديد ونظام إدارة المحتوى للمؤسسة
                </span> 
                <small onclick="myFunction()" id="myBtn" class=""> ...عـرض الـمـزيـد...</small>
           
               </tr>
               <tr>
               
               
               
                   </table>
        </div>
        <div class="mt-3 p-0 d-flex justify-content-between ">
           <p></p>
            <a class="btn btn-sm btn-dark  px-3  m-2" href="{{route('platform.messages')}}">الرجوع الى الـرسـائـل</a>
        </div>        
    </div>

</div>
    
@endsection