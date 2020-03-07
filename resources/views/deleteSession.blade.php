@extends('layouts.masterDashboard')

@section('title')
    Teaching Sessions
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Current Teaching Sessions</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Module Code</th>
                <th>Module Name</th>
                <th>Location</th>
                <th>Lecturer Name</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lec as $lec)
                <tr>
                    <form action="{{ route('deleteSession.delete', ['lec_id' => $lec->id]) }}" method="get">
                        <td>{{ $lec->module->moduleCode }}</td>
                        <td>{{ $lec->module->name }}</td>
                        <td>{{ $lec->location->room}}, {{ $lec->location->building}}</td>
                        <td>{{ $lec->teacher->first_name}} {{ $lec->teacher->last_name}}</td>
                        <td>{{ $lec->startDate }}</td>
                        <td>{{ $lec->startTime }}</td>
                        <td>{{ $lec->endTime }}</td>
                        <td><button class="btn btn-danger" type="submit">Delete Session</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
