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
        <th>Building Name</th>
        <th>Room Name/No.</th>
        <th>Room Capacity</th>


        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($locations as $location)

            <tr>
                <form action="{{ route('deleteLocation.delete', ['location_id' => $location->id]) }}" method="get">
                    <td>{{ $location->building }}</td>
                    <td>{{ $location->room }}</td>
                    <td>{{ $location->capacity }}</td>
                    {{--<td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>--}}

                    {{--{{ csrf_field() }}--}}
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><button type="submit">Delete Location</button></td>
                </form>
            </tr>
        </tbody>
        @endforeach

    </table>
@endsection
