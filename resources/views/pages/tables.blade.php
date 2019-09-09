@extends('master')
@section('dashboard-header')
    @endsection
@section('content')

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Personal Information
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Job Category</th>
                        <th>Age</th>
                        <th>Expected Salary</th>
                        <th>Preferred Location</th>
                        <th>Experience</th>
                        <th>Education</th>
                    </tr>
                    </thead>

                    <tbody>
{{--                    @foreach($data as $value)--}}
{{--                        {{$value}}->jobCategory--}}
{{--                    @endforeach--}}

                    @foreach($item as $da=>$data)
                        <tr>
                            <td>{{++$da}}</td>
                            <td>{{$data->fullName}}</td>
                            <td>{{$data->mobileNo}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->lookingFor}}</td>
                            <td>{{$Age[$da]}}</td>
                            <td> {{$data->expectedSalary}}</td>
                            <td>{{$data->preferredLocation}}</td>
{{--                            <td>{{$data->jobTitle}}</td>--}}

                            <td><a class="btn btn-primary" href="{{url("/test1/".$data->cv_id)}}"> Details</a></td>
                            <td> <a class="btn btn-primary" href="{{url("/education/".$data->cv_id)}}"> Details</a></td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
