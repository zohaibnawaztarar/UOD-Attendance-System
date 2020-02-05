@extends('layouts.masterDashboard')

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

        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)

            <tr>
                <form action="{{ route('schoolAdmin.delete', ['user_id' => $user->id]) }}" method="get">
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>

                    {{--{{ csrf_field() }}--}}
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><button type="submit">Delete User</button></td>
                </form>
            </tr>
        </tbody>

        @endforeach

    </table>
@endsection
