@extends('layouts.masterDashboard')

@section('title')
    Disenroll Students
@endsection

@section('content')
    @include('includes.message-block')
    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Current Enrolled Students</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Module Code</th>
                <th>Module Name</th>
                <th>Student First Name</th>
                <th>Student Last Name Name</th>
                <th>Student Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enrolled as $enrolled)
                <tr>
                    <form action="{{ route('disenrollStudents.delete', ['enrolled_id' => $enrolled->id]) }}" method="get">
                        <td>{{ $enrolled->module->moduleCode }}</td>
                        <td>{{ $enrolled->module->name }}</td>
                        <td>{{ $enrolled->student->first_name }}</td>
                        <td>{{ $enrolled->student->last_name }}</td>
                        <td>{{ $enrolled->student->email }}</td>
                        <td><button class="btn btn-danger" type="submit">Disenroll Student</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
