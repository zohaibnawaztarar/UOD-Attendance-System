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
        <th>Module Code</th>
        <th>Module Name</th>


        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($modules as $module)

            <tr>
                <form action="{{ route('deleteModule.delete', ['module_id' => $module->id]) }}" method="get">
                    <td>{{ $module->moduleCode }}</td>
                    <td>{{ $module->name }}</td>
                    {{--<td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>--}}

                    {{--{{ csrf_field() }}--}}
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><button type="submit">Delete Module</button></td>
                </form>
            </tr>
        </tbody>
        @endforeach

    </table>
@endsection
