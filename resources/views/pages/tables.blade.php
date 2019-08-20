@extends('master')

    @section('content')

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Data Table Example</div>
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
                            <tfoot>
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
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>3 years</td>
                                <td>320,800</td>
                                <td>Kathmandu</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>3 years</td>
                                <td>320,800</td>
                                <td>Kathmandu</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>3 years</td>
                                <td>320,800</td>
                                <td>Lalitpur</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Abhishek Kadariya</td>
                                <td>Developer</td>
                                <td>Talent Connects</td>
                                <td>23</td>
                                <td>1 year</td>
                                <td>10,000</td>
                                <td>Lalitpur</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



    @endsection
