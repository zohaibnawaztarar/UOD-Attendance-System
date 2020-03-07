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
                <div class="card text-center">
                    <div class="card-header">
                        Welcome
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Attendance Reports</h5>
                        <p class="card-text">To view Attendance Reports</p>
                        <a href="{{ route('attendanceReports') }}" class="btn btn-primary">Click Here</a>
                    </div>

                </div>
    @elseif (Auth::user()->isSystemAdmin())
                <div class="card text-center">
                    <div class="card-header">
                        Welcome
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">School Staff</h5>
                        <p class="card-text">To Add School Staff</p>
                        <a href="{{ route('addSchoolStaff') }}" class="btn btn-primary">Click Here</a>
                    </div>

                </div>
    @elseif (Auth::user()->isLecturer())
        <div class="card text-center">
            <div class="card-header">
                Welcome
            </div>
            <div class="card-body">
                <h5 class="card-title">Attendance Recording</h5>
                <p class="card-text">To record attendance for a teaching Session</p>
                <a href="{{ route('lecturers', ['teach_id' => Auth::user()->id]) }}" class="btn btn-primary">Click Here</a>
            </div>

        </div>
    @else
        <div class="card text-center">
            <div class="card-header">
                Welcome
            </div>
            <div class="card-body">
                <h5 class="card-title">Attendance Sign In</h5>
                <p class="card-text">To go to attendance sign page</p>
                <a href="{{ route('students') }}" class="btn btn-primary">Click Here</a>
            </div>
            {{--<div class="card-footer text-muted">
                2 days ago
            </div>--}}
        </div>
    @endif
            </div>

@endsection
