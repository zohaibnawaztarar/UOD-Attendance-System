@extends('layouts.masterDashboard')

@section('title')
    Dashboard
@endsection
@section('subNav')
    {{-- this section will not be shown --}}
@stop
@section('content')
    @include('includes.message-block')
<h1>This is main Dashboard Page</h1>
    @endsection
