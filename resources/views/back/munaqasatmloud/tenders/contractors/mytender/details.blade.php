@extends('layouts.back')

@section('content')
<h6 class="text-end px-4 py-3 text-white fw-bold f-18">تـفـاصـيـل الـمـنـاقـصـة </h6>
<div class="container-fluid  px-4 ">
    <div class="bg-secondary text-center rounded p-4 pb-3">
        <div class="table-responsive">
            <table class="table text-end  align-middle table-bordered table-hover mb-0 ">
               
               <tr >
                <th class="px-3 text-white w-250">اســم الـمـنـاقـصـة</th>
                <td class="px-3 ">تطوير موقع الويب ونظام إدارة المحتوى</td>
               </tr>
               <tr>
                <th class="px-3 text-white">رقـم الـمـنـاقـصـة</th>
                <td class="px-3 ">87364</td>
               </tr>
               <tr>
                <th class="px-3 text-white">الـغـرض مـن الـمـنـاقـصـة</th>
                <td class="px-3 ">تهدف هذه المناقصة إلى اختيار <span id="dots"></span><span id="more">
                    متعاقد لتطوير موقع الويب الجديد ونظام إدارة المحتوى للمؤسسة
                </span> 
                <small onclick="myFunction()" id="myBtn" class=""> ...عـرض الـمـزيـد...</small>
            </td>
               </tr>
               <tr>
                <th class="px-3 text-white">الـحــالــة </th>
                <td class="px-3 "></td>
               </tr>
               <tr>
                <th class="px-3 text-white">قـيـمـة دخـول الـمـنـاقـصـة </th>
                <td class="px-3 ">5000 ر.ي</td>
               </tr>
               <tr>
                <th class="px-3 text-white">تاريخ البداية </th>
                <td class="px-3 ">1/1/2024</td>
               </tr>
               <tr>
                <th class="px-3 text-white">تاريخ الإنـتـهـاء </th>
                <td class="px-3 ">1/2/2024</td>
               </tr>
               <tr>
                <th class="px-3 text-white">تاريخ فتح المظاريف </th>
                <td class="px-3 ">10/2/2024</td>
               </tr>
               
                   </table>
        </div>
        <div class="mt-3 p-0 d-flex justify-content-between">
           <p></p>
            <a class="btn btn-sm btn-dark  px-3  m-2" href="{{route('freelancer.mytenders.index')}}">الرجوع الى المناقصات</a>
        </div>        
    </div>

</div>
    
@endsection