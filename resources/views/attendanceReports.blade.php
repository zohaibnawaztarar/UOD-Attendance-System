@extends('layouts.masterDashboard')

@section('title')
    Attendance Reports
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Attendance Reports</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Student First Name</th>
                <th>Student Last Name</th>
                <th>Module Code</th>
                <th>Module Name</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>Attendance</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @isset($attendances)
                @foreach($attendances as $attendances)
                    <tr>
                        {{--<form action="{{ route('deleteLocation.delete', ['$attendances_id' => $attendances->id]) }}" method="get">--}}
                        <td>{{ $attendances->student->first_name}}</td>
                        <td>{{ $attendances->student->last_name}}</td>
                        <td>{{ $attendances->time->module->moduleCode}}</td>
                        <td>{{ $attendances->time->module->name}}</td>
                        <td>{{ $attendances->time->startDate}}</td>
                        <td>{{ $attendances->time->startTime}}</td>
                        <td> @if ($attendances->status == 1)
                                <div style="color: green">Present</div>
                            @else
                                <div style="color: red">Absent</div>
                            @endif </td>
                        <td><a href="mailto:{{$attendances->student->email}}?subject=Your Attendance&body=Hi there, We noticed you were absent from a scheduled teaching activity. If this was due to an illness please remember to fill in a self-certificate form and return this to us either via email to this address or in person to the enquiry centre or school office. Regards, School Office Admin" class="btn btn-primary" id="btnOutlook" style="background: #4365e2;" role="button" aria-pressed="true">Contact Student</a></td>

                        {{--</form>--}}
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>

@endsection
