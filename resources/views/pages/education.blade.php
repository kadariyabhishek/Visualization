@extends('master')

@section('content')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            {{$name->fullName}}'s Experiences
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Institute</th>
                        <th>Subject</th>
                        <th>Grade</th>
                        <th>Location</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $num = 0;
                    ?>

                    @forelse($item as $key=>$value)
                        <tr>
                            <td>{{++$num}}</td>
                            <td>{{$value->institute}}</td>
                            <td>{{$value->subject}}</td>
                            <td>{{$value->grade}}</td>
                            <td>{{$value->location}}</td>
                            <td>{{$value->startTime}}</td>
                            <td>{{$value->endTime}}</td>
{{--                            <td>{{$value->endTime}}</td>--}}
{{--                            <td> @if($value->endTime==='Current')--}}
{{--                                    {{\Carbon\Carbon::parse($value->startTime)->diff(\Carbon\Carbon::now())->format('%y years,%m months')}}--}}
{{--                                @else--}}
{{--                                    {{\Carbon\Carbon::parse($value->startTime)->diff(\Carbon\Carbon::parse($value->endTime))->format('%y years,%m months')}}--}}

{{--                                @endif--}}
{{--                            </td>--}}

                            {{--                            <td>{{$value->cv_id}}</td>--}}
                        </tr>
                    @empty
                        <tr>
                            <td>
                            Padheko chaina raicha.
                            </td>
                        </tr>

                    @endforelse


                    </tbody>
                </table>
                <a class="btn btn-info" href="{{url('/tables')}}">Go back</a>
            </div>
        </div>
    </div>
    @endsection

