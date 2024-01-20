@extends('layouts.back')



@section('content')
<h6 class="text-end mx-4 mt-3  text-while f-18">  الـمـسـتـخـدمـيـن</h6>
<nav class="mt-1 mx-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"></li>
      <li class="breadcrumb-item">الحسابات</li>
      <li class="breadcrumb-item active">المستخدمون</li>
    </ol>
  </nav>
<div class="container-fluid  px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('account.back.users.create')}}" class="mb-0 fw-bold  text-white btn btn-sm btn-primary px-3 py-1">أضافة مـسـتـخـدم</a>
           
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0 text-center">
                <thead>
                    <tr class="text-white ">
                       <th scope="col">اسـم مـسـتـخـدم</th>
                        <th scope="col">عـمـلـيـات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->username }}</td>
                      <td>
                        <a class="btn btn-sm  fw-bold " href="{{route('account.back.users.show', $user->id)}}"><i class="bi bi-info-circle fw-bold  f-18"></i></a>
                        <a class="btn btn-sm  fw-bold " href="{{route('account.back.users.edit', $user->id)}}"><i class="bi bi-pencil-fill fw-bold  f-18"></i></a>
                        <a class="btn btn-sm fw-bold " href="{{route('account.back.users.delete', $user->id)}}"><i class="bi bi-trash fw-bold text-primary f-18"></i></a>
                       </td>
                    </tr>
                    @endforeach
                  
                    
                  </tbody>
            </table>
        </div>
    </div>
</div>
@endsection