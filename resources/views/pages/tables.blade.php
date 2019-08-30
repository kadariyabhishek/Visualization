@extends('master')

@section('content')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Job Category</th>
                        <th>Current Office</th>
                        <th>Age</th>
                        <th>Experience</th>
                        <th>Expected Salary</th>
                        {{--                                job location--}}
                        <th>Location</th>
                    </tr>
                    </thead>
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <th>S.N</th>--}}
{{--                        <th>Name</th>--}}
{{--                        <th>Job Category</th>--}}
{{--                        <th>Current Office</th>--}}
{{--                        <th>Age</th>--}}
{{--                        <th>Experience</th>--}}
{{--                        <th>Expected Salary</th>--}}
{{--                        --}}{{--                                job location--}}
{{--                        <th>Location</th>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
                    <tbody>
{{--                    @foreach($data as $value)--}}
{{--                        {{$value}}->jobCategory--}}
{{--                    @endforeach--}}

                    @foreach($item as $da=>$data)
                        <tr>
                            <td>{{++$da}}</td>
                            <td>{{$data->fullName}}</td>
                            <td>{{$data->lookingFor}}</td>
                            <td>{{$data->current}}</td>
                            <td>{{$Age[$da]}}</td>
                            <td><b>{{$data->jobTitle}}</b>
                            {{$data->jobSummary}}</td>
                            <td> {{$data->expectedSalary}}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
