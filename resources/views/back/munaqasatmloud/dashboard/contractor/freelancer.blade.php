@extends('layouts.back')

@section('content')



    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary1 text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0 fw-bold">الـمـنـاقـصـات </h6>
                <a href="{{ route('tenders.index') }}" class="fw-bold">عــرض الـكـل</a>
            </div>


            <div class="table-responsive">

                <table class="table text-end table-striped table-borderless bg-white align-middle mb-0  ">
                    @foreach ($tenders as $tender)
                        <tr class="p-0 m-0">
                            <td style="border-top-right-radius: 10px !important" class="p-0 m-0">
                                <div class="px-3 pt-2 pb-0">
                                    <div class="d-flex p-0">
                                        <small class=" ps-2 pt-0 fw-bold">تـاريـخ الـنــشــر</small>
                                        <small> : {{ $tender->starting_date }} </small>
                                    </div>
                                    <h5 class="pt-3 ">{{ $tender->name }}</h5>
                                    <div class="d-flex justify-content-between p-0 m-0">
                                        <p class="text-2 pt-3">{{ $tender->title }}</p>
                                        <a class="mb-3 pt-3 fw-bold border-bottom border-3 border-white"
                                            href="{{ route('tenders.show', $tender->id) }}">تـفـاصـيـل</a>
                                    </div>
                                </div>
                            </td>

                            <td style="border-top-left-radius: 10px !important" rowspan="2" class="text-center">
                                <canvas id="progressCanvas{{ $tender->id }}" width="200" height="150"></canvas>
                                <p class="p-0 pt-1 m-0 text-2">
                                    {{ $time = \Carbon\Carbon::parse($tender->ending_date)->locale('ar')->diff(now())->format('%d يوم %h ساعة %i دقيقة') }}

                            </td>
                        </tr>
                        <tr class="color1">
                            <td class="p-0 m-0 w-75">
                                <div class="d-flex px-3 pt-3 pb-1 ">
                                    <p class="fw-bold w-25 ">الـغـرض مـن الـمـنـاقـصـة</p>
                                    <p class="px-3 text-2">
                                        {{ substr($tender->description, 0, 50) }}{{ strlen($tender->description) > 50 ? '...' : '' }}
                                        <span class="more" style="display: none;">{{ $tender->description }}</span>
                                        <span class="dots">...</span>
                                        <small onclick="toggleDescription(this)" class="myBtn">عـرض الـمـزيـد...</small>
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
                                    <p class="fw-bold  ">اخـر مـوعـد لـفـتـح الـمـظـاريـف</p>
                                    <p class="text-2">{{ $tender->open_date }}</p>
                                </div>
                                <div>
                                    <p class="fw-bold  ">مـكـان الـعـمـل</p>
                                    <p class="text-2">{{ $tender->working_location }}</p>
                                </div>
                            </td>
                            <td style="border-bottom-left-radius: 10px !important" class="text-center">

                                <p class="fw-bold  ">قـيـمـة دخـول الـمـنـاقـصـة</p>
                                <p class=" text-2"> {{ $tender->participation_price }} ريــال </p>

                            </td>


                        </tr>

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
                                    context.fillStyle = '#0074B7 ';
                                    context.textAlign = 'center';
                                    context.textBaseline = 'middle';
                                    var t = new Date();
                                    // @php
                                        //     echo now()
                                        //
                                    @endphp
                                    //    {{ $remainingTime = \Carbon\Carbon::parse($tender->ending_date)->locale('ar')->diff(now())->format('%d يوم') }};
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
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->


    <!-- Widgets Start -->
    <div style="margin-bottom: 70px !important" class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-md-6 col-xl-8 mb-60">
                <div class="h-100 bg-secondary1 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0 fw-bold"> الــعــروض الـفـعـالـة</h6>
                        <a href="{{ route('frrelanceroffers.index') }}" class="fw-bold">عــرض الـكـل</a>
                    </div>
                    <div class="container-fluid pt-2 px-0  mb-2">
                        <div class="bg-secondary1 text-center rounded ">

                            <div class="table-responsive">
                                <table class="table table-striped table-borderless   align-middle mb-0 text-center">
                                    <thead>
                                       
                                            <th scope="col">الـمـنـاقـصـة</th>
                                            <th scope="col">جــهــة</th>
                                            <th scope="col">تـاريـخ الـتـقـديـم</th>
                                      
                                    </thead>
                                    <tbody>
                                        @if ($tendersactive->isNotEmpty())
                                            @foreach ($tendersactive as $tender)
                                               <tr >
                                                <td class="fw-bold">{{ $tender->name }}</td>
                                                <td class="fw-bold">{{ $tender->title }}</td>

                                                <td class="fw-bold">{{ $tender->created_at }}</td>

                                                @if ($tender->tenderDocument)
                                                    <td class="fw-bold">{{ $tender->tenderDocument->created_at }};</td>
                                                @endif  
                                               </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-xl-4 mb-60">
                <div class="h-100 bg-secondary1 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 fw-bold">الـتـقـويـم</h6>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->


   



@endsection
