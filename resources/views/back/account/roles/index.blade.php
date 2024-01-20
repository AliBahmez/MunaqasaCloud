@extends('layouts.back')



@section('content')
<h6 class="text-end mx-4 mt-3  text-dark f-18">  الأدور</h6>
<nav class="mt-1 mx-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"></li>
      <li class="breadcrumb-item">الحسابات</li>
      <li class="breadcrumb-item active"><a href="{{ route('account.back.users.create') }}">الأدوار</a></li>
    </ol>
  </nav>

<div class="container-fluid pt-4 px-4  mb-3">
    <div class="bg-secondary1 text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="" class="fw-bold"> </a>
            <a href="{{ route('account.back.roles.create')}}" class="mb-0 fw-bold  text-white btn btn-sm btn-primary px-4 py-1">أضافة دور</a>
        </div>
        <div class="table-responsive">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <table class="table text-start align-middle table-bordered table-hover mb-0 text-center">
                <thead>
                    <tr class="">
                        <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                        <th scope="col">اسـم دور</th>
                        
                        <th scope="col">عـمـلـيـات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                      <td class="w-50 fw-bold">{{ $role->label }}</td>
                  
                      <td>
                        <a class="btn btn-sm  fw-bold " href="{{ route('account.back.roles.show',$role->id) }}"><i class="bi bi-info-circle fw-bold  f-18"></i></a>
                        <a class="btn btn-sm  fw-bold " href="{{ route('account.back.roles.edit',$role->id) }}"><i class="bi bi-pencil-fill fw-bold  f-18"></i></a>
                        <a class="btn btn-sm  fw-bold " href="{{ route('account.back.roles.delete',$role->id) }}"><i class="bi bi-trash fw-bold text-primary f-18"></i></a>
                        {{-- <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteModal"><a><i class="bi bi-trash"></i></a></button> --}}
                      </td>
                    </tr>
                    @endforeach
                  
                    </tbody>
            </table>
            @include('common.pagination', ['paginator' => $roles]) 

        </div>
    </div>
</div>
@endsection