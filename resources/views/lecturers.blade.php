@extends('layouts.masterDashboard')

@section('title')
    Welcome
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    @include('includes.message-block')
    <h1>This is dashboard page for Lecturers only</h1>



    <table>
        <thead>

        <th>Module Code</th>
        <th>Module Name</th>

        <th>Location</th>

        <th>Lecturer Name</th>

        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>




        <th></th>
        </thead>
        <tbody>
        @foreach($lec as $lec)
        
            <tr>
                <form action="{{ route('lecturers.start', ['lec_id' => $lec->id]) }}" method="get">
                    <td>{{ $lec->module->moduleCode }}</td>
                    <td>{{ $lec->module->name }}</td>
                    <td>{{ $lec->location->room}}, {{ $lec->location->building}}</td>
                    <td>{{ $lec->teacher->first_name}} {{ $lec->teacher->last_name}}</td>
                    <td>{{ $lec->startDate }}</td>
                    <td>{{ $lec->startTime }}</td>
                    <td>{{ $lec->endTime }}</td>

                    {{--<td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>--}}

                    {{--{{ csrf_field() }}--}}
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><button type="submit">Start Session</button></td>
                </form>
            </tr>
        </tbody>
        @endforeach

    </table>


@endsection
