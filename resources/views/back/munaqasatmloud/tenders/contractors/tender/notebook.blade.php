@extends('layouts.back')

@section('content')
    <h5 class="text-end px-4 py-3  fw-bold ">دفـتـر الـمـنـاقـصـة </h5>
    <div class="container-fluid mt-2 px-4  mb-80">
        <div class="bg-secondary1 text-center rounded p-4 pb-3 w-100">
            <div class="d-flex justify-content-center">
            </div>


            <div class="table-responsive">
                <table class="table text-center align-middle table-striped table-borderless table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">الـبـنـود </th>
                            <th scope="col"> الــوصــف</th>
                            <th scope="col">الــســعــر</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('notebookfreelancer.store') }}" method="POST">
                            @csrf
                            <input type="text" name="tenderApplicant" id=""
                                value="{{ $tenderApplicant[0]->id }}" hidden>
                            <input type="text" name="tenderDocument" id="" value="{{ $tenderDocument[0]->id }}"
                                hidden>
                            @foreach ($tenderDocument as $tender)
                                <tr>
                                    <td class="fw-bold"> {{ $tender->technical_title }}</td>
                                    <td class="fw-bold"> {{ $tender->technical_description }}</td>

                                    <td class="fw-bold w-25 ">
                                        <input class="w-75 py-1 text-center myform-control" value="{{ old('price') }}"
                                            name="price[]" type="text" placeholder="ادخـل الـسـعـر">
                                         </td>


                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 p-0 d-flex justify-content-between">
                <button type="submit" class="btn btn-sm mybtn-secondary fw-bold px-5 fs-6 m-2"> ارســال </button>
                </form>
                <a class="btn btn-sm btn-dark  px-3  m-2 ms-3" href="javascript:history.back()">رجــوع</a>
            </div>
        </div>
    </div>

    <script>
        function addInputs() {
            var inputContainer = document.getElementById('inputContainer');
            var input1 = document.createElement('input');
            input1.style.width = '70%';
            input1.className = 'py-1';
            input1.type = 'text';
            input1.value = 'Core(TM) i5-4210M CPU  ';
            input1.disabled = true;
            var input2 = document.createElement('input');
            input2.className = 'w-25 my-2 me-2 py-1';
            input2.type = 'text';
            input2.placeholder = 'ادخـل الـسـعـر';
            inputContainer.appendChild(input1);
            inputContainer.appendChild(input2);
        }
    </script>
@endsection
