@extends('layouts.masterDashboard')

@section('title')
    Attendance Report
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Attendance Report</h1>
test
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>

                <th>Module Code</th>
                <th>Module Name</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>Attendance</th>

            </tr>
            </thead>
            <tbody>
            @isset($report)
            @foreach($report as $report)
                <tr>

                        <td>{{ $report->time->module->moduleCode}}</td>
                        <td>{{ $report->time->module->name}}</td>
                        <td>{{ $report->time->startDate}}</td>
                        <td>{{ $report->time->startTime}}</td>
                        <td> @if ($report->status == 1)
                                <div style="color: green">Present</div>
                            @else
                                <div style="color: red">Absent</div>
                            @endif </td>

                </tr>
            @endforeach
                @endisset
            </tbody>
        </table>

@endsection
