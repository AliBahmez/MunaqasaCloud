@extends('layouts.back')



@section('content')
    <h6 class="text-end m-4 mb-0 text-while fw-bold f-18"> مـنـاقـصـاتـي</h6>
    <div class="container-fluid  px-4 mb-80">
        <ul class="nav nav-pills my-3 w-100 bg-secondary1 d-flex justify-content-between p-0 rounded" id="pills-tab"
            role="tablist">
            <li class="nav-item w-50 m-0 p-0" role="presentation ">
                <button class="nav-link active w-100 fw-bold pt-10p" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">مـنـتـظـره</button>
            </li>
            <li class="nav-item w-50" role="presentation">
                <button class="nav-link w-100 fw-bold pt-10p" id="pills-profile-tab " data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false"> الـمـقـبـول</button>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">

            {{-- 1 --}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="container-fluid pt-2 px-0 mt-4 mb-3 ">

                    @foreach ($tenders as $tender)
                        <div class="bg-secondary1 text-center rounded p-4 pb-3 mb-4">
                            <div class="table-responsive">
                                <table class="table text-end table-striped table-borderless  align-middle mb-0">
                                    <tr class="p-0 m-0">
                                        <td style="border-top-right-radius: 10px !important" class="p-0 m-0">
                                            <div class="px-3 pt-2 pb-0">
                                                <div class="d-flex p-0">
                                                    <small class=" ps-2 pt-0 fw-bold">تـاريـخ الـنــشــر</small>
                                                    <small> : {{ $tender->starting_date }} </small>
                                                </div>
                                                <h5 class="pt-3">{{ $tender->name }}</h5>
                                                <div class="d-flex justify-content-between p-0 m-0">
                                                    <p class="text-2 pt-3">{{ $tender->title }}</p>
                                                    <a class="mb-3 pt-3 fw-bold border-bottom border-3 border-white"
                                                        href="{{ route('tenders.show', $tender->id) }}">تـفـاصـيـل</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td style="border-top-left-radius: 10px !important" rowspan="2"
                                            class="text-center">
                                            <canvas id="progressCanvas{{ $tender->id }}" width="200"
                                                height="150"></canvas>
                                            <p class="p-0 pt-1 m-0 text-2">
                                                {{ $time = \Carbon\Carbon::parse($tender->ending_date)->locale('ar')->diff(now())->format('%d يوم %h ساعة %i دقيقة') }}

                                        </td>
                                    </tr>
                                    <tr class="color1">
                                        <td class="p-0 m-0 w-75">
                                            <div class="d-flex px-3 pt-3 pb-1">
                                                <p class="fw-bold w-25 ">الـغـرض مـن الـمـنـاقـصـة</p>

                                                <p class="px-3 text-2">
                                                    {{ substr($tender->description, 0, 50) }}{{ strlen($tender->description) > 50 ? '...' : '' }}
                                                    <span class="more"
                                                        style="display: none;">{{ $tender->description }}</span>
                                                    <span class="dots">...</span>
                                                    <small onclick="toggleDescription(this)" class="myBtn">عـرض
                                                        الـمـزيـد...</small>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom-right-radius: 10px !important"
                                            class="d-flex justify-content-evenly text-center pt-3 ">
                                            <div class="p-0">
                                                <p class="fw-bold  ">اخـر مـوعـد لـتـقـديـم الـعـرض</p>
                                                <p class="text-2">{{ $tender->ending_date }}</p>
                                            </div>
                                            <div>
                                                <p class="fw-bold ">اخـر مـوعـد لـفـتـح الـمـظـاريـف</p>
                                                <p class="text-2">{{ $tender->open_date }}</p>
                                            </div>
                                            <div>
                                                <p class="fw-bold  ">مـكـان الـعـمـل</p>
                                                <p class="text-2">{{ $tender->working_location }}</p>
                                            </div>
                                        </td>
                                        <td style="border-bottom-left-radius: 10px !important" class="text-center">

                                            <p class="fw-bold ">قـيـمـة دخـول الـمـنـاقـصـة</p>
                                            <p class="text-2"> {{ $tender->participation_price }} ريــال </p>

                                        </td>
                                    </tr>
                                </table>
                            </div>


                        </div>
                        <script>
                            window.addEventListener('DOMContentLoaded', function() {
                                var canvas = document.getElementById('progressCanvas{{ $tender->id }}');
                                var context = canvas.getContext('2d');
                                var x = canvas.width / 2;
                                var y = canvas.height / 2;
                                var radius = 60;
                                var startAngle = -Math.PI / 2;
                                var endAngle = 0;
                                var counterClockwise = false;
                                var progress = 0; // Set progress value between 0 and 100

                                function drawProgress() {
                                    context.clearRect(0, 0, canvas.width, canvas.height);

                                    // Draw background circle
                                    context.beginPath();
                                    context.arc(x, y, radius, 0, 2 * Math.PI);
                                    context.lineWidth = 7;
                                    context.strokeStyle = '#fff';
                                    context.stroke();

                                    // Draw progress arc
                                    context.beginPath();
                                    context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
                                    context.lineWidth = 7;
                                    context.strokeStyle = '#0074B7'; // Set progress bar color
                                    context.stroke();

                                    // Display progress text
                                    context.font = '20px Arial';
                                    context.fillStyle = '#0074B7';
                                    context.textAlign = 'center';
                                    context.textBaseline = 'middle';
                                    var t = new Date();
                                    // @php
                                        //     echo now()
                                        //
                                    @endphp
                                    {{ $remainingTime = \Carbon\Carbon::parse($tender->ending_date)->locale('ar')->diff(now())->format('%d يوم') }}
                                    ;
                                    context.fillText('{{ $remainingTime }}', x, y);
                                    // context.fillText('30');
                                }

                                function animateProgress() {


                                    var progressToFill = progress / 100;
                                    endAngle = (2 * Math.PI) * progressToFill + startAngle;

                                    drawProgress();
                                    @php
                                        $Total = \Carbon\Carbon::parse($tender->starting_date)
                                            ->locale('ar')
                                            ->diff($tender->ending_date)
                                            ->format('%d');
                                    @endphp
                                    @php
                                        $time = \Carbon\Carbon::parse($tender->ending_date)
                                            ->locale('ar')
                                            ->diff(now())
                                            ->format('%d');
                                    @endphp
                                    if (progress < {{ ($time / $Total) * 100 }}) {
                                        progress++;
                                        requestAnimationFrame(animateProgress);
                                    }
                                }

                                animateProgress();
                            });
                        </script>
                    @endforeach

                </div>
            </div>

            {{-- 2 --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div class="container-fluid px-0 mt-4 mb-3">
                    @foreach ($tendersactive as $tender)
                        <div class="bg-secondary1 text-center rounded p-4 pb-3 mb-4">
                            <div class="table-responsive">
                                <table class="table text-end table-striped table-borderless  align-middle mb-0">
                                    <tr class="p-0 m-0">
                                        <td style="border-top-right-radius: 10px !important" class="p-0 m-0">
                                            <div class="px-3 pt-2 pb-0">
                                                <div class="d-flex p-0">
                                                    <small class=" ps-2 pt-0 fw-bold">تـاريـخ الـنــشــر</small>
                                                    <small> : {{ $tender->starting_date }} </small>
                                                </div>
                                                <h5 class="pt-3">{{ $tender->name }}</h5>
                                                <div class="d-flex justify-content-between p-0 m-0">
                                                    <p class="text-2 pt-3">{{ $tender->title }}</p>
                                                    <a class="mb-3 pt-3 fw-bold border-bottom border-3 border-white"
                                                        href="{{ route('tenders.show', $tender->id) }}">تـفـاصـيـل</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td style="border-top-left-radius: 10px !important" rowspan="2"
                                            class="text-center">
                                            <canvas id="progressCanvas{{ $tender->id }}" width="200"
                                                height="150"></canvas>
                                            <p class="p-0 pt-1 m-0 text-2">
                                                {{ $time = \Carbon\Carbon::parse($tender->ending_date)->locale('ar')->diff(now())->format('%d يوم %h ساعة %i دقيقة') }}

                                        </td>
                                    </tr>
                                    <tr class="color1">
                                        <td class="p-0 m-0 w-75">
                                            <div class="d-flex px-3 pt-3 pb-1">
                                                <p class="fw-bold w-25 ">الـغـرض مـن الـمـنـاقـصـة</p>

                                                <p class="px-3 text-2">
                                                    {{ substr($tender->description, 0, 50) }}{{ strlen($tender->description) > 50 ? '...' : '' }}
                                                    <span class="more"
                                                        style="display: none;">{{ $tender->description }}</span>
                                                    <span class="dots">...</span>
                                                    <small onclick="toggleDescription(this)" class="myBtn">عـرض
                                                        الـمـزيـد...</small>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border-bottom-right-radius: 10px !important"
                                            class="d-flex justify-content-evenly text-center pt-3 ">
                                            <div class="p-0">
                                                <p class="fw-bold  ">اخـر مـوعـد لـتـقـديـم الـعـرض</p>
                                                <p class="text-2">{{ $tender->ending_date }}</p>
                                            </div>
                                            <div>
                                                <p class="fw-bold ">اخـر مـوعـد لـفـتـح الـمـظـاريـف</p>
                                                <p class="text-2">{{ $tender->open_date }}</p>
                                            </div>
                                            <div>
                                                <p class="fw-bold  ">مـكـان الـعـمـل</p>
                                                <p class="text-2">{{ $tender->working_location }}</p>
                                            </div>
                                        </td>
                                        <td style="border-bottom-left-radius: 10px !important" class="text-center">

                                            <p class="fw-bold ">قـيـمـة دخـول الـمـنـاقـصـة</p>
                                            <p class="text-2"> {{ $tender->participation_price }} ريــال </p>

                                        </td>
                                    </tr>
                                </table>
                            </div>


                        </div>
                        <script>
                            window.addEventListener('DOMContentLoaded', function() {
                                var canvas = document.getElementById('progressCanvas{{ $tender->id }}');
                                var context = canvas.getContext('2d');
                                var x = canvas.width / 2;
                                var y = canvas.height / 2;
                                var radius = 60;
                                var startAngle = -Math.PI / 2;
                                var endAngle = 0;
                                var counterClockwise = false;
                                var progress = 0; // Set progress value between 0 and 100

                                function drawProgress() {
                                    context.clearRect(0, 0, canvas.width, canvas.height);

                                    // Draw background circle
                                    context.beginPath();
                                    context.arc(x, y, radius, 0, 2 * Math.PI);
                                    context.lineWidth = 7;
                                    context.strokeStyle = '#fff';
                                    context.stroke();

                                    // Draw progress arc
                                    context.beginPath();
                                    context.arc(x, y, radius, startAngle, endAngle, counterClockwise);
                                    context.lineWidth = 7;
                                    context.strokeStyle = '#0074B7'; // Set progress bar color
                                    context.stroke();

                                    // Display progress text
                                    context.font = '20px Arial';
                                    context.fillStyle = '#0074B7';
                                    context.textAlign = 'center';
                                    context.textBaseline = 'middle';
                                    var t = new Date();
                                    
                                    @endphp
                                    {{ $remainingTime = \Carbon\Carbon::parse($tender->ending_date)->locale('ar')->diff(now())->format('%d يوم') }}
                                    ;
                                    context.fillText('{{ $remainingTime }}', x, y);
                                    // context.fillText('30');
                                }

                                function animateProgress() {
                                    @php
                                        $Total = \Carbon\Carbon::parse($tender->starting_date)
                                            ->locale('ar')
                                            ->diff($tender->ending_date)
                                            ->format('%d');
                                    @endphp
                                    @php
                                        $time = \Carbon\Carbon::parse($tender->ending_date)
                                            ->locale('ar')
                                            ->diff(now())
                                            ->format('%d');
                                    @endphp

                                    var progressToFill = progress / 100;
                                    endAngle = (2 * Math.PI) * progressToFill + startAngle;

                                    drawProgress();

                                    if (progress < {{ ($time / $Total) * 100 }}) {
                                        progress++;
                                        requestAnimationFrame(animateProgress);
                                    }
                                }

                                animateProgress();
                            });
                        </script>
                    @endforeach

                </div>

            </div>


        </div>
        <script>
            function toggleDescription() {
                var moreText = document.getElementById("more");
                var dots = document.getElementById("dots");
                var btnText = document.getElementById("myBtn");

                if (moreText.style.display === "none") {
                    moreText.style.display = "inline";
                    dots.style.display = "none";
                    btnText.textContent = "إخفاء التفاصيل";
                } else {
                    moreText.style.display = "none";
                    dots.style.display = "inline";
                    btnText.textContent = "عـرض الـمـزيـد...";
                }
            }

            function toggleDescription(btn) {
                var parent = btn.parentElement;
                var moreText = parent.querySelector(".more");
                var dots = parent.querySelector(".dots");

                if (moreText.style.display === "none" || moreText.style.display === "") {
                    moreText.style.display = "inline";
                    dots.style.display = "none";
                    btn.textContent = "إخفاء التفاصيل";
                } else {
                    moreText.style.display = "none";
                    dots.style.display = "inline";
                    btn.textContent = "عـرض الـمـزيـد...";
                }
            }
        </script>

    </div>

    {{-- **** --}}
@endsection
