@extends('layouts.master')

@section('title')
    Welcome
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop


@section('content')
    @include('includes.message-block')
    <h1>This is dashboard page for School Staff only</h1>
    <table>
        <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-Mail</th>
        <th>Student</th>
        <th>Lecturer/th>
        <th>Admin</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form action="{{ route('systemAdmin.assign') }}" method="post">
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Student') ? 'checked' : '' }} name="role_student"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Lecturer') ? 'checked' : '' }} name="role_lecturer"></td>
                    <td><input type="checkbox" {{ $user->hasRole('School Admin') ? 'checked' : '' }} name="role_schoolAdmin"></td>
                    {{ csrf_field() }}
                    <td><button type="submit">Assign Roles</button></td>
                </form>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
