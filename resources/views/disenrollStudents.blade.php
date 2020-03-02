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


        <th>Module</th>

        <th>Student Name</th>



        <th></th>

        </thead>
        <tbody>

        @foreach($enrolled as $enrolled)

            <tr>
                <form action="{{ route('disenrollStudents.delete', ['enrolled_id' => $enrolled->id]) }}" method="get">

                    <td>{{ $enrolled->module->name }}</td>
                    <td>{{ $enrolled->student->first_name }}</td>
                    {{--<td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>--}}

                    {{--{{ csrf_field() }}--}}
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><button type="submit">Disenroll</button></td>
                </form>
            </tr>
        </tbody>
        @endforeach

    </table>
@endsection
