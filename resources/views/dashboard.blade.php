@extends('layouts.masterDashboard')

@section('title')
    Dashboard
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>

        <div class="container-login100">


    @if (Auth::user()->isSchoolAdmin())
                <div class="row">
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Attendance Reports
                            </div>
                            <div class="card-body">

                                <p class="card-text">To View Attendance Reports</p>
                                <a href="{{ route('attendanceReports') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Add Teaching Staff
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Add Teaching Staff</p>
                                <a href="{{ route('addLecturer') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Add Teaching Session
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Add New Teaching Session</p>
                                <a href="{{ route('addSession') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                View/Delete Teaching Session
                            </div>
                            <div class="card-body">

                                <p class="card-text">To View or Delete Teaching Session</p>
                                <a href="{{ route('deleteSession') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Enrol Students
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Enrol Students in Module</p>
                                <a href="{{ route('moduleEnrolment') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                View/Disenroll Students
                            </div>
                            <div class="card-body">

                                <p class="card-text">To View or Disenroll Students</p>
                                <a href="{{ route('disenrollStudents') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>
    @elseif (Auth::user()->isSystemAdmin())
        <div class="row">
        <div style="padding: 20px;">
            <div class="card text-center" style="min-width: 350px!important;">
                    <div class="card-header">
                       Add School Staff
                    </div>
                    <div class="card-body">

                        <p class="card-text">To Add School Staff</p>
                        <a href="{{ route('addSchoolStaff') }}" class="btn btn-primary">Click Here</a>
                    </div>

                </div>
        </div>
                <div style="padding: 20px;">
                <div class="card text-center" style="min-width: 350px!important;">
                    <div class="card-header">
                       View/Delete School Staff
                    </div>
                    <div class="card-body">

                        <p class="card-text">To View or Delete School Staff</p>
                        <a href="{{ route('systemAdmin') }}" class="btn btn-primary">Click Here</a>
                    </div>

                </div>
                </div>
        </div>
                <div class="row">

                <div style="padding: 20px;">
                    <div class="card text-center" style="min-width: 350px!important;">
                        <div class="card-header">
                            Change Password
                        </div>
                        <div class="card-body">

                            <p class="card-text">To Change Your Password</p>
                            <a href="{{ route('changePassword') }}" class="btn btn-primary">Click Here</a>
                        </div>

                    </div>
                </div>
                <div style="padding: 20px;">
                    <div class="card text-center" style="min-width: 350px!important;">
                        <div class="card-header">
                            IP Restriction
                        </div>
                        <div class="card-body">

                            <p class="card-text">To Restrict IPs</p>
                            <a href="{{ route('settings') }}" class="btn btn-primary">Click Here</a>
                        </div>

                    </div>
                </div>
                </div>





    @elseif (Auth::user()->isLecturer())

                <div class="row">
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Attendance Recording
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Record Attendance for a Teaching Session</p>
                                <a href="{{ route('lecturers', ['teach_id' => Auth::user()->id]) }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                               Manual Attendance Recording
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Manually Record Attendance</p>
                                <a href="{{ route('manualSignin') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Add Teaching Session
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Add New Teaching Session</p>
                                <a href="{{ route('addSession') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                View/Delete Teaching Session
                            </div>
                            <div class="card-body">

                                <p class="card-text">To View or Delete Teaching Session</p>
                                <a href="{{ route('deleteSession') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Enrol Students
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Enrol Students in Module</p>
                                <a href="{{ route('moduleEnrolment') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                View/Disenroll Students
                            </div>
                            <div class="card-body">

                                <p class="card-text">To View or Disenroll Students</p>
                                <a href="{{ route('disenrollStudents') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>
    @else

                <div class="row">

                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Attendance Sign In
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Sign Your Attendance</p>
                                <a href="{{ route('students') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Attendance Reports
                            </div>
                            <div class="card-body">

                                <p class="card-text">To View Your Attendance Reports</p>
                                <a href="{{ route('myReports', ['stu_id' => Auth::user()->id]) }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">

                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Change Password
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Change Your Password</p>
                                <a href="{{ route('changePassword') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="card text-center" style="min-width: 350px!important;">
                            <div class="card-header">
                                Logout
                            </div>
                            <div class="card-body">

                                <p class="card-text">To Logout</p>
                                <a href="{{ route('logout') }}" class="btn btn-primary">Click Here</a>
                            </div>

                        </div>
                    </div>
                </div>


    @endif
            </div>

@endsection
