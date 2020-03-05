@extends('layouts.masterDashboard')

@section('title')
    School Staff
@endsection

@section('content')
    @include('includes.message-block')

    <div class="container-fluid">
        <div class="row"></div>
        <h1 class="text-center">Current School Staff</h1>

        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-Mail</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <form action="{{ route('systemAdmin.delete', ['user_id' => $user->id]) }}" method="get">
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                        <td><button type="submit">Remove Staff Member</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
