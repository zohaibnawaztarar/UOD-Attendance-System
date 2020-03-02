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


    {!! QrCode::size(250)->generate($lec->pin) !!}

    <h1>Pin: {{$lec->pin}} </h1>
@endsection
